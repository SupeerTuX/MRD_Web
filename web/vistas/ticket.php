<?php
//Impementacion de sesiones
include '../include/user.php';
include '../include/user_session.php';


$userSession = new UserSession();
$user = new User();

if (isset($_SESSION['rol']) && $_SESSION['rol'] != 1) {

    $data = array();
    $data['rol'] = $_SESSION['rol'];
    $data['nombre'] = $user->getNombre();
    $data['region'] = strtolower($user->getUserRolName()); //Nombre de la region a minusculas

} else {
    echo "No tiene permiso de ver estsa pagina";
    //header("location: ../index.php");include/logout.php
    header("location: ../include/logout.php");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Impresion Ticket</title>
    <link rel="stylesheet" href="../css/ticketCSS.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/ticket.js"></script>
</head>

<body>
    <div class="col-md-3">
        <div class="ticket ticketFont">
            <img class="imgTicket" src="../img/logo_mendezBN.jpg" alt="Logotipo">
            <p class="centrado">TICKET DE COBRO
                <br>Talleres Y Gruas Mendez</p>
            <p class="centrado" id="ticketFecha">Fecha</p>
            <table>
                <thead>
                    <tr>
                        <th class="linea">CONCEPTO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="linea">IFE de quien recibe</td>
                    </tr>
                    <tr>
                        <td class="linea"><input class="centrado sinborde" maxlength="22" size="18" id="ticketIFE" placeholder="Numero de IFE" type="text" disabled></td>
                    </tr>
                    <tr>
                        <td class="linea">Recibi del Sr. (s) :</td>
                    </tr>
                    <tr>
                        <td class="linea"><textarea class="centrado sinborde" placeholder="Nombre de quien retira la unidad" id="ticketNombre" rows="2" maxlength="22" cols="17" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td class="linea">La cantidad de: </td>
                    </tr>
                    <tr>
                        <td class="linea">$<input class="centrado sinborde" id="ticketImporte" placeholder="Importe" type="text" disabled></td>
                    </tr>
                    <tr>
                        <td class="linea"><textarea class="centrado sinborde" placeholder="Importe con letra" id="ticketImporteLetra" rows="2" cols="17" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td class="linea">Por Concepto de:</td>
                    </tr>
                    <tr>
                        <td class="linea"><textarea class="centrado sinborde" placeholder="Concepto de importe" id="ticketConcepto" rows="2" cols="17" disabled></textarea></td>
                    </tr>
                    <tr>
                        <td class="linea"><textarea class="centrado sinborde" placeholder="Concepto de importe" rows="16" cols="17" disabled>Este RECIBO forma parte de la facturacion diaria deacuerdo a las leyes fiscales vigentes y solo podra solicitar factura dentro del mes corriente a la presentacion del servicio.
                                        Todos nuestros precios tienen I.V.A. incluido</textarea></td>
                    </tr>
                    <tr>
                        <td><br><br></td>
                    </tr>
                    <tr>
                        <td class="linea centrado">_________________________</td>
                    </tr>
                    <tr>
                        <td class="linea centrado">Clave y firma de recivido</td>
                    </tr>
                    <tr>
                        <td><br><br></td>
                    </tr>
                    <tr>
                        <td class="linea centrado">_________________________</td>
                    </tr>
                    <tr>
                        <td class="linea centrado">Manifiesto recibir mi vehiculo</td>
                    </tr>
                    <tr>
                        <td class="linea centrado">A mi entera satisfaccion</td>
                    </tr>
                </tbody>
            </table>
            <br>
        </div>
    </div>
    <button class="oculto-impresion" onclick="imprimir()">Imprimir</button>

</body>

</html>