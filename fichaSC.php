<?php

require 'vendor/autoload.php';
$mysqli = include_once "conectBDdownload.php";



$mpdf = new \Mpdf\Mpdf();

$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

$mpdf->SetHTMLHeader('
<table width="100%">
    <tr>
        <td width="30%">
        <img src="img/gobernacion.png" width="20%" alt=""> 
            <img styel="padding-top:2%;" src="img/FelipeCarrillo.png" width="10%" alt="">
            
           
        </td>
        <td width="33%" align="center"   style="font-size: 8px;"><br>
        <b>BANCO NACIONAL DE DATOS E INFORMACIÓN SOBRE CASOS DE VIOLENCIA CONTRA LAS MUJERES</b></td>
        <td width="23%" style="text-align: right;"> <img src="img/banavim.png" width="15%" alt=""></td>
    </tr>
</table>
');

$mpdf->WriteHTML('<br><br>');
$mpdf->WriteHTML('
<style>
    @font-face {
        font-family: "Hofmann";
        src: url("fonts/Barlow-Black.ttf");
    }

    .Resultado{
        font-family: "Hofmann";
        color: #8b6eaa;
    }
</style>

');

// Buscando en Base de datos
$Id = $_GET['Id'];
$buscandoRes = $mysqli->query("SELECT  * FROM usuarios WHERE Id = $Id");

// Haciendo Fech
$respuestas = $buscandoRes->fetch_all(MYSQLI_ASSOC);
$NuevaC ="";
$ModiC ="";
$InhaC ="";
$OtroC ="";

$Cap ="";
$EnlaceI ="";
$EnlaceE ="";

foreach ($respuestas as $exp) {
    if ($exp['Solicitud'] == "Nueva Cuenta") {
        $NuevaC ="X";
    }elseif ($exp['Solicitud'] == "Modificación de privilegios") {
        $ModiC ="X";
    }elseif ($exp['Solicitud'] == "Inhabilitación de cuenta") {
        $InhaC ="X";
    }elseif ($exp['Solicitud'] == "Otro") {
        $OtroC ="X";
    }

    if ($exp['Perfil'] == "Capturista") {
        $Cap ="X";
    }elseif ($exp['Perfil'] == "Enlace Institucional") {
        $EnlaceI ="X";
    }elseif ($exp['Perfil'] == "Enlace Estatal") {
        $EnlaceE ="X";
    }
    $mpdf->WriteHTML('
    <div  style="text-align: center;">
        <table width="100%">
            <tr style="background-color: #9a81b5;">
                <td style="text-align: center; color:#fff;"> <h5>SOLICITUD DE CUENTA DE ACCESO</h5> </td>
            </tr>
        </table>
        
    </div>

    <table  width="100%">
        <tr >
            <td rowspan="2" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Marque con una "X" el tipo de solicitud:</td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse; font-size: 10px;"><b> '.$NuevaC.'</b> Nueva Cuenta </td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse; font-size: 10px;"><b> '.$ModiC.' </b>Modificación de privilegios</td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse; font-size: 10px;"><b> '.$InhaC.' </b>Inhabilitación de cuenta </td>
            <td scope="col"  style="text-align: center;border: 1px solid black; border-collapse: collapse;">
                <div style="background-color: #e2dfeb;font-size: 10px;"> Fecha de Solicitud</div>
                <div >'.$exp['fecha'].' </div>
                <div style="font-size: 10px;" > Día/Mes/Año</div>
            </td>
        </tr>
        <tr>
            <th colspan="4" scope="colgroup" style="font-size: 10px;text-align: left;border: 1px solid black; border-collapse: collapse;"><b>  '.$OtroC.'</b> Otro</th>
        </tr>
    </table>

    <div  style="text-align: center;">
        <table width="100%">
            <tr style="background-color: #9a81b5;">
                <td style="text-align: center; color:#fff;"> <h5>DATOS GENERALES DE LA USUARIA O USUARIO</h5> </td>
            </tr>
        </table>
        
    </div>

    <table  width="100%">
        <tr >
            <td rowspan="2" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Nombre Completo</td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse;">'.$exp['PrimerApe'].' </td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse;">'.$exp['SegundoApe'].' </td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse;">'.$exp['Nombres'].'  </td>
            
        </tr>
        <tr>
            <th  colspan="1" scope="colgroup"   style="text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Apellido Paterno</th>
            <th  colspan="1" scope="colgroup"   style="text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Apellido Materno</th>
            <th  colspan="1" scope="colgroup"   style="text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Nombre (s)</th>
        </tr>
        
    </table>

    <table width="100%">
        <tr >
            <td rowspan="1" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">RFC</td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse;">'.$exp['rfc'].' </td>
            <td rowspan="2" style="text-align: center; border: 1px solid black; border-collapse: collapse;background-color: #e2dfeb;font-size: 10px;">Teléfono</td>
            <td rowspan="2"  style="text-align: center; border: 1px solid black; border-collapse: collapse;"> '.$exp['Telefono'].' </td>
            <td rowspan="2" style="text-align: center; border: 1px solid black; border-collapse: collapse;background-color: #e2dfeb;font-size: 10px;">Correo electrónico</td>
            <td rowspan="2"  style="text-align: center; border: 1px solid black; border-collapse: collapse;">'.$exp['correo'].' </td>
        </tr>
        <tr>
            <td rowspan="1" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">No. de emepleado o empleada</td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse;">   </td>
        </tr>
    </table>

    <div  style="text-align: center;">
        <table width="100%">
            <tr style="background-color: #9a81b5;">
                <td style="text-align: center; color:#fff;"> <h5>DATOS DE LA INSTITUCIÓN DONDE LABORA LA USUARIA O USUARIO</h5> </td>
            </tr>
        </table>
        
    </div>

    <table  width="100%">
        <tr >
            <td rowspan="1" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Institución</td>
            <td scope="col"  width="35%;" style="text-align: center; border: 1px solid black; border-collapse: collapse;">  SECRETARÍA DE LAS MUJERES </td>
            <td rowspan="1" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Estado</td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse;">  YUCATÁN </td>
        </tr>
        <tr >
            <td rowspan="1" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Área/Unidad</td>
            <td scope="col"  width="35%;" style="text-align: center; border: 1px solid black; border-collapse: collapse;">  Dirección de Atención a la Violencia en Municipios  </td>
            <td rowspan="1" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Municipio</td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse;">'.$exp['Municipio'].'  </td>
        </tr>
        <tr >
            <td rowspan="1" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Cargo/Grado</td>
            <td scope="col"  width="35%;" style="text-align: center; border: 1px solid black; border-collapse: collapse;">'.$exp['Cargo'].'  </td>
            <td rowspan="1" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">Funciones</td>
            <td scope="col" style="text-align: center; border: 1px solid black; border-collapse: collapse;">   </td>
        </tr>
        
    </table>

    <div  style="text-align: center;">
        <table width="100%">
            <tr style="background-color: #9a81b5;">
                <td style="text-align: center; color:#fff;"> <h5>PERFIL DE USUARIO</h5> </td>
            </tr>
        </table>
        
    </div>

    <table  width="100%">
        <tr >
            <td rowspan="1" width="10%;" style="text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;"><b> '.$Cap.' </b> Capturista</td>
            <td rowspan="1" width="10%;" style="text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;"><b>'.$EnlaceI.'</b> Enlace Institucional</td>
            <td rowspan="1" width="10%;" style="text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;"><b>'.$EnlaceE.'</b> Enlace Estatal</td>
        </tr>
    
        
    </table>

    <section>
        <span style="font-size:7px;">
            <b>Políticas</b><br>
            Para el manejo de la información <br>
            La información deberá ser manejada bajo los principios de confidencialidad y reserva, por lo que los usuarios  o usuarias deberán sujetarse a los lineamientos de operación, seguridad y control de acceso del sistema.<br>
            La información que se manipule será autorizada única y exclusivamente para el cumplimiento de las funciones de atención, prevención, sanción y erradicación de la violencia contra las mujeres.<br>
            Cada usuario o usuaria se hará responsable de la información que ingrese al sistema cuidando que ésta sea exacta, adecuada, pertinente y no excesiva.<br>
            Para el uso de la cuenta <br>
            Las cuentas de acceso son personales e intransferibles, por lo que es responsabilidad exclusiva del usuario o usuaria su correcto uso, así como mantener la confidencialidad de su contraseña.<br>
            El usuario o usuaria deberá cambiar su contraseña periódicamente.<br>
            En caso de que el usuario o usuaria deje de prestar sus servicios a su institución o cambie de área de adscripción, será responsabilidad del enlace de dicha institución solicitar mediante oficio la cancelación de la cuenta de acceso.<br>
            El sistema bloqueará la cuenta de acceso después de 3 intentos incorrectos, para reactivarla deberá contactar al personal que administra el sistema.<br>
            A partir de la recepción vía correo electrónico del formato de “Solicitud de cuentas de acceso”, se dispondrá de un periodo de 15 días naturales para remitir el oficio de solicitud  y el formato originales, de otra forma la cuenta será suspendida.
        </span>

    </section>

    <section >
        <span style="font-size:7px;">
            <b>Importante</b><br>
            El presente documento tiene la función de una carta responsiva en la que la o el usuario se compromete a cumplir con los lineamientos y políticas de seguridad aplicables, a fin de garantizar a la ciudadanía la custodia de sus datos personales. 
            El incumplimiento de estas políticas generará la suspensión de la cuenta. 
            La Secretaría de Gobernación se reserva el derecho de asignación de privilegios de acuerdo a la naturaleza de las funciones del usuario o usuaria solicitante, así como a las atribuciones de la institución a la que pertenezca.  
        </span>

    </section>

    <table width="100%" >
        <tr >
            <td  scope="col" style="background-color: #e2dfeb;text-align: center; border: 1px solid black; border-collapse: collapse; font-size: 10px;"> Nombre y Firma de usuaria o usuario </td>
        
            <td  rowspan="4"  colspan="4" scope="colgroup" style="text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 13px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            Sello de la Institución  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <div style="color: #fff;" >ss</div>
            <div style="color: #fff;" >ss</div>
            <div style="color: #fff;" >ss</div>
            <div style="color: #fff;" >ss</div>
            <div style="color: #fff;" >ss</div>
            </td>
        </tr>
    
        <tr>
            <td rowspan="1" scope="colgroup" style="text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">
            
                <div style="color: #fff;" >ss</div>
                <div >'.$exp['PrimerApe'].' '.$exp['SegundoApe'].' '.$exp['Nombres'].' </div>
            </td>
        </tr>
        <tr>
            <td scope="col" style="background-color: #e2dfeb;text-align: center; border: 1px solid black; border-collapse: collapse; font-size: 10px;"> Nombre y Firma de Enlance Institucional</td>
        </tr>

        <tr>
            <td rowspan="1" scope="colgroup" style="text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">
            <div style="color: #fff;" >ss</div>
                <div style="color: #fff;">Nombre </div>
            </td>
        </tr>
    </table>

    <table width="100%" >
        <tr >
            <td rowspan="2" width="10%;" style="background-color: #e2dfeb;text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 15px;">VO. BO</td>
            <td scope="col" style="background-color: #e2dfeb;text-align: center; border: 1px solid black; border-collapse: collapse;font-size: 10px;">Jefa o Jefe inmediato </td>

        </tr>
        <tr>
            <th   cope="col"  style="text-align: center;border: 1px solid black; border-collapse: collapse;font-size: 10px;">
                
                <div style="color: #fff;" >ss</div>
                <div style="color: #fff;">Nombre </div>
            </th>
        </tr>

        
        
    </table>

    ');
}

$mpdf->Output();

?>