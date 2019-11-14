<?php

include 'dbinfo.php';


?>
<head>
    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="bootstrap3/dist/bootstrap.css" rel="stylesheet">

    <link href="bootstrap3/dist/bootstrap-theme.css" rel="stylesheet">
    <link href="header.css" rel="stylesheet"/>
    <link href="css/modal_single_game.css" rel="stylesheet"/>

    <script src="bootstrap3/assets/js/html5shiv.js"></script>
    <script src="bootstrap3/assets/js/respond.min.js"></script>
    <script src="js/jquery-1.5.js"></script>
    <style>
        .img-logo:hover {
            opacity: 0.7;
        }


        .loginForm div input:nth-child(1) {
            margin-bottom: 5px;
        }
    </style>
</head>
<header>
    <!--Begin navbar-->
    <div class="container" >
        <nav class="navbar navbar-default panel-primary">
            <div class="container-fluid">
                <!-- logo and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php">
                        <img class="img-responsive img-logo" alt="Index" src="images/pokemonlogo.png" style="width: 60px;">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li <?php
                        if (basename($_SERVER['SCRIPT_FILENAME']) == 'Pokemons.php') {
                            echo("class='active'");
                        }
                        ?>><a href="Pokemons.php"><img class="img-responsive img-logo" style="height: 20px;" src="images/pokeball.jpeg"></a></li>

                        <li <?php
                        if (basename($_SERVER['SCRIPT_FILENAME']) == 'Moves.php') {
                            echo("class='active'");
                        }
                        ?>><a href="Moves.php"><img class="img-responsive img-logo" style="height: 20px " src="images/greatball.jpg"></a></li>
                        <li <?php
                        if (basename($_SERVER['SCRIPT_FILENAME']) == 'ForumsSNS.php') {
                            echo("class='active'");
                        }
                        ?>><a href="ForumsSNS.php"><img class="img-responsive img-logo" style="height: 20px  " src="images/ultraball.jpg"></a></li>
                        <li <?php
                        if (basename($_SERVER['SCRIPT_FILENAME']) == 'userProfile.php') {
                            echo("class='active'");
                        }
                        ?>><a href="userProfile.php"><img class="img-responsive img-logo" style="height: 20px; " src="images/pikachu_pokemon_profile_avatar_people-512.png"></a></li>

                    </ul>
                    <form class="navbar-form navbar-right" method="POST" action="SearchQuery.php">
                        <div class="form-group">
                            <input type="text" class="form-control" name="search" placeholder="Search" style="width: 250px;">
                        </div>
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                        <a href="logout.php" class="btn btn-danger">Sign Out <span class="glyphicon glyphicon-log-out"></span></a>
                    </form>

                </div>
            </div>
        </nav>
    </div>

</header>
