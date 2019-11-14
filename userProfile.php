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

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4><b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>'s profile</h4></div>
            <?php

            $profile = mysqli_query($mysqli, "SELECT username, password, email FROM `users` WHERE username LIKE '".$_SESSION["username"]."';");

            while ($pull_profile = $profile->fetch_assoc()) {
                echo '<div class="panel-body">';
                echo '<div class="well">' .
                    '<div class="row">' .
                    '<div class="col-md-12">' .
                    '<div class="col-md-6">' .
                   '<div class="list-group">' .
                    '<img  class="img-thumbnail"  src="./images/pikachu_pokemon_profile_avatar_people-512.png" alt="pokemon image"/>' .
                    '</div>' .
                    '</div>' .
                    '<div class="col-md-6"><div class="panel panel-primary"><div class="panel-heading">' .
                    '<h4>Information:</h4></div>' .
                    '<div class="panel-body" ><p><span class="label label-primary">Name:</span> ' . $pull_profile['username'] . '</p>' .
                    '<p><span class="label label-info">Email</span> ' . $pull_profile['email'] . '</p>'.
                 '<p style="margin-top: 10px; margin-bottom: 0"><a href="reset-password.php" class="btn btn-warning">Reset Your Password</a></p>';

                echo '</div></div></div>';

                echo '</div>' .
                    '</div>';
            }


            ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>Your Comments</h4>
                    </div>
                    <div class="panel-body">
                <?php

                $sql_messages = mysqli_query($mysqli, "SELECT UName, Message, PokemonName FROM Message Where UName LIKE '" . $_SESSION["username"] . "';");

                while($msg = $sql_messages->fetch_assoc()){
                    echo '<p> You left a comment <b>"'. $msg['Message'] . '"</b> on the Pokemon <b>' . $msg['PokemonName'] .'</b></p>';
                }
                echo '</div>'.'</div>'. '</div>';
                ?>

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
