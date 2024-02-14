
<?php
    require_once 'bd_config/conexion.php';
    $Id = $_GET['Id'];
    $records = $conn->prepare('SELECT * FROM usuarios');
    $records->execute();
    $results = $records->fetchAll();

    $records2 = $conn->prepare('SELECT * FROM usuarios WHERE Id = :Id');
    $records2->bindParam(':Id', $Id);
    $records2->execute();
    $results2 = $records2->fetchAll();
    $fecha_hoy = date("Y-m-d");
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

        </head>
        <body id="page">
            <?php  require_once 'navbar.php'; ?>

            <form action="deleteuserBack.php" method="POST">
            
                <div class="row">
                    <div class="col-md-12 btnregresar">
                        <a href="home.php" class="btn btn-outline-warning">Regresar</a>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 titulos">
                            <h1>Formulario de Usuario</h1>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="estatus" id="estatus" value="B">
                <input hidden type="date" name="fecha_act" id="fecha_act" value="<?php echo $fecha_hoy ?>">
                <input hidden type="date" name="fecha_baja" id="fecha_baja" value="<?php echo $fecha_hoy ?>">

                <br><br>
                <?php foreach ($results2 as $row) {  ?>
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="PrimerApe">Primer Apellido</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input style="text-transform: uppercase" type="text" name="PrimerApe" id="PrimerApe" class="form-control" value="<?php echo $row['PrimerApe']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="SegundoApe">Segundo Apellido</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input style="text-transform: uppercase" type="text" name="SegundoApe" id="SegundoApe" class="form-control" value="<?php echo $row['SegundoApe']?>" >
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="Nombres">Nombres</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input style="text-transform: uppercase" type="text" name="Nombres" id="Nombres" class="form-control" value="<?php echo $row['Nombres']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="rfc">RFC</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input style="text-transform: uppercase" type="text" name="rfc" id="rfc" class="form-control" value="<?php echo $row['rfc']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="Telefono">Teléfono</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="Telefono" id="Telefono" class="form-control" value="<?php echo $row['Telefono']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="correo">Correo electrónico</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="correo" id="correo" class="form-control" value="<?php echo $row['correo']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="area">Área/Unidad</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="area" id="area" class="form-control"  value="<?php echo $row['area']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="Cargo">Cargo/Grado</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="Cargo" id="Cargo" class="form-control"  value="<?php echo $row['Cargo']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="Municipio">Municipio</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input style="text-transform: uppercase" type="text" name="Municipio" id="Municipio" class="form-control" value="<?php echo $row['Municipio']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="Usuario">Usuario</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input style="text-transform: uppercase" type="text" name="Usuario" id="Usuario"  value="<?php echo $row['Usuario']?>" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="fecha">Fecha de captura</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="date" name="fecha" id="fecha" class="form-control"  value="<?php echo $row['fecha']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="Pmfest">PAIMEF/ESTATAL</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="Pmfest" id="Pmfest" class="form-control">
                                            <option value="<?php echo $row['Pmfest']?>"> <?php echo $row['Pmfest']?></option>
                                            <option value="0">Seleccione una opción</option>
                                            <option value="PAIMF">PAIMEF</option>
                                            <option value="ESTATAL">ESTATAL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="row">
                                    <label for="Perfil">Perfil</label>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <select name="Perfil" id="Perfil" class="form-control">
                                            <option value="<?php echo $row['Perfil']?>"> <?php echo $row['Perfil']?></option>
                                            <option value="0">Seleccione una opción</option>
                                            <option value="Capturista">Capturista</option>
                                            <option value="Enlace Institucional">Enlace Institucional</option>
                                            <option value="Enlace Estatal">Enlace Estatal</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>

                    <br><br>

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 titulos">
                                <input type="hidden" name="Id" value="<?php echo $row['Id']?>">
                                <button type="submit" class="btn btn-outline-danger">Dar de Baja</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            
            
            
            </form>
            
            <script src="js/script.js"></script>
        </body>
    </html>



