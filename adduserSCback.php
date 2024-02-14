<?php
    require_once 'bd_config/conexion.php';

    $sql = "INSERT INTO usuarios  (PrimerApe, SegundoApe, Nombres, rfc, Telefono, correo, area, Cargo, Municipio, fecha, Pmfest, Perfil, estatus, Solicitud) 
    VALUES (:PrimerApe, :SegundoApe, :Nombres, :rfc, :Telefono, :correo, :area, :Cargo, :Municipio, :fecha, :Pmfest, :Perfil, :estatus, :Solicitud)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':PrimerApe', $_POST['PrimerApe']);
    $stmt->bindParam(':SegundoApe', $_POST['SegundoApe']);
    $stmt->bindParam(':Nombres', $_POST['Nombres']);
    $stmt->bindParam(':rfc', $_POST['rfc']);
    $stmt->bindParam(':Telefono', $_POST['Telefono']);
    $stmt->bindParam(':correo', $_POST['correo']);
    $stmt->bindParam(':area', $_POST['area']);
    $stmt->bindParam(':Cargo', $_POST['Cargo']);
    $stmt->bindParam(':Municipio', $_POST['Municipio']);
    $stmt->bindParam(':fecha', $_POST['fecha']);
    $stmt->bindParam(':Pmfest', $_POST['Pmfest']);
    $stmt->bindParam(':Perfil', $_POST['Perfil']);
    $stmt->bindParam(':estatus',$_POST['estatus']);
    $stmt->bindParam(':Solicitud',$_POST['Solicitud']);

    if ($stmt->execute()) {
        header("Location: CreateUser.php");  
    } else {
        header("Location: adduserSC.php");
    }
    
     


?>