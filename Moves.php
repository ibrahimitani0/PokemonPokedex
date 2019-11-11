
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PokemonPokedex</title>
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
                echo '<div class="panel panel-primary" ><div class="panel-heading"><h4>All Pokemon Moves</h4></div><div class="panel-body container-outer" ><div class="container-inner" >';

            } else {
                echo '<div class="panel panel-primary"><div class="panel-heading"><h4>All Pokemon Moves</h4></div><div class="panel-body container-outer"><div class="container-inner" >';

            }

            ?>

            <?php
            $sql_moves = mysqli_query($mysqli, 'SELECT accuracy, ename, power, pp, tm, max_pp, PokeType FROM moves ;');

            while ($pull_data = $sql_moves->fetch_assoc()) {

                echo '<div class="img-thumbnail col-md-3" style=" margin: 30px;"  >
                       <div>'.
                      '<div class="panel-body" >'.
                      '<p ><span class="label label-info">Move Name: ' . $pull_data['ename'] . '</span></p>' .
                      '<p><span class="label label-info">Accuracy: <meter value="' . $pull_data['accuracy'] . '" min="0" max="100"></meter> ' . $pull_data['accuracy'] . ' </span></p>' .
                      '<p><span class="label label-danger">Power: <meter value="' . $pull_data['power'] . '" min="0" max="100"></meter> ' . $pull_data['power'] . '</span></p>' .
                      '<p><span class="label label-warning">PP: <meter value="' . $pull_data['pp'] . '" min="0" max="100"></meter> ' . $pull_data['pp'] . '</span></p>' .
                      '<p><span class="label label-success">TM: <meter value="' . $pull_data['tm'] . '" min="0" max="100"></meter>  ' . $pull_data['tm'] . '</span></p>' .
                      '<p><span class="label label-default">Max PP: <meter value="' . $pull_data['max_pp'] . '" min="0" max="100"></meter> ' . $pull_data['max_pp'] . '</span></p>' .
                    '</div>'.'</div>';

                if($pull_data['PokeType'] != NULL) {
                    echo '<p style="text-align: center;"><img class="img-thumbnail" style="height: 30px; margin: 5px;" src="images/TYPE/' . $pull_data['PokeType'] . '.png" alt="' . $pull_data['ename'] . '"/></p>';
                }else {
                    echo '<p style="text-align: center;"><img class="img-thumbnail" style="height: 30px; margin: 5px;" src="images/TYPE/' . $pull_data['PokeType'] . '.png" alt="' . $pull_data['ename'] . '"/></p>';
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
