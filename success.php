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
    <title>Error Page</title>

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">

    <script src="bootstrap3/assets/js/html5shiv.js"></script>
    <script src="bootstrap3/assets/js/respond.min.js"></script>

</head>

<body background="images/poketexture1.jpg">
<style>
    .container-outer { overflow: scroll; width: 100%; height: 970px; }

    .container-inner { width: 100%; }
</style>


<?php include 'header.php'; ?>

<div class="container">  <!-- start main content container -->
    <div class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->

        <div class="col-md-9">

                    <div class="panel panel-primary">
                        <div class="panel-heading">

                            <h4>Thanks for your comment <b><?php echo htmlspecialchars($_SESSION["username"]); ?> </b></h4>
                        </div>

                        <h4 style="padding-bottom: 15px; padding-left: 10px;">See all user's comments:</h4>

                            <div class = " panel-body container-outer" style="height: 530px;">

                        <div class=" container-inner">

                            <?php
                            $sql_Allmsg = mysqli_query($mysqli, 'SELECT * FROM Message;');

                            while($pull_msgs = $sql_Allmsg->fetch_assoc()){
                                echo '<ul class="list-group"><li class="list-group-item"><p><b>'.$pull_msgs['UName'] . '</b> left a comment <b>"' . $pull_msgs['Message'] . ' "</b> about the Pokemon <b>" '.$pull_msgs['PokemonName'].'"</b></p></li></ul>';
                            }


                            ?>

                    </div>



                </div>
            </div>


        </div>  <!-- end main content column -->
    </div>  <!-- end main content row -->
</div>   <!-- end main content container -->

<?php include 'footer.php'; ?>

<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
</body>
</html>
