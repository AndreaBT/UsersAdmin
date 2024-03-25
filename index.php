<?php
    session_start();
    require_once 'bd_config/conexion.php';
    

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
            <!-- ESTILOS -->
            <link href="css/style.css" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
            
            <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>

            <script src="https://www.google.com/recaptcha/api.js"></script>

            <script>
                function onSubmit(token) {
                    document.getElementById("demo-form").submit();
                }
            </script>

        </head>
        <body class="body2">

            <div class="page2">
                <div class="container2">
                    <div class="left">
                        <div class="login">Login</div>
                        <div class="eula">Panel de usuarios para el manejo de las cuentas ingresadas en el BANAVIM</div>
                    </div>
                    <div class="right">
                        <svg viewBox="0 0 320 300">
                            <defs>
                                <linearGradient
                                                inkscape:collect="always"
                                                id="linearGradient"
                                                x1="13"
                                                y1="193.49992"
                                                x2="307"
                                                y2="193.49992"
                                                gradientUnits="userSpaceOnUse">
                                    <stop
                                        style="stop-color:#ff00ff;"
                                        offset="0"
                                        id="stop876" />
                                    <stop
                                        style="stop-color:#ff0000;"
                                        offset="1"
                                        id="stop878" />
                                </linearGradient>
                            </defs>
                            <path d="m 40,120.00016 239.99984,-3.2e-4 c 0,0 24.99263,0.79932 25.00016,35.00016 0.008,34.20084 -25.00016,35 -25.00016,35 h -239.99984 c 0,-0.0205 -25,4.01348 -25,38.5 0,34.48652 25,38.5 25,38.5 h 215 c 0,0 20,-0.99604 20,-25 0,-24.00396 -20,-25 -20,-25 h -190 c 0,0 -20,1.71033 -20,25 0,24.00396 20,25 20,25 h 168.57143" />
                        </svg>
                        <form  id="demo-form" action="autenticacion.php" method="post">
                            <div class="form">
                                <label class="label2" for="username">Usuario</label>
                                <input class="input2" type="text" name="username" id="username">
                                <label class="label2" for="password">Contraseña</label>
                                <input class="input2" type="password" name="password" id="password">
                                <button class="g-recaptcha input2" 
                                data-sitekey="6LfTRZMUAAAAAFarfRkxJI-pTAZcJdkuWUZDK1fY" 
                                data-callback='onSubmit' 
                                data-action='submit'>Acceder</button>

                                <!-- <input class="input2"  type="submit" id="submit" value="Acceder"> -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>



           

            

            
            
        </body>
    </html>