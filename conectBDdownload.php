<?php   
     require 'bd_config/dbSettings.php';
    
    $host = $db_host;
    $usuario = $db_user;
    $contrasenia = $db_pass;
    $base_de_datos = $db_name;

    $mysqli = new mysqli($host, $usuario, $contrasenia, $base_de_datos);
    if ($mysqli->connect_errno) {
        echo "Falló la conexión a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }
    return $mysqli;
?>