<?php
    require 'bd_config/dbSettings.php';

    $host = $db_host;
    $usuario = $db_user;
    $contrasenia = "";
    $base_de_datos = $db_name;

    try {
        $conn = new PDO("mysql:host=$host;dbname=$base_de_datos;", $usuario, $contrasenia);
    } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
    }
?>
    