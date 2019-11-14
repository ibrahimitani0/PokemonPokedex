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


          <div class="panel panel-primary" >

              <div class="panel-heading" >
                  <h4>Hey <b><?php echo htmlspecialchars($_SESSION["username"]); ?> </b>Welcome to PokemonPokedex !!</h4>

              </div>
                <div class="panel-body" style="height: 580px;">

                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <!--  <div style="padding-bottom:10px;"><h3>All Regions Map</h3></div> -->
                      <div class="carousel-inner" role="listbox">
                          <div class="item active">
                              <img src="images/all%20pokemon.jpg"/>
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
