<?php
//Conexión
$server = 'localhost';
$username = 'root';
$password = 'root';
$database = 'blog_master';
$db = mysqli_connect($server, $username, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

// Iniciar la sesion
if(!isset($_SESSION)){
    session_start();
}

?>