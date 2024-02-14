
<?php
    session_start();
    require_once 'bd_config/conexion.php';


    if (!isset($_SESSION['loggedin'])) {

        header('Location: index.php');
        exit;
    }

    $records = $conn->prepare('SELECT * FROM usuarios WHERE estatus ="A" ORDER BY fecha DESC');
    $records->execute();
    $results = $records->fetchAll();

    
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width,initial-scale=1.0">
        
            <title>Cuentas BANAVIM</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
            <link href="/css/style.css" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
            
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

        </head>
        <body id="page">
           <?php  require_once 'navbar.php'; ?>
           <script>
                $(document).ready(function(){
                    $('#table_id').DataTable({
                        ordering:  false
                    });
                    
                });
           </script>

            <div class="container-fluid">
                <br>
                <div class="row">
                    <div class="col-md-12 titulos">
                        <h1>Panel de usuarios</h1>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                       
                        <a class="btn btn-outline-success" href="adduser.php">Agregar usuario</a>
                       
                    </div>
                </div>
                <br>
               

                <div class="row">
                    <div class="col-md-12">
                        <table id="table_id" class="table  table-home ">
                            <thead>
                                <tr>
                                <th scope="col">Cuenta</th>
                                <th scope="col">Nombre completo</th>
                                <th scope="col">CRV</th>
                                <th scope="col">Estatal/PAIMEF</th>
                                <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($results as $row) {  ?>
                                    <tr>
                                        <th scope="row"><?php echo $row['Usuario'] ?></th>
                                        <td><?php echo $row['PrimerApe']?> <?php echo $row['SegundoApe']?> <?php echo $row['Nombres']?></td>
                                        <td><?php echo $row['Municipio'] ?></td>
                                        <td><?php echo $row['Pmfest'] ?></td>
                                        <td>
                                            <a href="edituser.php?Id=<?php echo $row['Id']?>" class="btn btn-warning">Editar</a>
                                            <a target="_blank" href="ficha.php?Id=<?php echo $row['Id']?>" class="btn btn-info">Ficha</a>
                                            <a href="deleteuser.php?Id=<?php echo $row['Id']?>" class="btn btn-danger">Baja</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <script src="js/script.js"></script>
            
           
            
        </body>
    </html>