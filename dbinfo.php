<?php

$user = 'admin';
$pass = 'admin12345678';
$db = 'PokemonPokedex';
$host= 'pokemonpokedex.celd9dadbfms.us-east-1.rds.amazonaws.com';

$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>
