<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "containers";

$mysqli = new mysqli($host, $user, $pass, $db);
if($mysqli->connect_errno) {
    die("FALHA NA CONEXAO");
}

?>