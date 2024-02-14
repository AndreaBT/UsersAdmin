
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
        <body  id="page" >
            <?php  require_once 'navbar.php'; ?>

            <form action="adduserSCback.php" method="POST">
                <br>
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

                <br><br>
                <input type="hidden" name="estatus" id="estatus" value="S">

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <label for="PrimerApe">Primer Apellido</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input style="text-transform: uppercase" type="text" name="PrimerApe" id="PrimerApe" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label for="SegundoApe">Segundo Apellido</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input style="text-transform: uppercase" type="text" name="SegundoApe" id="SegundoApe" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label for="Nombres">Nombres</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input style="text-transform: uppercase" type="text" name="Nombres" id="Nombres" class="form-control">
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
                                    <input style="text-transform: uppercase" type="text" name="rfc" id="rfc" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label for="Telefono">Teléfono</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="Telefono" id="Telefono" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label for="correo">Correo electrónico</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="correo" id="correo" class="form-control">
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
                                    <input type="text" name="area" id="area" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label for="Cargo">Cargo/Grado</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="text" name="Cargo" id="Cargo" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label for="Municipio">Municipio</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input style="text-transform: uppercase" type="text" name="Municipio" id="Municipio" class="form-control">
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
                                        <option value="0">Seleccione una opción</option>
                                        <option value="Capturista">Capturista</option>
                                        <option value="Enlace Institucional">Enlace Institucional</option>
                                        <option value="Enlace Estatal">Enlace Estatal</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <label for="fecha">Fecha de solicitud</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="date" name="fecha" id="fecha" class="form-control">
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
                                        <option value="0">Seleccione una opción</option>
                                        <option value="PAIMEF">PAIMEF</option>
                                        <option value="ESTATAL">ESTATAL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="row">
                                <label for="Solicitud">Tipo de Solicitud</label>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <select name="Solicitud" id="Solicitud" class="form-control">
                                        <option value="0">Seleccione una opción</option>
                                        <option value="Nueva Cuenta">Nueva Cuenta</option>
                                        <option value="Modificación de privilegios">Modificación de privilegios</option>
                                        <option value="Inhabilitación de cuenta">Inhabilitación de cuenta</option>
                                        <option value="Otro">Otro</option>
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
                            <button type="submit" class="btn btn-outline-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            
            
            
            </form>

            <script src="js/script.js"></script>
            
        </body>
    </html>



