<!DOCTYPE html>
<html lang="en">
<head>
    <title>PokeLookUp</title>
</head>
<body  background = "images/poketexture1.jpg">
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
                  <h4>Welcome to PokeLookUp</h4>
              </div>
                <div class="panel-body">
                  <p class = "panel-primary" style="margin-bottom: 5%"> Welcome Trainer!! PokeLoopUp is a Generation 1 Pokemon Database where you can view all 151 Gen 1 Pokemons with all their stats, enjoy your stay.</p>

                  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                      <div style="padding-bottom:10px;"><h3>Kanto Region Map</h3></div>
                      <div class="carousel-inner" role="listbox">
                          <div class="item active">
                              <img src="images/kantoMap.jpg"/>
                          </div>
                      </div>
                </div>
            </div>
        </div>
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
