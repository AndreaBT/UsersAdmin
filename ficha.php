<?php

require 'vendor/autoload.php';
$mysqli = include_once "conectBDdownload.php";



$mpdf = new \Mpdf\Mpdf();

$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);

$mpdf->SetHTMLHeader('
<table width="100%">
    <tr>
        <td width="33%"> <img src="img/gobernacion.png" width="35%" alt=""></td>
        <td width="33%" align="center"></td>
        <td width="33%" style="text-align: right;"> <img src="img/banavim.png" width="25%" alt=""></td>
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
<div  style="text-align: center;">
    <h4 class="Resultado"> <b> BANCO NACIONAL DE DATOS E INFORMACIÓN SOBRE CASOS DE VIOLENCIA CONTRA LAS MUJERES </b></h4>
</div>
');

$mpdf->WriteHTML('
<div  style="text-align: center;">
    <table width="100%">
        <tr style="background-color: #9a81b5;">
            <td style="text-align: center; color:#fff; border: 1px solid black; border-collapse: collapse;"> <h4>FORMATO DE ASIGNACIÓN DE CUENTAS DE ACCESO</h4> </td>
        </tr>
    </table>
    
    <table width="100%">
        <tr >
            <td width="15%" style="background-color: #e2dfeb;text-align: center; height:50px; border: 1px solid black; border-collapse: collapse;">Institución</td>
            <td width="33%" style="text-align: center; height:50px; border: 1px solid black; border-collapse: collapse;">  <label>SEMUJERES</label> </td>
            <td width="15%" style="text-align: center;background-color: #e2dfeb; border: 1px solid black; border-collapse: collapse;" height:50px;>Estado</td>
            <td style="text-align: center; height:50px; border: 1px solid black; border-collapse: collapse;"> <label>YUCATÁN</label> </td>
            <td  style="text-align: center;background-color: #e2dfeb; height:50px; border: 1px solid black; border-collapse: collapse;">FECHA</td>
        </tr>
    </table>
</div>
');

// Buscando en Base de datos
$Id = $_GET['Id'];
$buscandoRes = $mysqli->query("SELECT  * FROM usuarios WHERE Id = $Id");

// Haciendo Fech
$respuestas = $buscandoRes->fetch_all(MYSQLI_ASSOC);

$ficha1 ='';
                    
$ficha1 .= '
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
    <div  style="text-align: center;">

        <table width="100%">
            <tr >
                <td width="15%" style="background-color: #e2dfeb;text-align: center; border: 1px solid black; border-collapse: collapse;">Área/Unidad </td>
                
';
foreach ($respuestas as $exp) {
    $ficha1 .= '
            <td width="33%" style="text-align: center; border: 1px solid black; border-collapse: collapse;"> <label>'.$exp['area'].'</label>  </td>
            <td width="15%" style=" text-align:center; height:50px;background-color: #e2dfeb; border: 1px solid black; border-collapse: collapse;">Municipio</td>
            <td width="20%" style=" text-align:center; height:50px; border: 1px solid black; border-collapse: collapse;"> <label>'.$exp['Municipio'].'</label></td>
            <td style=" text-align:center; border: 1px solid black; border-collapse: collapse;">
                <div>DÍA/MES/AÑO</div>
                <div>'.$exp['fecha'].'</div>
            </td>
        </tr>';
}

$ficha1 .= '</table>';
$mpdf->WriteHTML($ficha1);

$mpdf->WriteHTML('<br>');
$mpdf->WriteHTML('
<div  style="text-align: center;">
    <table width="100%">
        <tr style="background-color: #9a81b5;">
            <td style="text-align: center; color:#fff; border: 1px solid black; border-collapse: collapse;"> <h4>USUARIO </h4></td>
        </tr>
    </table>
    
   
</div>
');

$Usuarios = '';
$Usuarios .= '
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
    <div  style="text-align: center;">

        <table width="100%">
            <tr >
                <td width="15%" style="background-color: #e2dfeb;text-align: center; border: 1px solid black; border-collapse: collapse;">NOMBRE: </td>
                
';
foreach ($respuestas as $exp) {
    $Usuarios .= '
            <td width="25%" style="text-align: center; border: 1px solid black; border-collapse: collapse;"> <label>'.$exp['PrimerApe'].' '.$exp['SegundoApe'].' '.$exp['Nombres'].'</label>  </td>
            <td width="15%" style=" text-align:center; height:50px;background-color: #e2dfeb; border: 1px solid black; border-collapse: collapse;">RFC:</td>
            <td width="33%" style=" text-align:center; height:50px; border: 1px solid black; border-collapse: collapse;"> <label>'.$exp['rfc'].'</label></td>
            
        </tr>
        <tr >
            <td width="15%" style="background-color: #e2dfeb;text-align: center; border: 1px solid black; border-collapse: collapse;">USUARIO: </td>
            <td width="25%" style="text-align: center; border: 1px solid black; border-collapse: collapse;"> <label>'.$exp['Usuario'].'</label>  </td>
            <td width="15%" style=" text-align:center; height:50px;background-color: #e2dfeb; border: 1px solid black; border-collapse: collapse;">CONTRASEÑA:</td>
            <td width="33%" style=" text-align:center; height:50px; border: 1px solid black; border-collapse: collapse;"> <p style="font-size: 10px;">La primera vez que ingresa al sistema, la contraseña será la misma que el nombre de usuario.</p></td>
        </tr>
        <tr >
            <td width="15%" style="background-color: #e2dfeb;text-align: center; border: 1px solid black; border-collapse: collapse;">CARGO/PUESTO: </td>
            <td width="25%" style="text-align: center; border: 1px solid black; border-collapse: collapse;"> <label>'.$exp['Cargo'].'</label>  </td>
            <td width="15%" style=" text-align:center; height:50px;background-color: #e2dfeb; border: 1px solid black; border-collapse: collapse;">PERFIL:</td>
            <td width="33%" style=" text-align:center; height:50px; border: 1px solid black; border-collapse: collapse;"> <label>'.$exp['Perfil'].'</label></td>
        </tr>
        '
        
        ;
}

$Usuarios .= '</table>';
$mpdf->WriteHTML($Usuarios);

$mpdf->WriteHTML('
<br><br>
<div  style="text-align: center;"> 
    <table width="100%">
        <tr >
            <td width="50%" style="text-align: center; height:110px;"><img src="img/yucatan.jpg" width="40%" alt=""></td>
            <td width="50%" style="text-align: center; height:110px">   </td>
            
        </tr>
        <tr >
            <td width="50%" style="background-color: #ad9dc3;text-align: center; height:55px; border: 1px solid black; border-collapse: collapse;"><b>SELLO DE LA INSTITUCIÓN</b></td>
            <td width="50%" style="background-color: #ad9dc3;text-align: center; height:55px; border: 1px solid black; border-collapse: collapse;"><b>MTRA. ITZEL VALERIA GARCÍA PACHECO <br> DIRECTORA DE PLANEACIÓN CON ENFOQUE DE GÉNERO ENLACE ESTATAL DEL BANAVIM EN YUCATÁN
            </b> </td>
           
        </tr>
    </table>
</div>
');



$mpdf->SetHTMLFooter('
<table width="100%">
    <tr>
        <td style="text-align: right;"> <img src="img/baesvim.png" width="15%" alt=""></td>
    </tr>
</table>');



$mpdf->Output();

?>