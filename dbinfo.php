<?php

$user = 'root';
$pass = 'admin12345678';
$db = 'PokemonPokedex';
$host= 'pokemonpokedex.c2mgephvrle7.us-east-1.rds.amazonaws.com';

$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>
