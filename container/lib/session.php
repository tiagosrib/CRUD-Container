<?php

if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['usuario'])){
    die('Você não está logado! <a href="index.php"> LOGIN</a>');
}

?>