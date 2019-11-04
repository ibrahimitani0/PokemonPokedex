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

            <div class="row">
                <?php
                echo '<div class="panel panel-primary"><div class="panel-heading"><h4>Pokemons By Type: ' . $_GET['Type1'] . '  </h4></div><div class="panel-body">';
                $sql_display = mysqli_query($db, 'SELECT * FROM Pokemon WHERE Type2 ="' .$_GET['Type1'] .'" OR Type1 = "'. $_GET['Type1'] .'";');
                while ($pull_data = $sql_display->fetch_assoc()) {

                    echo '<div class="col-md-3">
                            <div class="img-thumbnail" style="margin: 10%;">
                              <a style="text-decoration: solid" href="PokeProfile.php?id=' . $pull_data['PokemonID'] . '">
                                <img height="80" src="images/icons/' . $pull_data['ImagePath'] . '" alt="random image">' .
                                 '<p class="btn btn-block" style="text-align: center; text-decoration-style: solid;">'. $pull_data['PokemonName'] .'</p>'.
                              '</a>
                            </div>
                          </div>';

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
