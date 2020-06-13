<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/include/db.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;


//?##########################################################
//?     Colores
//?##########################################################
$ColorPrimario = '0F2196f3';
$ColorSecundario = '0F90caf9';
$LightText = '00F5F5F5';
$DarkText = '00616161';
$SubHeader = '00757575';

//?##########################################################
//?     Estilos 
//?##########################################################
$styleBorder = [
    'borders' => [
        'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM,
            'color' => ['argb' => '0fECEFF1'],
        ],
    ],
    'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
    ],
];



//?##########################################################
//?     Si existen reportes 
//?##########################################################
if (isset($_GET['Reportes'])) {
    $_Reportes = $_GET['Reportes'];
    foreach ($_Reportes as $x) {
        $Folios[] = $x['Folio'];
    }

    //* Region
    $Region = $_GET['Region'];

    //* Cargamos los datos de los reportes
    $Reportes = array();
    foreach ($_Reportes as $x) {
        //*Consulta de cada reporte
        //*Preparando consulta
        $sql = "SELECT * FROM $Region WHERE Folio=:folio";
        try {
            $db = new db();
            $db = $db->connect();
            $resultado = $db->prepare($sql);
            $resultado->bindParam('folio', $x['Folio']);
            $resultado->execute();

            if ($resultado->rowCount() > 0) {
                //Si hay resultados
                $Reportes[$x['Folio']] = $resultado->fetch(PDO::FETCH_ASSOC);
            } else {
                echo "No extiste informacion de los folios";
            }
        } catch (PDOException $e) {
            echo "Error al acceder a la base de datos " . $e;
        }
    }


    //* Cargamos la informacion de los Tickets 
    $Tickets = array();
    $tabla = 'folio_' . $Region;
    foreach ($_Reportes as $x) {
        //echo $x['Folio'];
        //*Consulta de cada reporte
        //*Preparando consulta
        $sql = "SELECT * FROM $tabla WHERE Folio=:folio";
        try {
            $db = new db();
            $db = $db->connect();
            $resultado = $db->prepare($sql);
            $resultado->bindParam('folio', $x['Folio']);
            $resultado->execute();

            if ($resultado->rowCount() > 0) {
                //Si hay resultados
                $Tickets[$x['Folio']] = $resultado->fetch(PDO::FETCH_ASSOC);
            } else {
                echo "No extiste informacion de los Tickets";
            }
        } catch (PDOException $e) {
            echo "Error al acceder a la base de datos " . $e;
        }
    }

    $documento = new Spreadsheet();
    $documento
        ->getProperties()
        ->setCreator("Aquí va el creador, como cadena")
        ->setLastModifiedBy('Parzibyte') // última vez modificado por
        ->setTitle('Mi primer documento creado con PhpSpreadSheet')
        ->setSubject('El asunto')
        ->setDescription('Este documento fue generado para parzibyte.me')
        ->setKeywords('etiquetas o palabras clave separadas por espacios')
        ->setCategory('La categoría');

    $nombreDelDocumento = "Mi primer archivo.xlsx";
    $documento->getDefaultStyle()->getFont()->setSize(10);

    //* Generamos el reporte
    foreach ($_Reportes as $x) {
        $hoja = $documento->createSheet();
        $hoja->setTitle($Reportes[$x['Folio']]['Folio']);
        $documento->setActiveSheetIndexByName($Reportes[$x['Folio']]['Folio']);

        //*########################################################
        //*     Seccion: Header
        //*########################################################
        //Combinar celdas
        $documento->getActiveSheet()->mergeCells('A1:J2');
        // COlor de letra
        $documento->getActiveSheet()->getStyle('A1')
            ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        // Tamaño de letra
        $documento->getActiveSheet()->getStyle('A1')
            ->getFont()->setSize(14);
        // Color de fondo
        $documento->getActiveSheet()->getStyle('A1')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A1')
            ->getFill()->getStartColor()->setARGB('00000000');
        // Texto de la celda
        $hoja->setCellValue("A1", "Reporte :" . $Reportes[$x['Folio']]['Folio']);
        // Centrado horizontal
        $documento->getActiveSheet()->getStyle('A1')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $hoja->getStyle('A1:J2')->applyFromArray($styleBorder);


        //*########################################################
        //*     Seccion: SubHeader
        //*########################################################
        $documento->getActiveSheet()->mergeCells('A3:J3');
        $hoja->setCellValue("A3", "Talleres y Gruas Mendez S.A. de C.V.");
        // Centrado horizontal
        $documento->getActiveSheet()->getStyle('A3')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $hoja->getStyle('A3:J3')->applyFromArray($styleBorder);
        $documento->getActiveSheet()->getStyle('A3')
            ->getFont()->setSize(12);
        $documento->getActiveSheet()->getStyle('A3')
            ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
        $documento->getActiveSheet()->getStyle('A3')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A3')
            ->getFill()->getStartColor()->setARGB($SubHeader);


        //*########################################################
        //*     Seccion: Folio
        //*########################################################
        //* Folio
        $hoja->setCellValue("A5", "FOLIO");
        $documento->getActiveSheet()->mergeCells('A5:B5');
        $documento->getActiveSheet()->getStyle('A5')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('A5')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A5')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('A5:B5')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('C5:D5');
        $documento->getActiveSheet()->getStyle('C5')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('C5')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('C5')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('C5:D5')->applyFromArray($styleBorder);
        $hoja->setCellValue("C5", $Tickets[$x['Folio']]['PrefijoConsecutivo'] . $Tickets[$x['Folio']]['Consecutivo']);

        //*Referencia
        $hoja->setCellValue("A6", "REPORTE");
        $documento->getActiveSheet()->mergeCells('A6:B6');
        $documento->getActiveSheet()->getStyle('A6')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('A6')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A6')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('A6:B6')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('C6:D6');
        $documento->getActiveSheet()->getStyle('C6')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('C6')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('C6')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('C6:D6')->applyFromArray($styleBorder);
        $hoja->setCellValue("C6", $Reportes[$x['Folio']]['Folio']);

        //* Fecha Arrastre
        $hoja->setCellValue("A7", "Fecha de Arrastre");
        $documento->getActiveSheet()->mergeCells('A7:B7');
        $documento->getActiveSheet()->getStyle('A7')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('A7')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A7')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('A5:B5')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('C7:D7');
        $documento->getActiveSheet()->getStyle('C7')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('C7')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('C7')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('C7:D7')->applyFromArray($styleBorder);
        $hoja->setCellValue("C7", $Reportes[$x['Folio']]['Fecha']);

        //* Direccion
        $hoja->setCellValue("A8", "Direccion");
        $documento->getActiveSheet()->mergeCells('A8:B8');
        $documento->getActiveSheet()->getStyle('A8')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('A8')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A8')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('A8:B8')->applyFromArray($styleBorder);
        //!  Campo
        $documento->getActiveSheet()->mergeCells('C8:F8');
        $documento->getActiveSheet()->getStyle('C8')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('C8')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('C8')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('C8:F8')->applyFromArray($styleBorder);
        $hoja->setCellValue("C8", $Reportes[$x['Folio']]['Direccion']);


        //*########################################################
        //*     Seccion: Cobro
        //*########################################################

        //*Fecha de liberacion
        $hoja->setCellValue("F5", "Fecha de Liberacion");
        $documento->getActiveSheet()->mergeCells('F5:G5');
        $documento->getActiveSheet()->getStyle('F5')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('F5')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('F5')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('F5:G5')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('H5:I5');
        $documento->getActiveSheet()->getStyle('H5')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('H5')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('H5')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('H5:I5')->applyFromArray($styleBorder);
        $hoja->setCellValue("H5", $Tickets[$x['Folio']]['FechaTicket']);

        //* Importe Pagado
        $hoja->setCellValue("F6", "Importe Pagado");
        $documento->getActiveSheet()->mergeCells('F6:G6');
        $documento->getActiveSheet()->getStyle('F6')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('F6')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('F6')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('F6:G6')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('H6:I6');
        $documento->getActiveSheet()->getStyle('H6')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('H6')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('H6')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('H6:I6')->applyFromArray($styleBorder);
        $hoja->setCellValue("H6", "$" . $Tickets[$x['Folio']]['Importe']);

        //* Importe con letra
        $hoja->setCellValue("F7", "Importe Con Letra");
        $documento->getActiveSheet()->mergeCells('F7:G7');
        $documento->getActiveSheet()->getStyle('F7')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('F7')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('F7')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('F7:G7')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('H7:I7');
        $documento->getActiveSheet()->getStyle('H7')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('H7')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('H7')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('H7:I7')->applyFromArray($styleBorder);
        $hoja->setCellValue("H7", $Tickets[$x['Folio']]['ImporteLetra']);

        //*########################################################
        //*     Seccion: Tabla de Resumen
        //*########################################################
        //*Tabal de resumen
        $documento->getActiveSheet()->mergeCells('A10:J10');
        $hoja->setCellValue("A10", "Resumen");
        $documento->getActiveSheet()->getStyle('A10')
            ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $hoja->getStyle('A10:J10')->applyFromArray($styleBorder);


        //*########################################################
        //*     Seccion: Columna 1
        //*########################################################
        //* Motivo de inventario
        $hoja->setCellValue("A11", "Motivo de inventario");
        $documento->getActiveSheet()->mergeCells('A11:B12');
        $documento->getActiveSheet()->getStyle('A11')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('A11')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A11')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('A11:B12')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('C11:D12');
        $documento->getActiveSheet()->getStyle('C11')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('C11')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('C11')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('C11:D12')->applyFromArray($styleBorder);
        $hoja->setCellValue("C11", $Reportes[$x['Folio']]['MotivoInventario']);

        //* Modelo
        $hoja->setCellValue("A13", "Modelo");
        $documento->getActiveSheet()->mergeCells('A13:B14');
        $documento->getActiveSheet()->getStyle('A13')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('A13')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A13')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('A13:B14')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('C13:D14');
        $documento->getActiveSheet()->getStyle('C13')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('C13')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('C13')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('C13:D14')->applyFromArray($styleBorder);
        $hoja->setCellValue("C13", $Reportes[$x['Folio']]['Modelo']);

        //* Numero de serie
        $hoja->setCellValue("A15", "Número de serie");
        $documento->getActiveSheet()->mergeCells('A15:B16');
        $documento->getActiveSheet()->getStyle('A15')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('A15')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A15')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('A15:B16')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('C15:D16');
        $documento->getActiveSheet()->getStyle('C15')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('C15')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('C15')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('C15:D16')->applyFromArray($styleBorder);
        $hoja->setCellValue("C15", $Reportes[$x['Folio']]['NoSerie']);

        //* Telefono
        $hoja->setCellValue("A17", "Telefono");
        $documento->getActiveSheet()->mergeCells('A17:B18');
        $documento->getActiveSheet()->getStyle('A17')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('A17')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A17')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('A17:B18')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('C17:D18');
        $documento->getActiveSheet()->getStyle('C17')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('C17')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('C17')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('C17:D18')->applyFromArray($styleBorder);
        $hoja->setCellValue("C17", $Reportes[$x['Folio']]['Telefono']);

        //* Autoridad o empresa solicitante
        $hoja->setCellValue("A19", "Autoridad o empresa solicitante");
        $documento->getActiveSheet()->mergeCells('A19:B20');
        $documento->getActiveSheet()->getStyle('A19')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('A19')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('A19')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('A19:B20')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('C19:D20');
        $documento->getActiveSheet()->getStyle('C19')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('C19')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('C19')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('C19:D20')->applyFromArray($styleBorder);
        $hoja->setCellValue("C19", $Reportes[$x['Folio']]['Solicitante']);


        //*########################################################
        //*     Seccion: Columna 2
        //*########################################################
        //* Vehículo marca
        $hoja->setCellValue("E11", "Vehículo marca");
        $documento->getActiveSheet()->mergeCells('E11:F12');
        $documento->getActiveSheet()->getStyle('E11')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('E11')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('E11')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('E11:F12')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('G11:H12');
        $documento->getActiveSheet()->getStyle('G11')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('G11')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('G11')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('G11:H12')->applyFromArray($styleBorder);
        $hoja->setCellValue("G11", $Reportes[$x['Folio']]['VahiculoMarca']);

        //* Color
        $hoja->setCellValue("E13", "Color");
        $documento->getActiveSheet()->mergeCells('E13:F14');
        $documento->getActiveSheet()->getStyle('E13')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('E13')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('E13')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('E13:F14')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('G13:H14');
        $documento->getActiveSheet()->getStyle('G13')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('G13')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('G13')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('G13:H14')->applyFromArray($styleBorder);
        $hoja->setCellValue("G13", $Reportes[$x['Folio']]['Color']);

        //* Conductor o propietario
        $hoja->setCellValue("E15", "Conductor o propietario");
        $documento->getActiveSheet()->mergeCells('E15:F16');
        $documento->getActiveSheet()->getStyle('E15')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('E15')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('E15')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('E15:F16')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('G15:H16');
        $documento->getActiveSheet()->getStyle('G15')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('G15')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('G15')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('G15:H16')->applyFromArray($styleBorder);
        $hoja->setCellValue("G15", $Reportes[$x['Folio']]['NombreConductor']);

        //* Grua
        $hoja->setCellValue("E17", "Grúa");
        $documento->getActiveSheet()->mergeCells('E17:F18');
        $documento->getActiveSheet()->getStyle('E17')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('E17')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('E17')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('E17:F18')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('G17:H18');
        $documento->getActiveSheet()->getStyle('G17')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('G17')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('G17')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('G17:H18')->applyFromArray($styleBorder);
        $hoja->setCellValue("G17", $Reportes[$x['Folio']]['Grua']);


        //*########################################################
        //*     Seccion: Columna 3
        //*########################################################
        //* Tipo
        $hoja->setCellValue("I11", "Tipo");
        $documento->getActiveSheet()->mergeCells('I11:I12');
        $documento->getActiveSheet()->getStyle('I11')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('I11')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('I11')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('I11:I12')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('J11:J12');
        $documento->getActiveSheet()->getStyle('J11')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('J11')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('J11')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('J11:J12')->applyFromArray($styleBorder);
        $hoja->setCellValue("J11", $Reportes[$x['Folio']]['Tipo']);

        //* Placas
        $hoja->setCellValue("I13", "Placas");
        $documento->getActiveSheet()->mergeCells('I13:I14');
        $documento->getActiveSheet()->getStyle('I13')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('I13')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('I13')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('I13:I14')->applyFromArray($styleBorder);
        //!Campo
        $documento->getActiveSheet()->mergeCells('J13:J14');
        $documento->getActiveSheet()->getStyle('J13')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('J13')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('J13')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('J13:J14')->applyFromArray($styleBorder);
        $hoja->setCellValue("J13", $Reportes[$x['Folio']]['Placas']);

        //* Llaves
        $hoja->setCellValue("I15", "Llaves");
        $documento->getActiveSheet()->mergeCells('I15:I16');
        $documento->getActiveSheet()->getStyle('I15')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('I15')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('I15')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('I15:I16')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('J15:J16');
        $documento->getActiveSheet()->getStyle('J15')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('J15')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('J15')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('J15:J16')->applyFromArray($styleBorder);
        $hoja->setCellValue("J15", $Reportes[$x['Folio']]['Llaves']);

        //* Clave Operador
        $hoja->setCellValue("I17", "Clave operador");
        $documento->getActiveSheet()->mergeCells('I17:I18');
        $documento->getActiveSheet()->getStyle('I17')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('I17')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('I17')
            ->getFill()->getStartColor()->setARGB($ColorPrimario);
        $hoja->getStyle('I17:I18')->applyFromArray($styleBorder);
        //! Campo
        $documento->getActiveSheet()->mergeCells('J17:J18');
        $documento->getActiveSheet()->getStyle('J17')
            ->getAlignment()->setWrapText(true);
        $documento->getActiveSheet()->getStyle('J17')
            ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
        $documento->getActiveSheet()->getStyle('J17')
            ->getFill()->getStartColor()->setARGB($ColorSecundario);
        $hoja->getStyle('J17:J18')->applyFromArray($styleBorder);
        $hoja->setCellValue("J17", $Reportes[$x['Folio']]['ClaveOperador']);
    }
}

//* Aplicacion del estilo primario
function estiloPrimario($celda)
{
}


$documento->removeSheetByIndex(0);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($documento, 'Xlsx');
$writer->save('php://output');
exit;
