<?php

use PhpParser\JsonDecoder;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/config/db.php';

if (isset($_GET['Reportes'])) {

    $_Reportes = $_GET['Reportes'];
    foreach ($_Reportes as $x) {
        $Folios[] = $x['Folio'];
    }

    $Region = $_Reportes['Region'];

    echo var_dump($Folios);

    //* Peticion SQL
    $sql = "SELECT * FROM $Region WHERE (Folio=:x AND )";

    /*
    SELECT *
FROM customers
WHERE (state = 'California' AND last_name = 'Johnson')
OR (customer_id > 4500);*/
    /*
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<h1>Hello world!</h1>');
    $mpdf->AddPage();
    $mpdf->WriteHTML('<h1>Page 2!</h1>');
    $mpdf->Output("reporte.pdf", "I");
    */
} else {
    echo "No existe Reportes";
    //$res = implode("", $_POST);
    //$reporte = json_decode($_POST, true);
    //echo var_dump($reporte);

    /*
    $mpdf = new \Mpdf\Mpdf();
    $mpdf->WriteHTML('<h1>Hello world!</h1>');
    $mpdf->Output("reporte.pdf", "I");
*/
    echo var_dump($_POST);
    echo var_dump($_GET);
}
