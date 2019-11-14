<?php

$user = 'root';
$pass = 'admin12345678';
$db = 'PokemonPokedex';
$host= 'http://pokemonlb-1722982400.us-east-1.elb.amazonaws.com/';

$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>
