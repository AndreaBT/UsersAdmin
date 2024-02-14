
<?php
    require_once 'bd_config/conexion.php';

    $records = $conn->prepare('SELECT * FROM usuarios');
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

        </head>
        <body id="page">
            <?php  require_once 'navbar.php'; ?>

            <form action="downloadBD.php" method="POST">
                <div  class="container-fluid">
                    <br>
                    <div class="row">
                        <div class="col-md-12 titulos">
                            <h1>Descargar Base de datos</h1>
                        </div>
                    </div>
                    <br>
                    
                    <div class="row">
                        <div class="col-md-12 titulos">
                            <button class="btn btn-outline-info">Descargar base de datos</button>
                        </div>
                    </div>
                </div>
            </form>

           
            
            <script src="js/script.js"></script>
        </body>
    </html>