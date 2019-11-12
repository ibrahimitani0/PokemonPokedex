<?php

$user = 'root';
$pass = 'admin12345678';
$db = 'PokemonPokedex';
$host= 'pokemonpokedex.cg60yrfxwjb1.us-east-1.rds.amazonaws.com';

$mysqli = new mysqli($host, $user, $pass = 'admin12345678', $db);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>
