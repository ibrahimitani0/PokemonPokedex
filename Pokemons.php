<!DOCTYPE html>
<html lang="en">
<head>
    <title>PokeLookUp</title>
</head>
<body background = "images/poketexture1.jpg">
<style>
    .container-outer { overflow: scroll; width: 100%; height: 970px; }

    .container-inner { width: 100%; }
</style>

<?php include 'header.php'; ?>


<div class="container ">  <!-- Main Div content container -->
    <div class="row">  <!-- Main content row -->
        <div class="col-md-3 ">  <!-- start left navigation rail column -->
            <?php include 'side.php'; ?>
        </div>  <!-- end left navigation rail -->


        <div class="col-md-9  ">  <!-- start main content column -->

            <?php
            if (isset($_SESSION['UID'])) {
                echo '<div class="panel panel-primary" ><div class="panel-heading"><h4>Generation 1 Pokemons</h4></div><div class="panel-body container-outer" ><div class="container-inner" >';

            } else {
                echo '<div class="panel panel-primary"><div class="panel-heading"><h4>Generation 1 Pokemons</h4></div><div class="panel-body container-outer"><div class="container-inner" >';

            }

            ?>

            <?php
            $sql_display = mysqli_query($db, "SELECT * FROM `Pokemon`;");
            while ($pull_data = $sql_display->fetch_assoc()) {
                echo '<div class="img-thumbnail col-md-3" style=" margin: 30px;"  >
                  <a  href="PokeProfile.php?id=' . $pull_data['PokemonID'] . '">
                    <img style="margin-left: 20%;" width="100" height="100;" src="images/pic/' . $pull_data['ImagePath'] . '" alt="random image">' . '
                    <div style="text-align: center;"><p class="btn btn-primary" style="width: 100%; margin-top: 5%">'. $pull_data['PokemonName'] .'</p>
                   </div>
                  </a>';

                if($pull_data['Type2'] != null) {
                    echo '<p style="text-align: center;"><img class="img-thumbnail" style="height: 30px; margin: 5px;" src="images/TYPE/' . $pull_data['Type1'] . '.png" alt="' . $pull_data['PokemonName'] . '"/>
                                    <img class="img-thumbnail" style="height:30px;"src="images/TYPE/' . $pull_data['Type2'] . '.png" alt="' . $pull_data['PokemonName'] . '"/></p>';
                }else {
                    echo '<p style="text-align: center;"><img class="img-thumbnail" style="height: 30px; margin: 5px;" src="images/TYPE/' . $pull_data['Type1'] . '.png" alt="' . $pull_data['PokemonName'] . '"/></p>';
                }

                 
                  
                  

                  echo'</div>';
            }

            ?>

        </div>
        </div>
    </div>
    <?php if (isset($_SESSION['UID'])) {
        echo '</div></div>';
    } else {
        echo '</div></div>';

    }
    ?>

</div>   <!-- end main content container -->

<?php include 'footer.php'; ?>

<script src="bootstrap3/dist/js/carousel.js"></script>
<script src="bootstrap3/assets/js/jquery.js"></script>
<script src="bootstrap3/dist/js/bootstrap.min.js"></script>
<script src="bootstrap3/assets/js/holder.js"></script>
<script>$(document).ready(function() {
var container_width = SINGLE_IMAGE_WIDTH * $(".container-inner a").length;
$(".container-inner").css("width", container_width);
});
</script>
</body>
</html>
