<?php

$user = 'root';
$pass = 'admin12345678';
$db = 'PokemonPokedex';
$host= 'http://18.205.194.68/';

$mysqli = new mysqli($host, $user, $pass, $db);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>
