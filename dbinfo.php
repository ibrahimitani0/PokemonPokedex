<?php

$user = 'root';
$pass = 'admin12345678';
$db = 'PokemonPokedex';
$host= 'pokemonpokedex.ca6zg7y5i54m.us-east-2.rds.amazonaws.com';

$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>
