<?php

include 'dbinfo.php';

$db = new mysqli('pokemonpokedex.c2mgephvrle7.us-east-1.rds.amazonaws.com', $user, $pass, $db) or die ("Unable to connect");


?>

         <div class="panel panel-primary">
             <div class="panel-heading"><span><img alt="pokeball" src="images/pokeballside2.png" style="height: 20px;"></span> Pokemons By Type</div>


           <ul class="list-group">
              <li class="list-group-item"><a class="btn btn-block" style="background-color: grey; color: white" href="SinglePokemon.php?Type1=Normal"> Normal</a></li>
              <li class="list-group-item"><a class="btn btn-block" style="background-color: green; color: white" href="SinglePokemon.php?Type1=Grass"> Grass</a></li>
              <li class="list-group-item"><a class="btn btn-block" style="background-color: darkslateblue; color: white" href="SinglePokemon.php?Type1=Dragon"> Dragon</a></li>
               <li class="list-group-item"><a class="btn btn-block" style="background-color: orangered; color: white" href="SinglePokemon.php?Type1=Fire"> Fire</a></li>
               <li class="list-group-item"><a class="btn btn-block" style="background-color: dodgerblue; color: white" href="SinglePokemon.php?Type1=Water"> Water</a></li>
               <li class="list-group-item"><a class="btn btn-block" style="background-color: olivedrab; color: white" href="SinglePokemon.php?Type1=Bug"> Bug</a></li>
               <li class="list-group-item"><a class="btn btn-block" style="background-color: deeppink; color: white" href="SinglePokemon.php?Type1=Psychic">Psychic</a></li>
                <li class="list-group-item"><a class="btn btn-block" style="background-color: gold; color: white" href="SinglePokemon.php?Type1=Electric">Electric</a></li>
                <li class="list-group-item"><a class="btn btn-block" style="background-color: brown; color: white" href="SinglePokemon.php?Type1=Fight">Fighting</a></li>
                <li class="list-group-item"><a class="btn btn-block" style="background-color: cornflowerblue; color: white" href="SinglePokemon.php?Type1=Flying">Flying</a></li>
                <li class="list-group-item"><a class="btn btn-block" style="background-color: slateblue; color: white" href="SinglePokemon.php?Type1=Ghost">Ghost</a></li>
                 <li class="list-group-item"><a class="btn btn-block" style="background-color: #c0a16b; color: white" href="SinglePokemon.php?Type1=Ground">Ground</a></li>
                 <li class="list-group-item"><a class="btn btn-block" style="background-color: violet; color: white"href="SinglePokemon.php?Type1=Fairy">Fairy</a></li>
                 <li class="list-group-item"><a class="btn btn-block" style="background-color: #8a6d3b; color: white" href="SinglePokemon.php?Type1=Rock">Rock</a></li>
                 <li class="list-group-item"><a class="btn btn-block" style="background-color: lightsteelblue; color: white" href="SinglePokemon.php?Type1=Steel"> Steel</a></li>
                 <li class="list-group-item"><a class="btn btn-block" style="background-color: deepskyblue; color: white" href="SinglePokemon.php?Type1=Ice">Ice</a></li>
               <li class="list-group-item"><a class="btn btn-block" style="background-color: rgba(100,22,74,0.76); color: white" href="SinglePokemon.php?Type1=Poison">Poison</a></li>
               <li class="list-group-item"><a class="btn btn-block" style="background-color: rgba(44,20,9,0.92); color: white" href="SinglePokemon.php?Type1=Dark">Dark</a></li>
           </ul>
         </div>  <!-- end continents panel -->
