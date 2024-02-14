<?php
    require_once 'bd_config/conexion.php';

    $Id =   $_POST['Id'];

    $sql = "UPDATE usuarios set PrimerApe =:PrimerApe , SegundoApe  =:SegundoApe, Nombres  =:Nombres, rfc =:rfc, Telefono =:Telefono, correo =:correo, area =:area, 
    Cargo =:Cargo, Municipio =:Municipio, fecha =:fecha, Pmfest =:Pmfest, Perfil =:Perfil, fecha_act = :fecha_act, estatus = :estatus, Solicitud = :Solicitud WHERE Id = :Id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Id', $Id);
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
    $stmt->bindParam(':fecha_act', $_POST['fecha_act']);
    $stmt->bindParam(':estatus',$_POST['estatus']);
    $stmt->bindParam(':Solicitud',$_POST['Solicitud']);


    if ($stmt->execute()) {
        header("Location: CreateUser.php");  
    } else {
        header("Location: edituserSC.php");
    }
    
     


?>