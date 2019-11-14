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
   <title>Online</title>

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">

   <script src="bootstrap3/assets/js/html5shiv.js"></script>
   <script src="bootstrap3/assets/js/respond.min.js"></script>

</head>

<body background = "images/poketexture1.jpg">

<?php include 'header.php'; ?>



<div class="container">  <!-- start main content container -->
   <div class="row">  <!-- start main content row -->
      <div class="col-md-3">  <!-- start left navigation rail column -->
         <?php include 'side.php'; ?>
      </div>  <!-- end left navigation rail -->

      <div class="col-md-9">

              <?php

              $sql_display = mysqli_query($mysqli, 'SELECT * FROM Pokemon WHERE PokemonID = '.$_GET['id'].' ;');

              $sql_Tier = mysqli_query($mysqli,'SELECT Tier FROM Tier WHERE PokemonID ='.$_GET['id'].' ;');
              $pull_Tier = $sql_Tier->fetch_assoc();

              while ($pull_data = $sql_display->fetch_assoc()) {
                  echo '<div class="panel panel-primary"><div class="panel-heading"><h4 style="text-align: center">' . $pull_data['PokemonName'] . '</h4></div><div class="panel-body">';
                  echo '<div class="well">' .
                      '<div class="row">' .
                      '<div class="col-md-12">' .
                      '<div class="col-md-6">' .
                      '<div class="list-group">' .
                      '<a href="PokeProfile.php?id=' . $pull_data['PokemonID'] . '">' .
                      '<img  class="img-thumbnail"  src="./json-sql/images/' . $pull_data['ImagePath'] . '" alt="pokemon image"/>' .
                      '</a>' .
                      '</div>' .
                      '</div>' .
                      '<div class="col-md-6"><div class="panel panel-primary"><div class="panel-heading">' .
                      '<h4>Pokemon Information:</h4></div>' .
                      '<div class="panel-body" ><p><span class="label label-primary">Name:</span> ' . $pull_data['PokemonName'] . '</p>' .
                      '<p><span class="label label-info">Pokedex Number:</span> ' . $pull_data['DexNumber'] . '</p>' .
                      '<p><span class="label label-danger">Base HP:</span> <meter value="' . $pull_data['BaseHP'] . '" min="0" max="100"></meter>  ' . $pull_data['BaseHP'] . '</p>' .
                      '<p><span class="label label-warning">Base Atk:</span> <meter value="' . $pull_data['BaseAtk'] . '" min="0" max="100"></meter>  ' . $pull_data['BaseAtk'] . '</p>' .
                      '<p><span class="label label-success">Base Def:</span> <meter value="' . $pull_data['BaseDef'] . '" min="0" max="100"></meter>  ' . $pull_data['BaseDef'] . '</p>' .
                      '<p><span class="label label-default">Base SpA:</span> <meter value="' . $pull_data['BaseSpA'] . '" min="0" max="100"></meter>  ' . $pull_data['BaseSpA'] . '</p>' .
                      '<p><span class="label label-default">Base SpD:</span> <meter value="' . $pull_data['BaseSpD'] . '" min="0" max="100"></meter>  ' . $pull_data['BaseSpD'] . '</p>' .
                      '<p><span class="label label-default">Base Spe:</span> <meter value="' . $pull_data['BaseSpe'] . '" min="0" max="100"></meter>  ' . $pull_data['BaseSpe'] . '</p>' .
                      '<p><span class="label label-warning">Tier:</span> ' . $pull_Tier['Tier'] . '</p>';

                  if ($pull_data['Type2'] != null) {
                      echo '<p><span class="label label-danger">Type:</span> <img class="img-thumbnail" style="height: 30px;" src="images/TYPE/' . $pull_data['Type1'] . '.png" alt="' . $pull_data['PokemonName'] . '"/>
                                    <img class="img-thumbnail" style="height:30px;"src="images/TYPE/' . $pull_data['Type2'] . '.png" alt="' . $pull_data['PokemonName'] . '"/></p>';
                  } else {
                      echo '<p><span class="label label-danger">Type:</span> <img class="img-thumbnail" style="height: 30px;" src="images/TYPE/' . $pull_data['Type1'] . '.png" alt="' . $pull_data['PokemonName'] . '"/></p>';
                  }

                  echo '</div></div></div>' .

                      '</div>' .
                      '</div>';

                  $sql_place = mysqli_query($mysqli, 'SELECT * FROM Places WHERE PokemonID =' . $_GET['id'] . ' ;');
                  echo '<div class="panel panel-primary" ><div class="panel-heading" ><h5>Where to Find This Pokemon:</h5></div><div class="panel-body" ><p>';
                  while ($pull_place = $sql_place->fetch_assoc()) {
                      echo $pull_place['Place'];

                  }
                  echo '</p></div></div>';
              }

              echo '</div>';
                   ?>


          </div>
        </div>
    <?php
    echo '<div class="panel panel-primary"><div class="panel-heading"><h4>Evolution Chart:</h4></div><div class="panel-body">';
    $sql_display = mysqli_query($mysqli, 'SELECT * FROM Evolution WHERE evo1 = '.$_GET['id'].'  or evo2 = '.$_GET['id'].'  or evo3 = '.$_GET['id'].' or evo4 = '.$_GET['id'].' or evo5 = '.$_GET['id'].' ;');

    $evo1 = 0;
    $evo2 = 0;
    $evo3 = 0;
    $evo4 = 0;
    $evo5 = 0;


    while ($pull_data = $sql_display->fetch_assoc()) {
        if ($pull_data['evo1'] != null && $pull_data['evo2'] != null && $pull_data['evo3'] != null && $pull_data['evo4'] != null && $pull_data['evo5'] != null ) {
            $evo1 = $pull_data['evo1'];
            $evo2 = $pull_data['evo2'];
            $evo3 = $pull_data['evo3'];
            $evo4 = $pull_data['evo4'];
            $evo5 = $pull_data['evo5'];

        } else if ($pull_data['evo1'] != null && $pull_data['evo2'] != null && $pull_data['evo3'] == null && $pull_data['evo4'] == null && $pull_data['evo5'] == null) {
            $evo1 = $pull_data['evo1'];
            $evo2 = $pull_data['evo2'];

        } else if ($pull_data['evo1'] != null && $pull_data['evo2'] == null && $pull_data['evo3'] == null && $pull_data['evo4'] == null && $pull_data['evo5'] == null) {
            $evo1 = $pull_data['evo1'];

        } else if ($pull_data['evo1'] != null && $pull_data['evo2'] != null && $pull_data['evo3'] != null && $pull_data['evo4'] == null && $pull_data['evo5'] == null) {
            $evo1 = $pull_data['evo1'];
            $evo2 = $pull_data['evo2'];
            $evo3 = $pull_data['evo3'];

        } else if ($pull_data['evo1'] != null && $pull_data['evo2'] != null && $pull_data['evo3'] != null && $pull_data['evo4'] != null && $pull_data['evo5'] == null) {
            $evo1 = $pull_data['evo1'];
            $evo2 = $pull_data['evo2'];
            $evo3 = $pull_data['evo3'];
            $evo4 = $pull_data['evo4'];
        }
    }


    if ($evo1 != 0 && $evo2 != 0 && $evo3 != 0 && $evo4 != 0 && $evo5 != 0 ) {
        $display_ev = mysqli_query($mysqli, 'SELECT * FROM `Pokemon` WHERE PokemonID = '. $evo1 .' or PokemonID = '. $evo2 .' or PokemonID = '. $evo3 .' or PokemonID = '. $evo4 .' or PokemonID = '. $evo5 .';');

        while ($pull_data = $display_ev->fetch_assoc()) {
                echo '<div class="col-md-2"><a href="PokeProfile.php?id=' . $pull_data['PokemonID'] .'">'.
                    '<img  class="img-thumbnail" style="height: 100%; width: 100%;" src="./json-sql/sprites/' . $pull_data['ImagePath'] . '" alt="pokemon image"/>' .
                    '</a></div>';
        }

    } else if ($evo1 != 0 && $evo2 != 0 && $evo3 == 0 && $evo4 == 0 && $evo5 == 0 ) {
        $display_ev = mysqli_query($mysqli, 'SELECT * FROM `Pokemon` WHERE PokemonID = '. $evo1 .' or PokemonID = '. $evo2 .';');

        while ($pull_data = $display_ev->fetch_assoc()) {
            echo '<div class="col-md-3"><a href="PokeProfile.php?id=' . $pull_data['PokemonID'] .'">'.
                '<img  class="img-thumbnail" style="height: 80%; width:80%;" src="./json-sql/sprites/' . $pull_data['ImagePath'] . '" alt="pokemon image"/>' .
                '</a></div>';


        }

    } else if ($evo1 != 0 && $evo2 == 0 && $evo3 == 0 && $evo4 == 0 && $evo5 == 0) {
        $display_ev = mysqli_query($mysqli, 'SELECT * FROM `Pokemon` WHERE PokemonID = ' . $evo1 . ';');

        while ($pull_data = $display_ev->fetch_assoc()) {
            echo '<div class="col-md-3"><a href="PokeProfile.php?id=' . $pull_data['PokemonID'] . '">' .
                '<img class="img-thumbnail" style="height: 80%; width:80%;" src="./json-sql/sprites/' . $pull_data['ImagePath'] . '" alt="pokemon image"/>' .
                '</a></div>'.'<p>'.$pull_data['PokemonName'].' is not known to evolve into or from any other Pokémon. </p>';

        }
    } else if ($evo1 != 0 && $evo2 != 0 && $evo3 != 0 && $evo4 == 0 && $evo5 == 0) {
    $display_ev = mysqli_query($mysqli, 'SELECT * FROM `Pokemon` WHERE PokemonID = ' . $evo1 . ' or PokemonID = ' . $evo2 . ' or PokemonID = ' . $evo3 . ';');

    while ($pull_data = $display_ev->fetch_assoc()) {
        echo '<div class="col-md-3"><a href="PokeProfile.php?id=' . $pull_data['PokemonID'] . '">' .
            '<img class="img-thumbnail" style="height: 80%; width:80%;" src="./json-sql/sprites/' . $pull_data['ImagePath'] . '" alt="pokemon image"/>' .
            '</a></div>';

        }
    } else if ($evo1 != 0 && $evo2 != 0 && $evo3 != 0 && $evo4 != 0 && $evo5 == 0) {
    $display_ev = mysqli_query($mysqli, 'SELECT * FROM `Pokemon` WHERE PokemonID = ' . $evo1 . ' or PokemonID = ' . $evo2 . ' or PokemonID = ' . $evo3 . ' or PokemonID = ' . $evo4 . ' ;');

    while ($pull_data = $display_ev->fetch_assoc()) {
        echo '<div class="col-md-3"><a href="PokeProfile.php?id=' . $pull_data['PokemonID'] . '">' .
            '<img class="img-thumbnail" style="height: 80%; width:80%;" src="./json-sql/sprites/' . $pull_data['ImagePath'] . '" alt="pokemon image"/>' .
            '</a></div>';

        }
    }

    echo '</div>'.
    '</div>';
    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Comments</h4>
        </div>
        <div class="panel-body">
            <?php
            $sql_message = mysqli_query($mysqli, 'SELECT UName, Message FROM Message, Pokemon Where Pokemon.PokemonID = '. $_GET['id'] .' AND Pokemon.PokemonName LIKE Message.PokemonName'.';');

            while($pull_msg = $sql_message->fetch_assoc()){
                echo '<p>'.$pull_msg['UName'] . ' says: ' . $pull_msg['Message'].'</p>';
            }


            ?>

        </div>
    </div>


    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4>Write a comment</h4>
        </div>
        <div class="panel-body">
            <form class="navbar-form " method="POST">
                <div class="form-group" style="margin-bottom: 10px;">
                    <input type="text" class="form-control" name="msg" placeholder="comment" style="width: 800px;">
                </div>
                <div class="form-group">
                <button style="width: 100px;" type="submit" name="share" class="btn btn-primary"><span class="glyphicon glyphicon-share"></span></button>
                </div>
            </form>
        </div>
    </div>


</div>  <!-- end main content column -->

   </div>  <!-- end main content row -->

</div>   <!-- end main content container -->

<?php

if(isset($_POST['share'])){ // Fetching variables of the form which travels in URL

    $name = $_SESSION["username"];

    $msg = $_POST['msg'];
    
    $pokemon = $_POST['pokemon'];

    if(empty($msg)){

        echo ("<script>window.location.href='error.php'</script>;");
    } else{
        $sql_comment = mysqli_query($mysqli,'SELECT PokemonID, PokemonName FROM `Pokemon` WHERE PokemonID = '.$_GET['id'].';');

       while ($comment = $sql_comment->fetch_assoc()){
           echo $comment['PokemonName'];
           $sql_insert = mysqli_query($mysqli,"INSERT INTO Message(UName, Message, PokemonName) VALUES ('$name','$msg', '". $comment['PokemonName'] ."')");

       }

        echo ("<script>window.location.href='success.php'</script>;");

    }
}
mysqli_close($mysqli); // Closing Connection with Server
?>


<?php include 'footer.php'; ?>

 <script src="bootstrap3/dist/js/carousel.js"></script>
 <script src="bootstrap3/assets/js/jquery.js"></script>
 <script src="bootstrap3/dist/js/bootstrap.min.js"></script>
 <script src="bootstrap3/assets/js/holder.js"></script>
</body>
</html>
