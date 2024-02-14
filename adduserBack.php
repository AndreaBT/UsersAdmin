<?php
    require_once 'bd_config/conexion.php';

    $sql = "INSERT INTO usuarios  (PrimerApe, SegundoApe, Nombres, rfc, Telefono, correo, area, Cargo, Municipio, Usuario, fecha, Pmfest, Perfil, estatus) 
    VALUES (:PrimerApe, :SegundoApe, :Nombres, :rfc, :Telefono, :correo, :area, :Cargo, :Municipio, :Usuario, :fecha, :Pmfest, :Perfil, :estatus)";
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
    $stmt->bindParam(':Usuario', $_POST['Usuario']);
    $stmt->bindParam(':fecha', $_POST['fecha']);
    $stmt->bindParam(':Pmfest', $_POST['Pmfest']);
    $stmt->bindParam(':Perfil', $_POST['Perfil']);
    $stmt->bindParam(':estatus',$_POST['estatus']);

    if ($stmt->execute()) {
        header("Location: home.php");  
    } else {
        header("Location: adduser.php");
    }
    
     


?>