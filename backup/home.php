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
        <form class="form-inline my-2 my-lg-0">
            <div class="navtext text-center">Ingresa el Folio: <input type="text" class="form-control" id="folio" color="withe" aria-describedby="folio">
                <button class="btn btn-success mr-sm-2" id="btnFolio" type="button">Search</button></div>

            <div class="navtext text-center">Buscar por fecha: <input type="date" class="form-control" id="fecha" aria-describedby="fecha">
                <button class="btn btn btn-success mr-sm-2" id="btnFecha" type="button">Search</button></div>

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
                    <h3 class="text-center">Generar Ticket</h3>
                    <br>
                    <!-- Ticket -->

                    <div class="col-sm-6">
                        <div class="ticket ticketFont">
                            <img class="imgTicket" src="img/logo_mendezBN.jpg" alt="Logotipo">
                            <p class="centrado">TICKET DE COBRO
                                <br>Talleres Y Gruas Mendez
                                <br></p>
                            <p id="ticketFecha" class="centrado">Fecha:
                                <br>FOLIO:
                            </p>

                            <table>
                                <thead>
                                    <tr>
                                        <th class="cantidad">CANT</th>
                                        <th class="producto">CONCEPTO</th>
                                        <th class="precio">$$</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td id="ticketCantidad" class="cantidad"><input type="text" name="precioCorralon" size="2" placeholder="0"></td>
                                        <td id="ticketProducto" class="producto">Arrastre</td>
                                        <td id="ticketPrecio" class="precio"><input type="text" name="precioCorralon" size="6" placeholder="$0.00"></td>
                                    </tr>
                                    <tr>
                                        <td class="cantidad"><input type="text" name="precioCorralonwd" size="2" placeholder="0"></td>
                                        <td class="producto">Dias en corralon</td>
                                        <td class="precio"><input type="text" name="precioCorralon" size="6" placeholder="$0.00">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cantidad"></td>
                                        <td class="producto">SUB TOTAL</td>
                                        <td class="precio"><input type="text" name="precioCorralon" size="6" placeholder="$0.00"></td>
                                    </tr>
                                    <tr>
                                        <td class="cantidad"></td>
                                        <td class="producto">IVA</td>
                                        <td class="precio"><input type="text" name="precioCorralon" size="6" placeholder="$0.00"></td>
                                    </tr>
                                    <tr>
                                        <td class="cantidad"></td>
                                        <td class="producto">TOTAL</td>
                                        <td class="precio"><input type="text" name="precioCorralon" size="6" placeholder="$0.00"></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p class="centrado">¡GRACIAS POR SU PAGO!
                                <br>Tel: 0155245524</p>
                        </div>
                    </div>
                    <div id="generarTicket">
                    </div>
            </div>
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

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

</body>

</html>