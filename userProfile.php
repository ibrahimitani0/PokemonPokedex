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
    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>user Profile</title>

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">

    <script src="bootstrap3/assets/js/html5shiv.js"></script>
    <script src="bootstrap3/assets/js/respond.min.js"></script>

</head>

<body background="images/poketexture1.jpg">


<?php include 'header.php'; ?>


<div class="container">  <!-- Main Div content container -->
    <div class="row">  <!-- Main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->


        <div class="col-md-9">  <!-- start main content column -->
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>'s Profile</h4>
                </div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12">
                            <?php
                            $profile = mysqli_query($mysqli, "SELECT username, password, email FROM `users` WHERE username LIKE '".$_SESSION["username"]."';");

                            while($pull_profile = $profile->fetch_assoc()){

                                echo '<ul style="margin-bottom: 50px">'.
                                '<li class="list-unstyled">' .
                                    '<h3 class="list-group-item-text"><span class=" label label-danger">User Name:</span> '.$pull_profile['username'] .'</h3>' .
                                '</li>' .
                                '<li class="list-unstyled">'.
                                    '<h3 class="list-group-item-text"><span class=" label label-primary">Email:</span> '.$pull_profile['email'].' </h3>' .
                                '</li>'.
                            '</ul>';

                            }

                            ?>


                            <p style="margin-top: 10px; margin-bottom: 0">
                                <a style="margin-right: 460px " href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
                                <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div> <!-- primary panel ends here -->

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
