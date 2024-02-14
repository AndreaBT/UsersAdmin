<?php
require 'vendor/autoload.php';
$mysqli = include_once "conectBDdownload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Shared\File;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

    $spreadsheet = new Spreadsheet();
    // TODOS 2024
    $sheet = $spreadsheet->setActiveSheetIndex(0);
    // $activeWorksheet = $spreadsheet->getActiveSheet();

    // Buscando en Base de datos
        $buscandoRes = $mysqli->query("SELECT  * FROM usuarios");

    // Haciendo Fech
        $respuestas = $buscandoRes->fetch_all(MYSQLI_ASSOC);
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'RFC');
        $sheet->setCellValue('B1', 'Teléfono');
        $sheet->setCellValue('C1', 'Correo');
        $sheet->setCellValue('D1', 'Área/Unidad');
        $sheet->setCellValue('E1', 'Cargo');
        $sheet->setCellValue('F1', 'Municipio');
        $sheet->setCellValue('G1', 'Usuario');
        $sheet->setCellValue('H1', 'Estatal/PAIMEF');
        $sheet->setCellValue('I1', 'Perfil');
        $sheet->setCellValue('J1', 'Estatus');
        $sheet->setCellValue('K1', 'Fecha de Alta');
        $sheet->setCellValue('L1', 'Fecha de Actualización');
        $sheet->setCellValue('M1', 'Fecha de Baja');

        $Res=0;
        $nivel="";
    // imprimiendo resultados
        $rows=2;
        foreach ($respuestas as $res) {
            $sheet->setCellValue('A' . $rows, $res['PrimerApe'].' '.$res['SegundoApe'].' '.$res['Nombres']);
            $sheet->setCellValue('B' . $rows, $res['rfc']);
            $sheet->setCellValue('B' . $rows, $res['Telefono']);
            $sheet->setCellValue('C' . $rows, $res['correo']);
            $sheet->setCellValue('D' . $rows, $res['area']);
            $sheet->setCellValue('E' . $rows, $res['Cargo']);
            $sheet->setCellValue('F' . $rows, $res['Municipio']);
            $sheet->setCellValue('G' . $rows, $res['Usuario']);
            $sheet->setCellValue('H' . $rows, $res['Pmfest']);
            $sheet->setCellValue('I' . $rows, $res['Perfil']);
            $sheet->setCellValue('J' . $rows, $res['estatus']);
            $sheet->setCellValue('K' . $rows, $res['fecha']);
            $sheet->setCellValue('L' . $rows, $res['fecha_act']);
            $sheet->setCellValue('M' . $rows, $res['fecha_baja']);

            $rows++;
        }

        $styleArray = [
            'font' => [
                'bold' => true,
                'size'=>10,
                'color'=> [
                'argb'=> Color::COLOR_WHITE,]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER_CONTINUOUS,
                'wrapText'=> true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color'=>[
                    'argb'=> Color::COLOR_BLACK,]
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'A44130',
                ]
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:M1')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->setTitle('TODOS 2024');

        // HOJA PAIMEF 2024

        $sheet = $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->createSheet();
        $sheet = $spreadsheet->setActiveSheetIndex(1);

        $buscandoRes2 = $mysqli->query("SELECT  * FROM usuarios WHERE Pmfest = 'PAIMEF' ");

        $respuestas2 = $buscandoRes2->fetch_all(MYSQLI_ASSOC);
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'RFC');
        $sheet->setCellValue('B1', 'Teléfono');
        $sheet->setCellValue('C1', 'Correo');
        $sheet->setCellValue('D1', 'Área/Unidad');
        $sheet->setCellValue('E1', 'Cargo');
        $sheet->setCellValue('F1', 'Municipio');
        $sheet->setCellValue('G1', 'Usuario');
        $sheet->setCellValue('H1', 'Estatal/PAIMEF');
        $sheet->setCellValue('I1', 'Perfil');
        $sheet->setCellValue('J1', 'Estatus');
        $sheet->setCellValue('K1', 'Fecha de Alta');
        $sheet->setCellValue('L1', 'Fecha de Actualización');
        $sheet->setCellValue('M1', 'Fecha de Baja');

        $rows=2;
        foreach ($respuestas2 as $res) {
            $sheet->setCellValue('A' . $rows, $res['PrimerApe'].' '.$res['SegundoApe'].' '.$res['Nombres']);
            $sheet->setCellValue('B' . $rows, $res['rfc']);
            $sheet->setCellValue('B' . $rows, $res['Telefono']);
            $sheet->setCellValue('C' . $rows, $res['correo']);
            $sheet->setCellValue('D' . $rows, $res['area']);
            $sheet->setCellValue('E' . $rows, $res['Cargo']);
            $sheet->setCellValue('F' . $rows, $res['Municipio']);
            $sheet->setCellValue('G' . $rows, $res['Usuario']);
            $sheet->setCellValue('H' . $rows, $res['Pmfest']);
            $sheet->setCellValue('I' . $rows, $res['Perfil']);
            $sheet->setCellValue('J' . $rows, $res['estatus']);
            $sheet->setCellValue('K' . $rows, $res['fecha']);
            $sheet->setCellValue('L' . $rows, $res['fecha_act']);
            $sheet->setCellValue('M' . $rows, $res['fecha_baja']);

            $rows++;
        }

        $styleArray = [
            'font' => [
                'bold' => true,
                'size'=>10,
                'color'=> [
                'argb'=> Color::COLOR_WHITE,]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER_CONTINUOUS,
                'wrapText'=> true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color'=>[
                    'argb'=> Color::COLOR_BLACK,]
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'A44130',
                ]
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:M1')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->setTitle('PAIMEF 2024');

        // HOJA ESTATAL 2024

        $sheet = $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->createSheet();
        $sheet = $spreadsheet->setActiveSheetIndex(2);

        $buscandoRes3 = $mysqli->query("SELECT  * FROM usuarios WHERE Pmfest = 'ESTATAL' ");

        $respuestas3 = $buscandoRes3->fetch_all(MYSQLI_ASSOC);
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'RFC');
        $sheet->setCellValue('B1', 'Teléfono');
        $sheet->setCellValue('C1', 'Correo');
        $sheet->setCellValue('D1', 'Área/Unidad');
        $sheet->setCellValue('E1', 'Cargo');
        $sheet->setCellValue('F1', 'Municipio');
        $sheet->setCellValue('G1', 'Usuario');
        $sheet->setCellValue('H1', 'Estatal/PAIMEF');
        $sheet->setCellValue('I1', 'Perfil');
        $sheet->setCellValue('J1', 'Estatus');
        $sheet->setCellValue('K1', 'Fecha de Alta');
        $sheet->setCellValue('L1', 'Fecha de Actualización');
        $sheet->setCellValue('M1', 'Fecha de Baja');

        $rows=2;
        foreach ($respuestas3 as $res) {
            $sheet->setCellValue('A' . $rows, $res['PrimerApe'].' '.$res['SegundoApe'].' '.$res['Nombres']);
            $sheet->setCellValue('B' . $rows, $res['rfc']);
            $sheet->setCellValue('B' . $rows, $res['Telefono']);
            $sheet->setCellValue('C' . $rows, $res['correo']);
            $sheet->setCellValue('D' . $rows, $res['area']);
            $sheet->setCellValue('E' . $rows, $res['Cargo']);
            $sheet->setCellValue('F' . $rows, $res['Municipio']);
            $sheet->setCellValue('G' . $rows, $res['Usuario']);
            $sheet->setCellValue('H' . $rows, $res['Pmfest']);
            $sheet->setCellValue('I' . $rows, $res['Perfil']);
            $sheet->setCellValue('J' . $rows, $res['estatus']);
            $sheet->setCellValue('K' . $rows, $res['fecha']);
            $sheet->setCellValue('L' . $rows, $res['fecha_act']);
            $sheet->setCellValue('M' . $rows, $res['fecha_baja']);

            $rows++;
        }

        $styleArray = [
            'font' => [
                'bold' => true,
                'size'=>10,
                'color'=> [
                'argb'=> Color::COLOR_WHITE,]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER_CONTINUOUS,
                'wrapText'=> true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color'=>[
                    'argb'=> Color::COLOR_BLACK,]
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'A44130',
                ]
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:M1')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->setTitle('ESTATAL 2024');

        // PAIMEF A ESTATAL 
        $sheet = $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->createSheet();
        $sheet = $spreadsheet->setActiveSheetIndex(3);

        $sheet->setCellValue('A1', 'Usuario PAIMEF');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'FechaBaja');
        $sheet->setCellValue('D1', 'Municipio PAIMEF');
        $sheet->setCellValue('E1', 'Cargo');
        $sheet->setCellValue('F1', 'Perfil PAIMEF');
        $sheet->setCellValue('G1', 'Usuario ESTATAL');
        $sheet->setCellValue('H1', 'Fecha Alta');
        $sheet->setCellValue('I1', 'Municipio ESTATAL');
        $sheet->setCellValue('J1', 'Perfil');
        $sheet->setCellValue('K1', 'Estatus');
        $sheet->setCellValue('L1', 'Fecha Baja');

        $NamePaimef = "";
        $DateDPaimef = "";
        $NameEstatal = ""; 
        $DateDEstatal = "";
        $searchP = $mysqli->query("SELECT  * FROM usuarios WHERE Pmfest = 'PAIMEF' and estatus = 'B' ");
        $answerP = $searchP->fetch_all(MYSQLI_ASSOC);
        $searchE = $mysqli->query("SELECT  * FROM usuarios WHERE Pmfest = 'ESTATAL' ");
        $answerE = $searchE->fetch_all(MYSQLI_ASSOC);

        $rows=2;
        foreach ($answerP as $P) {
            $NamePaimef = $P['PrimerApe'].' '.$P['SegundoApe'].' '.$P['Nombres'];
            $DateDPaimef = $P['fecha_baja'];

            foreach ($answerE as $E) {
                $NameEstatal =  $E['PrimerApe'].' '.$E['SegundoApe'].' '.$E['Nombres'];
                $DateDEstatal = $E['fecha'];

                if ($NamePaimef == $NameEstatal && $DateDPaimef <= $DateDEstatal) {
                    $sheet->setCellValue('A' . $rows, $P['Usuario']);
                    $sheet->setCellValue('B' . $rows, $NamePaimef);
                    $sheet->setCellValue('C' . $rows, $DateDPaimef);
                    $sheet->setCellValue('D' . $rows, $P['Municipio']);
                    $sheet->setCellValue('E' . $rows, $P['Cargo']);
                    $sheet->setCellValue('F' . $rows, $P['Perfil']);
                    $sheet->setCellValue('G' . $rows, $E['Usuario']);
                    $sheet->setCellValue('H' . $rows, $DateDEstatal);
                    $sheet->setCellValue('I' . $rows, $E['Municipio']);
                    $sheet->setCellValue('J' . $rows, $E['Perfil']);
                    $sheet->setCellValue('K' . $rows, $E['estatus']);
                    $sheet->setCellValue('L' . $rows, $E['fecha_baja']);

                    $rows++;
                }

            }
             
        }

        $styleArray = [
            'font' => [
                'bold' => true,
                'size'=>10,
                'color'=> [
                'argb'=> Color::COLOR_WHITE,]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER_CONTINUOUS,
                'wrapText'=> true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color'=>[
                    'argb'=> Color::COLOR_BLACK,]
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'A44130',
                ]
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:L1')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->setTitle('PAIMEF a ESTATAL 2024');

        //ESTATAL A PAIMEF 2024
        $sheet = $spreadsheet->setActiveSheetIndex(0);
        $sheet = $spreadsheet->createSheet();
        $sheet = $spreadsheet->setActiveSheetIndex(4);

        $sheet->setCellValue('A1', 'Usuario ESTATAL');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'FechaBaja');
        $sheet->setCellValue('D1', 'Municipio ESTATAL');
        $sheet->setCellValue('E1', 'Cargo');
        $sheet->setCellValue('F1', 'Perfil ESTATL');
        $sheet->setCellValue('G1', 'Usuario PAIMEF');
        $sheet->setCellValue('H1', 'Fecha Alta');
        $sheet->setCellValue('I1', 'Municipio PAIMEF');
        $sheet->setCellValue('J1', 'Perfil');
        $sheet->setCellValue('K1', 'Estatus');
        $sheet->setCellValue('L1', 'Fecha Baja');

        $NamePaimef2 = "";
        $DateDPaimef2 = "";
        $NameEstatal2 = ""; 
        $DateDEstatal2 = "";
        $searchP2 = $mysqli->query("SELECT  * FROM usuarios WHERE Pmfest = 'ESTATAL' and estatus = 'B' ");
        $answerP2 = $searchP2->fetch_all(MYSQLI_ASSOC);
        $searchE2 = $mysqli->query("SELECT  * FROM usuarios WHERE Pmfest = 'PAIMEF' ");
        $answerE2 = $searchE2->fetch_all(MYSQLI_ASSOC);

        $rows=2;
        foreach ($answerP2 as $P) {
            $NamePaimef2 = $P['PrimerApe'].' '.$P['SegundoApe'].' '.$P['Nombres'];
            $DateDPaimef2 = $P['fecha_baja'];

            foreach ($answerE2 as $E) {
                $NameEstatal2 =  $E['PrimerApe'].' '.$E['SegundoApe'].' '.$E['Nombres'];
                $DateDEstatal2 = $E['fecha'];

                if ($NamePaimef2 == $NameEstatal2 && $DateDPaimef2 <= $DateDEstatal2) {
                    $sheet->setCellValue('A' . $rows, $P['Usuario']);
                    $sheet->setCellValue('B' . $rows, $NamePaimef2);
                    $sheet->setCellValue('C' . $rows, $DateDPaimef2);
                    $sheet->setCellValue('D' . $rows, $P['Municipio']);
                    $sheet->setCellValue('E' . $rows, $P['Cargo']);
                    $sheet->setCellValue('F' . $rows, $P['Perfil']);
                    $sheet->setCellValue('G' . $rows, $E['Usuario']);
                    $sheet->setCellValue('H' . $rows, $DateDEstatal2);
                    $sheet->setCellValue('I' . $rows, $E['Municipio']);
                    $sheet->setCellValue('J' . $rows, $E['Perfil']);
                    $sheet->setCellValue('K' . $rows, $E['estatus']);
                    $sheet->setCellValue('L' . $rows, $E['fecha_baja']);

                    $rows++;
                }

            }
             
        }

        $styleArray = [
            'font' => [
                'bold' => true,
                'size'=>10,
                'color'=> [
                'argb'=> Color::COLOR_WHITE,]
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER_CONTINUOUS,
                'wrapText'=> true,
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color'=>[
                    'argb'=> Color::COLOR_BLACK,]
                ],
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'A44130',
                ]
            ],
        ];

        $spreadsheet->getActiveSheet()->getStyle('A1:L1')->applyFromArray($styleArray);
        $spreadsheet->getActiveSheet()->setTitle('ESTATAL a PAIMEF 2024');

      

   

    /* Here there will be some code where you create $spreadsheet */

    // redirect output to client browser
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="Base de datos .xlsx"');
    header('Cache-Control: max-age=0');

    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');

?>