<?php

use PhpParser\JsonDecoder;
use Dompdf\Dompdf;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/config/db.php';
//require_once 'dompdf/autoload.inc.php';

if (isset($_GET['Reportes'])) {

    $_Reportes = $_GET['Reportes'];
    foreach ($_Reportes as $x) {
        $Folios[] = $x['Folio'];
    }

    $Region = $_GET['Region'];
    echo var_dump($Folios);

    //* Cargamos los datos de los reportes
    $Reportes = array();
    foreach ($_Reportes as $x) {
        //*Consulta de cada reporte
        //*Preparando consulta
        $sql = "SELECT * FROM $Region WHERE Folio=:folio";
        try {
            $db = new db();
            $db = $db->connectDB();
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

    //* Tickets
    $Tickets = array();
    $tabla = 'folio_' . $Region;
    foreach ($_Reportes as $x) {
        //echo $x['Folio'];
        //*Consulta de cada reporte
        //*Preparando consulta
        $sql = "SELECT * FROM $tabla WHERE Folio=:folio";
        try {
            $db = new db();
            $db = $db->connectDB();
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

    //echo var_dump($Reportes);
    //echo var_dump($Tickets);

    //* Extrae el contenido del css
    $css = file_get_contents('css/reporte.css');
    //* Instancia del laclase mpdf y tipo de letra por defecto
    $mpdf = new \Mpdf\Mpdf([
        'default_font_size' => 10,
        'default_font' => 'helvetica'
    ]);
    //* Carga el contenido del css
    $mpdf->WriteHTML($css, 1);

    $maxGas = 12;
    //* Cargamos el codigo html concatenado con la informacion del reporte
    foreach ($_Reportes as $x) {
        //Reporte actual $Reportes['Folio'], 
        // $Reportes[$x['Folio']] Contiene el folio actual
        // $Tickets[$x['Folio']] Contiene la informacion del folio actual
        //$html Buffer con el codigo html del reporte

        $html = '<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Reporte</title>
        <link rel="stylesheet" href="css/reporte.css" />
    </head>

    <body>
        <div id="wrapper">
            <header>
                <h1>Reporte: ' .  ' ' . $Tickets[$x['Folio']]['PrefijoConsecutivo'] . $Tickets[$x['Folio']]['Consecutivo'] . '</h1>
                
            </header>
            <article>
                <address>
                <table class="titulo">
                    <thead>
                        <tr>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td><img src="img/logo_mendezBN.jpg" width="200"><br>Talleres Y Gruas Mendez S.A. de C.V.</td>
                        </tr>
                    </tbody>
                </table>
                </address>
                <table class="meta">
                    <tr>
                        <th>FOLIO</th>
                        <td>' . $Tickets[$x['Folio']]['PrefijoConsecutivo'] . $Tickets[$x['Folio']]['Consecutivo'] . '</td>
                    </tr>
                    <tr>
                        <th>Referencia</th>
                        <td>' . $Reportes[$x['Folio']]['Folio'] . '</td>
                    </tr>
                    <tr>
                        <th>Fecha de Arrastre</th>
                        <td>' . $Reportes[$x['Folio']]['Fecha'] . '</td>
                    </tr>
                    <tr>
                        <th>Direccion</th>
                        <td>' . $Reportes[$x['Folio']]['Direccion'] . '</td>
                    </tr>
                </table>

                <table class="inventory">
                    <thead>
                        <tr>
                            <td colspan="6" class="fondogris centrado negrita">Informacion</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fondo1 negrita">Motivo de inventario</td>
                            <td>' . $Reportes[$x['Folio']]['MotivoInventario'] . '</td>
                            <td class="fondo1 negrita">Vehículo marca</td>
                            <td>' . $Reportes[$x['Folio']]['VahiculoMarca'] . '</td>
                            <td class="fondo1 negrita">Tipo</td>
                            <td>' . $Reportes[$x['Folio']]['Tipo'] . '</td>
                        </tr>
                        <tr>
                            <td class="fondo1 negrita">Modelo</td>
                            <td>' . $Reportes[$x['Folio']]['Modelo'] . '</td>
                            <td class="fondo1 negrita">Color</td>
                            <td>' . $Reportes[$x['Folio']]['Color'] . '</td>
                            <td class="fondo1 negrita">Placas</td>
                            <td>' . $Reportes[$x['Folio']]['Placas'] . '</td>
                        </tr>
                        <tr>
                            <td class="fondo1 negrita">Número de serie</td>
                            <td>' . $Reportes[$x['Folio']]['NoSerie'] . '</td>
                            <td class="fondo1 negrita">Conductor o propietario</td>
                            <td>' . $Reportes[$x['Folio']]['NombreConductor'] . '</td>
                            <td class="fondo1 negrita">Llaves</td>
                            <td>' . $Reportes[$x['Folio']]['Llaves'] . '</td>
                        </tr>
                        <tr>
                            <td class="fondo1 negrita">Telefono</td>
                            <td>' . $Reportes[$x['Folio']]['Telefono'] . '</td>
                            <td class="fondo1 negrita">Grúa</td>
                            <td>' . $Reportes[$x['Folio']]['Grua'] . '</td>
                            <td class="fondo1 negrita">Clave operador</td>
                            <td>' . $Reportes[$x['Folio']]['ClaveOperador'] . '</td>
                        </tr>
                        <tr>
                            <td class="fondo1 negrita">Autoridad o empresa solicitante</td>
                            <td>' . $Reportes[$x['Folio']]['Solicitante'] . '</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <p class="centrado negrita">Estado en el que se recibio el vehiculo</p>
                <table class="inventory">
                    <thead>
                        <tr>
                            <th>Exterior</th>
                            <th>Estado</th>
                            <th>Interior</th>
                            <th>Estado</th>
                            <th>Motor</th>
                            <th>Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Defensa delantera</td>
                            <td>' . $Reportes[$x['Folio']]['DefensaDelantera'] . '</td>
                            <td>Tablero</td>
                            <td>' . $Reportes[$x['Folio']]['Tablero'] . '</td>
                            <td>Radiador</td>
                            <td>' . $Reportes[$x['Folio']]['Radiador'] . '</td>
                        </tr>
                        <tr>
                            <td>Carrocerías sin golpes</td>
                            <td>' . $Reportes[$x['Folio']]['CarroceriaSinGolpes'] . '</td>
                            <td>Volante</td>
                            <td>' . $Reportes[$x['Folio']]['Volante'] . '</td>
                            <td>Motoventilador</td>
                            <td>' . $Reportes[$x['Folio']]['Motoventilador'] . '</td>
                        </tr>
                        <tr>
                            <td>Parrilla</td>
                            <td>' . $Reportes[$x['Folio']]['Parrilla'] . '</td>
                            <td>Radio</td>
                            <td>' . $Reportes[$x['Folio']]['Radio'] . '</td>
                            <td>Alternador</td>
                            <td>' . $Reportes[$x['Folio']]['Alternador'] . '</td>
                        </tr>
                        <tr>
                            <td>Faros</td>
                            <td>' . $Reportes[$x['Folio']]['Faros'] . '</td>
                            <td>Equipo de sonido</td>
                            <td>' . $Reportes[$x['Folio']]['EquipoSonido'] . '</td>
                            <td>Cable bujías</td>
                            <td>' . $Reportes[$x['Folio']]['CableDeBujias'] . '</td>
                        </tr>
                        <tr>
                            <td>Cofre</td>
                            <td>' . $Reportes[$x['Folio']]['Cofre'] . '</td>
                            <td>Encendedor</td>
                            <td>' . $Reportes[$x['Folio']]['Encendedor'] . '</td>
                            <td>Depurador</td>
                            <td>' . $Reportes[$x['Folio']]['Depurador'] . '</td>
                        </tr>
                        <tr>
                            <td>Parabrisas</td>
                            <td>' . $Reportes[$x['Folio']]['Parabrisas'] . '</td>
                            <td>Espejo</td>
                            <td>' . $Reportes[$x['Folio']]['Espejo'] . '</td>
                            <td>Carburador</td>
                            <td>' . $Reportes[$x['Folio']]['Carburador'] . '</td>
                        </tr>
                        <tr>
                            <td>Limpiadores</td>
                            <td>' . $Reportes[$x['Folio']]['Limpiadores'] . '</td>
                            <td>Asientos</td>
                            <td>' . $Reportes[$x['Folio']]['Asientos'] . '</td>
                            <td>Filtro de Aire</td>
                            <td>' . $Reportes[$x['Folio']]['FiltroAire'] . '</td>
                        </tr>
                        <tr>
                            <td>Emblemas</td>
                            <td>' . $Reportes[$x['Folio']]['Emblemas'] . '</td>
                            <td>Tapetes de alfombra</td>
                            <td>' . $Reportes[$x['Folio']]['TapetesAlfombra'] . '</td>
                            <td>Inyectores</td>
                            <td>' . $Reportes[$x['Folio']]['Inyectores'] . '</td>
                        </tr>
                        <tr>
                            <td>Portezuela Izq</td>
                            <td>' . $Reportes[$x['Folio']]['PortezuelaIzq'] . '</td>
                            <td>Tapetes de hule</td>
                            <td>' . $Reportes[$x['Folio']]['TapetesHule'] . '</td>
                            <td>Compresor</td>
                            <td>' . $Reportes[$x['Folio']]['Compresor'] . '</td>
                        </tr>
                        <tr>
                            <td>Cristales Lat Izq</td>
                            <td>' . $Reportes[$x['Folio']]['CristalLatIzq'] . '</td>
                            <td>Extintor</td>
                            <td>' . $Reportes[$x['Folio']]['Extintor'] . '</td>
                            <td>Computadora</td>
                            <td>' . $Reportes[$x['Folio']]['Computadora'] . '</td>
                        </tr>
                        <tr>
                            <td>Medallón</td>
                            <td>' . $Reportes[$x['Folio']]['Medallon'] . '</td>
                            <td>Gato y maneral</td>
                            <td>' . $Reportes[$x['Folio']]['GatoYManeral'] . '</td>
                            <td>Batería</td>
                            <td>' . $Reportes[$x['Folio']]['Bateria'] . '</td>
                        </tr>
                        <tr>
                            <td>Cajuela</td>
                            <td>' . $Reportes[$x['Folio']]['Cajuela'] . '</td>
                            <td>Triangulo de seguridad</td>
                            <td>' . $Reportes[$x['Folio']]['TrianguloDeSeguridad'] . '</td>
                            <td>Marca</td>
                            <td>' . $Reportes[$x['Folio']]['MarcaMotor'] . '</td>
                        </tr>
                        <tr>
                            <td>Defensa trasera</td>
                            <td>' . $Reportes[$x['Folio']]['DefensaTrasera'] . '</td>
                            <td>Bocinas</td>
                            <td>' . $Reportes[$x['Folio']]['Bocinas'] . '</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Portezuela Der</td>
                            <td>' . $Reportes[$x['Folio']]['PortezuelaDer'] . '</td>
                            <td>Luces</td>
                            <td>' . $Reportes[$x['Folio']]['Luces'] . '</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Cristal Lat Der</td>
                            <td>' . $Reportes[$x['Folio']]['CristalLatDer'] . '</td>
                            <td>Tag</td>
                            <td>' . $Reportes[$x['Folio']]['Tag'] . '</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Antenas</td>
                            <td>' . $Reportes[$x['Folio']]['Antenas'] . '</td>
                            <td>Vial pass</td>
                            <td>' . $Reportes[$x['Folio']]['VialPass'] . '</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Espejos</td>
                            <td>' . $Reportes[$x['Folio']]['Espejo'] . '</td>
                            <td>Sim card</td>
                            <td>' . $Reportes[$x['Folio']]['SimCard'] . '</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tapones Ruedas</td>
                            <td>' . $Reportes[$x['Folio']]['TaponesRuedas'] . '</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Tapón Gasolina</td>
                            <td>' . $Reportes[$x['Folio']]['TaponGasolina'] . '</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Salpicadera Der</td>
                            <td>' . $Reportes[$x['Folio']]['SalpicaderaDer'] . '</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Salpicadera Izq</td>
                            <td>' . $Reportes[$x['Folio']]['SalpicaderaIzq'] . '</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>

                <table class="inventory">
                    <thead>
                        <tr>
                            <th>Marca Llantas</th>
                            <th>Medida Llantas</th>
                            <th>Cantidad Llantas</th>
                            <th>Tanque de Gasolina</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>' . $Reportes[$x['Folio']]['MarcaLlantas'] . '</td>
                            <td>' . $Reportes[$x['Folio']]['MedidaLlantas'] . '</td>
                            <td>' . $Reportes[$x['Folio']]['CantidadLlantas'] . '</td>
                            <td>' . number_format((float) (($Reportes[$x['Folio']]['TanqueGasolina'] / $maxGas) * 100), 2, '.', '')  . '%</td>
                        </tr>
                    </tbody>
                </table>
                <table class="balance">
                    <tr>
                        <th>Fecha de liberacion</th>
                        <td>' . $Tickets[$x['Folio']]['FechaTicket'] . '</td>
                    </tr>
                    <tr>
                        <th>Importe Pagado</th>
                        <td><span data-prefix>$</span><span contenteditable>' . $Tickets[$x['Folio']]['Importe'] . '</span></td>
                    </tr>
                    <tr>
                        <th>Importe con letra</th>
                        <td>' . $Tickets[$x['Folio']]['ImporteLetra'] . '</td>
                    </tr>
                </table>
            </article>
        </div>
    </body>
</html>
';

        $mpdf->WriteHTML($html);
        $mpdf->AddPage();
    }
    $mpdf->Output("reporte.pdf", "I");
} else {
    echo "No existe Reportes";
}
