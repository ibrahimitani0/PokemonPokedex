<?php

$user = 'root';
$pass = '';
$db = 'PokemonPokedex';
$host= 'localhost';

$mysqli = new mysqli($host, $user, $pass = '', $db);

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

?>
