<?php
//Impementacion de sesiones

if (isset($_SESSION['rol']) && $_SESSION['rol'] != 1) {

    $data = array();
    $data['rol'] = $_SESSION['rol'];
    $data['nombre'] = $user->getNombre();
    $data['region'] = strtolower($user->getUserRolName()); //Nombre de la region a minusculas

} else {
    echo "No tiene permiso de ver estsa pagina";
    //echo $_SESSION['rol'];
    //header("location: ../index.php");include/logout.php
    header("location: include/logout.php");
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Grúas Mendez</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js" integrity="sha256-AdQN98MVZs44Eq2yTwtoKufhnU+uZ7v2kXnD5vqzZVo=" crossorigin="anonymous"></script>

    <!-- Tipo de letra Roboto monospace -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/ticketCSS.css">



    <script>
        localStorage.setItem('MRDKey', '<?php echo $user->getUserRolName(); ?>');
    </script>

    <script type="text/javascript" src="js/peticiones.js"></script>

    <style>
        .navtext {
            color: floralwhite;
        }

        ul {
            list-style: none;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="img/logo-2.png" width="40%" height="40%" class="d-inline-block align-top" alt="">
        </a>
        <!-- Region -->
        <div class="navtext">
            <h3>Admin: <?php echo $user->getUserRolName() ?> </h3>
        </div>
        <!-- /Region -->
        <form class="form-inline my-2 my-lg-0">
            <div class="navtext text-center mr-sm-2">
                <ul>
                    <li>Bienvenido: </li>
                    <li><?php echo $user->getNombre(); ?> </li>
                </ul>
            </div>
            <div class="navtext mr-sm-2"><button class="btn btn-success" id="btnLogout" onclick="location.href='include/logout.php'" type="button">Cerrar Sesion</button></div>
        </form>
    </nav>
    <br>
    <div class="container">
        <!-- Fromulario de busqueda -->
        <form>
            <div class="form-row">
                <div class="form-group col-md-2">
                </div>
                <div class="form-group col-md-3">
                    <label for="fechaInicial">Fecha de inicio</label>
                    <input type="date" class="form-control" id="fechaInicial">
                </div>
                <div class="form-group col-md-3">
                    <label for="fechaFinal">Fecha final</label>
                    <input type="date" class="form-control" id="fechaFinal" disabled>
                    <input type="checkbox" id="chboxHabilitarFechaFinal">
                    <small class="text-muted" for="chboxHabilitarFechaFinal">Habilite para buscar entre 2 fechas</small>
                </div>
                <div class="form-group col-md-2">
                    <label for="btnFecha">Buscar por fecha</label>
                    <button id="btnFecha" type="button" class="form-control btn btn-primary">Buscar</button>
                </div>
                <div class="form-group col-md-2">
                </div>
            </div>
            <div class="dropdown-divider"></div>
            <div class="form-row">
                <div class="form-group col-md-2">
                </div>
                <div class="form-group col-md-3">
                    <label for="folio">Ingrese el Folio</label>
                    <input type="text" class="form-control" id="folio" placeholder="">
                </div>
                <div class="form-group col-md-2">
                    <label for="btnFolio">Buscar Por Folio</label>
                    <button id="btnFolio" type="button" class="form-control btn btn-secondary">Buscar</button>
                </div>
                <div class="form-group col-md-2">
                </div>
            </div>
        </form>
        <div class="dropdown-divider"></div>
        <div class="row">
            <!-- Reportes -->
            <div class="col-md-3">
                <div id="reportes" class="btn-group-vertical" class="col-sm-3" role="group" aria-label="Basic example">
                    <h2>Reportes</h2>
                </div>

            </div>
            <!-- Informacion general -->
            <div class="col-md-6">
                <h3>Informacion General</h3>
                <div class="row alert alert-secondary" role="alert">
                    <div class="col-sm-2"><img src="img/reporte.png" alt="modelo" width="40px" height="40px"></div>
                    <div class="col-sm-2"><label for="staticModelo" class=" col-form-label">Reporte:</label></div>
                    <div class="col-sm" id="reporte"></div>
                </div>

                <div class="row alert alert-success" role="alert">
                    <div class="col-sm-2"><img src="img/modelo.png" alt="modelo" width="40px" height="40px"></div>
                    <div class="col-sm-2"><label for="staticModelo" class=" col-form-label">Modelo:</label></div>
                    <div class="col-sm" id="modelo"></div>
                </div>


                <div class="row alert alert-success" role="alert">
                    <div class="col-sm-2"><img src="img/placa.png" calt="placas" width="40px" height="40px"></div>
                    <div class="col-sm-2"><label for="staticPlacas" class=" col-form-label">Placas:</label></div>
                    <div class="col-sm" id="placas"></div>
                </div>

                <div class="row alert alert-success" role="alert">
                    <div class="col-sm-2"><img src="img/dias.png" alt="días en el corralón" width="40px" height="40px">
                    </div>
                    <div class="col-sm-2"><label for="staticDias" class=" col-form-label">Días en corralón:</label>
                    </div>
                    <div class="col-sm" id="diasCorralon"></div>
                </div>

                <div class="row alert alert-success" role="alert">
                    <div class="col-sm-2"><img src="img/fecha.png" alt="fecha de arrastre" width="40px" height="40px">
                    </div>
                    <div class="col-sm-2"><label for="staticFecha" class=" col-form-label">Fecha de arrastre:</label>
                    </div>
                    <div class="col-sm" id="fechaArrastre"></div>
                </div>

                <div class="row alert alert-success" role="alert">
                    <div class="col-sm-2"><img src="img/direccion.png" alt="dirección" width="40px" height="40px"></div>
                    <div class="col-sm-2"><label for="staticDireccion" class=" col-form-label">Dirección:</label></div>
                    <div class="col-sm" id="direccion"></div>
                </div>

                <div class="row alert alert-success" role="alert">
                    <div class="col-sm-2"><img src="img/grua.png" alt="grúa" width="40px" height="40px"></div>
                    <div class="col-sm-2"><label for="staticGrua" class=" col-form-label">Grúa:</label></div>
                    <div class="col-sm" id="grua"></div>
                </div>
            </div>
            <!-- Ticket -->
            <div class="col-md-3">
                <center>
                    <div id="ticketHeader">
                        <div class="alert alert-dark" role="alert">
                            Ticket
                        </div>
                    </div>

                    <br>
                    <div class="ticket ticketFont contorno">
                        <img class="imgTicket" src="img/logo_mendezBN.jpg" alt="Logotipo">
                        <p class="centrado">TICKET DE COBRO
                            <br>Talleres Y Gruas Mendez S.A. de C.V.</p>
                        <p id="ticketFecha">Fecha</p>
                        <table>
                            <thead>
                                <tr>
                                    <th class="linea">INFORMACION DE ENTREGA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="linea">IFE de quien recibe</td>
                                </tr>
                                <tr>
                                    <td class="linea"><input class="centrado sinborde" maxlength="32" size="32" id="ticketIFE" placeholder="Numero de IFE" type="text"></td>
                                </tr>
                                <tr>
                                    <td id="ticketProducto" class="linea">Recibi del Sr. (s) :</td>
                                </tr>
                                <tr>
                                    <td class="linea"><textarea class="centrado sinborde" placeholder="Nombre de quien retira la unidad" id="ticketNombre" rows="2" cols="30"></textarea></td>
                                </tr>
                                <tr>
                                    <td class="linea">La cantidad de: </td>
                                </tr>
                                <tr>
                                    <td class="linea">$<input class="centrado sinborde" maxlength="32" size="30" id="ticketImporte" placeholder="Importe" type="text"></td>
                                </tr>
                                <tr>
                                    <td class="linea"><textarea class="centrado sinborde" placeholder="Importe con letra" id="ticketImporteLetra" rows="2" cols="30"></textarea></td>
                                </tr>
                                <tr>
                                    <td class="linea">Por Concepto de:</td>
                                </tr>
                                <tr>
                                    <td class="linea"><textarea class="centrado sinborde" placeholder="Concepto de importe" id="ticketConcepto" rows="2" cols="30"></textarea></td>
                                </tr>
                                <tr>
                                    <td class="linea"><textarea id="letraMenor" class="centrado sinborde" placeholder="Concepto de importe" rows="4" cols="36" disabled>Este RECIBO forma parte de la facturacion diaria deacuerdo a las leyes fiscales vigentes y solo podra solicitar factura dentro del mes corriente a la presentacion del servicio.
                                        Todos nuestros precios tienen I.V.A. incluido</textarea></td>
                                </tr>
                                <tr>
                                    <td><br><br></td>
                                </tr>
                                <tr>
                                    <td class="linea centrado">__________________________________</td>
                                </tr>
                                <tr>
                                    <td class="linea centrado">Clave y firma de recivido</td>
                                </tr>
                                <tr>
                                    <td><br><br></td>
                                </tr>
                                <tr>
                                    <td class="linea centrado">__________________________________</td>
                                </tr>
                                <tr>
                                    <td class="linea centrado">Manifiesto recibir mi vehiculo</td>
                                </tr>
                                <tr>
                                    <td class="linea centrado">a mi entera satisfaccion</td>
                                </tr>

                            </tbody>
                        </table>
                        <br><br>
                    </div>
                    <div id="generarTicket">
                    </div>
            </div>
            <!-- Ticket -->

            </center>
        </div>
        <div align="center">
            <img src="img/inventario.png" alt="fecha de arrastre" width="5%" height="5%">
            <div id="verMas"></div>
        </div>
        <hr>
        <br>
        <center>
            <h2>Reporte fotográfico</h2>
        </center>
        <div class="row">
            <div class="col-sm-3" id="img1">
                <img src="img/lartel1.jpg" alt="lateral1" width="80%">
            </div>
            <div class="col-sm-3" id="img2">
                <img src="img/lartel2.gif" alt="lateral2" width="80%">
            </div>
            <div class="col-sm-3" id="img3">
                <img src="img/trasera.gif" alt="trasera" width="80%">
            </div>
            <div class="col-sm-3" id="img4">
                <img src="img/delantera.gif" alt="delantera" width="80%">
            </div>
        </div>
    </div>


    <!-- Modal Warning -->
    <div class="modal fade" id="modalWarning" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Advertencia!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="divModalWarning" class="modal-body alert alert-warning">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="clearModalWarning()">OK</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Confirmacion -->
    <div class="modal fade" id="modalConfirmacion" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Confirmacion Cierre De Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="divModalConfirmacion" class="text-center modal-body alert alert-warning">
                </div>
                <div class="modal-footer">
                    <button id="cancelModalConfirmacion" type="button" onclick="resetConfirmacionModal()" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button id="okModalConfirmacion" type="button" onclick="cerrarTicket()" class="btn btn-primary">Cerrar Ticket</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>