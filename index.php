<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PokemonPokedex</title>
</head>
<body background = "images/poketexture1.jpg">

<?php include 'header.php'; ?>


<div class="container">  <!-- Main Div content container -->
    <div class="row">  <!-- Main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->


            <div class="col-md-9">  <!-- start main content column -->


          <div class="panel panel-primary">

              <div class="panel-heading">
                  <h4>Hey <b><?php echo htmlspecialchars($_SESSION["username"]); ?> </b>Welcome to PokemonPokedex !!</h4>

              </div>
                <div class="panel-body">

                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <!--  <div style="padding-bottom:10px;"><h3>All Regions Map</h3></div> -->
                      <div class="carousel-inner" role="listbox">
                          <div class="item active">
                              <img src="images/all%20pokemon.jpg"/>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <p style="margin-top: 10px; margin-bottom: 0">
                                  <a style="margin-right: 460px " href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                                  <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                              </p>
                          </div>
                      </div>

                </div>
            </div>

              <div class="panel-body">

                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <!--  <div style="padding-bottom:10px;"><h3>All Regions Map</h3></div> -->
                      <div class="row">
                          <div class="col-md-12">
                            <?php
                            $SNS = "SELECT id FROM users WHERE username = ?";

                            $SNS_Email = "SELECT email FROM users WHERE username = ?";

                            if($select = $mysqli->prepare($SNS)) {
                                // Bind variables to the prepared statement as parameters
                                $select->bind_param("s", $user);

                                // Set parameters
                                $user = trim($_SESSION["username"]);

                                // Attempt to execute the prepared statement
                                if ($select->execute()) {
                                    // store result
                                    $select->store_result();

                                    if ($select->num_rows == 1) {
                                        echo $user;
                                    } else {
                                        echo "no user name";
                                    }
                                }
                                $select->close();
                            }
                            $mysqli->close();

                            if($select_eml = $mysqli->prepare($SNS_Email)) {
                                // Bind variables to the prepared statement as parameters
                                $select_eml->bind_param("s", $eml);

                                // Set parameters
                                $eml = $select_eml->fetch('email');

                                // Attempt to execute the prepared statement
                                if ($select_eml->execute()) {
                                    // store result
                                    $select_eml->store_result();

                                    if ($select_eml->num_rows == 1) {
                                        echo $eml;
                                    } else {
                                        echo "no user name";
                                    }
                                }
                                $select_eml->close();
                            }
                            $mysqli->close();

                            ?>
                          </div>
                          </div>
                      </div>

                  </div>
              </div>
        </div> <!-- panel ends here -->

    </div>
</div>

</div>   <!-- end main content container -->

<?php include 'footer.php'; ?>

<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
</body>
</html>
