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
<style>
    #container-outer { overflow: scroll; width: 100%; height: 970px; }

    #container-inner { width: 100%; }
</style>

<body>

<?php include 'header.php'; ?>

<div class="container">  <!-- start main content container -->
    <div class="row">  <!-- start main content row -->
        <div class="col-md-3">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->

        <div class="panel-primary col-md-9" >


            <div class="panel panel-heading">Search Results</div><div id="container-outer"><div id="container-inner">
            <?php
                if($_POST['search'] !== '') {
                    $query = mysqli_query($db, "SELECT * FROM `Pokemon` where Type1 LIKE '" . $_POST['search'] . "' OR Type2 LIKE '" . $_POST['search'] . "' OR DexNumber LIKE '" . $_POST['search'] . "' OR PokemonName Like '%" . $_POST['search'] . "%'or PokemonName LIKE '%". $_POST['search']."%';");

                    while ($pull_data = $query->fetch_assoc()) {
                        echo '<div class="well">'.
                                '<div class="row">' .
                                    '<div class="col-md-9">'.
                                        '<div class="col-md-3">'.
                                            '<div class="list-group" style="background: white;">'.
                                                '<a href="PokeProfile.php?id='. $pull_data['PokemonID'] .'">'.
                                                    '<img class="img-thumbnail" src="images/pic/' . $pull_data['ImagePath'] . '" alt="random image">'.
                                                '</a>'.
                                            '</div>'.
                                        '</div>'.
                                        '<div class="col-md-6">'.
                                            '<p><span class="label label-primary">Name:</span> '. $pull_data['PokemonName'].'</p>'.
                                            '<p><span class="label label-info">Pokedex Number:</span> '. $pull_data['DexNumber'].'</p>';

                              if($pull_data['Type2'] != null) {
                                  echo '<p><span class="label label-danger">Type:</span> <img class="img-thumbnail" style="height: 30px;" src="images/TYPE/' . $pull_data['Type1'] . '.png" alt="' . $pull_data['PokemonName'] . '"/>
                                    <img class="img-thumbnail" style="height:30px;"src="images/TYPE/' . $pull_data['Type2'] . '.png" alt="' . $pull_data['PokemonName'] . '"/></p>';
                              }else {
                                  echo '<p><span class="label label-danger">Type:</span> <img class="img-thumbnail" style="height: 30px;" src="images/TYPE/' . $pull_data['Type1'] . '.png" alt="' . $pull_data['PokemonName'] . '"/></p>';
                              }
                       echo '<div style="padding-top: 10px"><a href="PokeProfile.php?id='. $pull_data['PokemonID'] .'" class="btn btn-primary">Pokemon Profile</a></div>';
                                        echo'</div>'.
                                  '</div>'.
                                '</div>'.
                            '</div>';

                    }
                }
            ?>
                    </div>
                </div>




        </div>  <!-- end main content column -->
    </div>  <!-- end main content row -->
</div>   <!-- end main content container -->

<?php include 'footer.php'; ?>
<script>
    window.onbeforeunload = function() {"";};
</script>
<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
<script>$(document).ready(function() {
        var container_width = SINGLE_IMAGE_WIDTH * $("#container-inner a").length;
        $("#container-inner").css("width", container_width);
    });
</script>

</body>
</html>
