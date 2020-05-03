<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Formulario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    </script>

    <script type="text/javascript" src="/mrd/web/js/formulario.js">
    </script>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="img/logo-2.png" width="30%" height="30%" class="d-inline-block align-top" alt="">
        </a>
    </nav>
    <!--INICIA FORMULARIO-->
    <div class="container">
        <center>
            <h3>Información</h3>
        </center>
        <hr>

        <form>
            <!--FORM-->
            <div class="alert alert-secondary" role="alert">
                <div class="form-group row">
                    <label for="Folio" class="col-sm-2 col-form-label">Folio:</label>
                    <div class="col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" id="Folio" value="">
                    </div>
                    <label for="Fecha" class="col-sm-2 col-form-label">Fecha:</label>
                    <div class="col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" id="Fecha" value="">
                    </div>
                    <label for="Hora" class="col-sm-2 col-form-label">Hora:</label>
                    <div class="col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" id="Hora" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="Direccion" class="col-sm-4 col-form-label">Dirección de recepción de la unidad:</label>
                    <div class="col-sm-8">
                        <input type="text" readonly class="form-control-plaintext" id="Direccion" value="">
                    </div>
                </div>
            </div>
            <!--**************************************************************************************************************************************************************-->
            <center>
                <h3>Motivo de inventario</h3>
            </center>
            <hr>
            <!--RADIO BUTTONS-->
            <div class="alert alert-success" role="alert">

                <div class="row">
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="" id="inlineRadioAsistencia" value="option1"
                            disabled>
                        <label class="form-check-label" for="inlineRadioAsistencia">Asistencia</label>
                    </div>
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="" id="inlineRadioSiniestro" value="option2"
                            disabled>
                        <label class="form-check-label" for="inlineRadioSiniestro">Siniestro</label>
                    </div>
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="" id="inlineRadioAlcoholimetro"
                            value="option3" disabled>
                        <label class="form-check-label" for="inlineRadioAlcoholimetro">Alcoholímetro</label>
                    </div>
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="" id="inlineRadioEstacionado" value="option4"
                            disabled>
                        <label class="form-check-label" for="inlineRadioEstacionado">Mal estacionado</label>
                    </div>
                </div>

                <div class="row">
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="" id="inlineRadioDetencion" value="option5"
                            disabled>
                        <label class="form-check-label" for="inlineRadioDetencion">Detención</label>
                    </div>
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="" id="inlineRadioInventario" value="option6"
                            disabled>
                        <label class="form-check-label" for="inlineRadioInventario">Solo inventario</label>
                    </div>
                    <div class="form-check form-check-inline col">
                        <input class="form-check-input" type="radio" name="" id="inlineRadioEspecial" value="option7"
                            disabled>
                        <label class="form-check-label" for="inlineRadioEspecial">Operativo especial</label>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="staticVehiculo" class="col-sm-2 col-form-label">Vehículo marca:</label>
                    <div class="col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" id="staticVehiculo" value="">
                    </div>
                    <label for="staticTipo" class="col col-form-label">Tipo:</label>
                    <div class="col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" id="staticTipo" value="">
                    </div>
                    <label for="staticModelo" class="col col-form-label">Modelo:</label>
                    <div class="col-sm-1">
                        <input type="text" readonly class="form-control-plaintext" id="staticModelo" value="">
                    </div>
                    <label for="staticColor" class="col col-form-label">Color:</label>
                    <div class="col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" id="staticColor" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticPlacas" class="col-sm-1 col-form-label">Placas:</label>
                    <div class="col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" id="staticPlacas" value="">
                    </div>
                    <label for="staticSerie" class="col-sm-2 col-form-label">Número de serie:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext" id="staticSerie" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticPropietario" class="col-sm-4 col-form-label">Conductor del vehículo o
                        propietario:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext" id="staticPropietario" value="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="staticLlaves" class="col-sm-1 col-form-label">Llaves:</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="llavesSi" value=""
                            disabled>
                        <label class="form-check-label" for="llavesSi">Sí</label>
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="llavesOptions" id="llavesNo" value=""
                            disabled>
                        <label class="form-check-label" for="llavesNo">No</label>
                    </div>

                    <label for="staticTel" class="col-sm-0 col-form-label">Tel:</label>
                    <div class="col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" id="staticTel" value="">
                    </div>

                    <label for="staticGrua" class="col-sm-0 col-form-label">Grúa:</label>
                    <div class="col-sm-2">
                        <input type="text" readonly class="form-control-plaintext" id="staticGrua" value="">
                    </div>

                    <label for="staticClave" class="col-sm-0 col-form-label">Clave operador:</label>
                    <div class="col-sm-3">
                        <input type="text" readonly class="form-control-plaintext" id="staticClave" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="staticSolicitante" class="col-sm-3 col-form-label">Autoridad o empresa
                        solicitante:</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext" id="staticSolicitante" value="">
                    </div>
                </div>
            </div>


            <!--RADIO BUTTONS-->
            <center>
                <h3>Estado en que se recibe el vehículo</h3>
            </center>
            <hr>

            <div class="row">
                <div class="col-sm-4">
                    <table class="table">
                        <thead>
                            <tr class="table-success">
                                <th scope="col">Exterior</th>
                                <th scope="col">Bien</th>
                                <th scope="col">Mal</th>
                                <th scope="col">No trae</th>
                            </tr>
                        </thead>
                        <tbody>


                            <tr>
                                <form action="">
                                    <th scope="row">Defensa delantera</th>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="" id="defensaDelantera1"
                                                value="option1" aria-label="..." disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="" id="defensaDelantera2"
                                                value="option1" aria-label="..." disabled>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input " type="radio" name="" id="defensaDelantera3"
                                                value="option1" aria-label="..." disabled>
                                        </div>
                                    </td>
                                </form>
                            </tr>
                            <tr>
                                <th scope="row">Carrocerías sin golpes </th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input " type="radio" name="" id="carroceriaSinGolpes1"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input " type="radio" name="" id="carroceriaSinGolpes2"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input " type="radio" name="" id="carroceriaSinGolpes3"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>




                            <tr>
                                <th scope="row">Parrilla</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="parrilla1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="parrilla2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="parrilla3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Faros</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="faros1"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="faros2"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="faros3"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Cofre</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="cofre1"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="cofre2"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="cofre3"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Parabrisas</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="parabrisas1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="parabrisas2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="parabrisas3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Limpiadores</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="limpiadores1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="limpiadores2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="limpiadores3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Emblemas</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="emblemas1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="emblemas2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="emblemas3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Portezuela Izq</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="portezuelaIzq1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="portezuelaIzq2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="portezuelaIzq3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Cristales Lat Izq</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cristalLatIzq1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cristalLatIzq2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cristalLatIzq3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Medallón</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="medallon1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="medallon2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="medallon3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Cajuela</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cajuela1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cajuela2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cajuela3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Defensa trasera</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="defensaTras1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="defensaTras2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="defensaTras3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Portezuela Der</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="portezuelaDer1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="portezuelaDer2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="portezuelaDer3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Cristales Lat Der</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cristalLatDer1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cristalLatDer2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cristalLatDer3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Antenas</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="antenas1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="antenas2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="antenas3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Espejos</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="espejos1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="espejos2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="espejos3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tapones Ruedas</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="taponesRuedas1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="taponesRuedas2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="taponesRuedas3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tapón Gasolina</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="taponGas1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="taponGas2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="taponGas3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Salpicadera Der</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="salpicaderaDer1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="salpicaderaDer2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="salpicaderaDer3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Salpicadera Izq</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="salpicaderaIzq1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="salpicaderaIzq2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="salpicaderaIzq3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-sm-4">
                    <table class="table">
                        <thead>
                            <tr class="table-success">
                                <th scope="col">Interior</th>
                                <th scope="col">Bien</th>
                                <th scope="col">Mal</th>
                                <th scope="col">No trae</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Tablero</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="tablero1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="tablero2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="tablero3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Volante</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="volante1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="volante2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="volante3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Radio</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="radio1"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="radio2"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="radio3"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Equipo de sonido</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="eqpSonido1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="eqpSonido2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="eqpSonido3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Encendedor</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="encendedor1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="encendedor2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="encendedor3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Espejo</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="espejo1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="espejo2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="espejo3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Asientos</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="asientos1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="asientos2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="asientos3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tapetes de alfombra</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="tptAlfombra1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="tptAlfombra2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="tptAlfombra3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tapetes de hule</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="tptHule1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="tptHule2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="tptHule3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Extintor</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="extintor1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="extintor2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="extintor3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Gato y maneral</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="gato1"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="gato2"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="gato3"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Triangulo de seguridad</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="triangulo1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="triangulo2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="triangulo3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Bocinas</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="bocinas1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="bocinas2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="bocinas3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Luces</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="luces1"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="luces2"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="luces3"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Tag</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="tag1"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="tag2"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="tag3"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Vial pass</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="vial1"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="vial2"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name="" id="vial3"
                                            value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Sim card</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="simcard1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="simcard2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="simcard3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--TABLA2-->
                <div class="col-sm-4">
                    <table class="table">
                        <thead>
                            <tr class="table-success">
                                <th scope="col">Motor</th>
                                <th scope="col">Bien</th>
                                <th scope="col">Mal</th>
                                <th scope="col">No trae</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Radiador</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="radiador1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="radiador2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="radiador3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Motoventilador</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="motoventilador1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="motoventilador2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="motoventilador3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Alternador</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="alternador1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="alternador2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="alternador3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Cable bujías</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cableBujias1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cableBujias2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="cableBujias3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Depurador</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="depurador1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="depurador2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="depurador3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Carburador</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="carburador1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="carburador2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="carburador3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Filtro de aceite</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="filtroAceite1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="filtroAceite2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="filtroAceite3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Inyectores</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="inyectores1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="inyectores2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="inyectores3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Compresor</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="compresor1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="compresor2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="compresor3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Computadora</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="computadora1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="computadora2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="computadora3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">Batería</th>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="bateria1" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="bateria2" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-check">
                                        <input class="form-check-input position-static" type="radio" name=""
                                            id="bateria3" value="option1" aria-label="..." disabled>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <div class="form-group">
                                        <label for="bateriaMarca">Marca</label>
                                        <input type="text" class="form-control" id="bateriaMarca">
                                    </div>
                                </th>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <!--TERMINAN TABLAS-->
                <div class="row alert alert-success" role="alert">
                    <div class="col-sm-8">
                        <center>
                            <h4>Llantas</h4>
                        </center>
                        <hr>
                        <div class="form-group row">
                            <label for="llantasMarca" class="col-sm-2 col-form-label">Marca:</label>
                            <div class="col-sm-2">
                                <input type="text" readonly class="form-control-plaintext" id="llantasMarca" value="">
                            </div>
                            <label for="llantasMedida" class="col-sm-2 col-form-label">Medida:</label>
                            <div class="col-sm-2">
                                <input type="text" readonly class="form-control-plaintext" id="llantasMedida" value="">
                            </div>
                            <label for="llantasCantidad" class="col-sm-2 col-form-label">Cantidad:</label>
                            <div class="col-sm-2">
                                <input type="text" readonly class="form-control-plaintext" id="llantasCantidad"
                                    value="">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <center>
                            <h4>Tanque de gasolina</h4>
                            <hr>
                            <img src="img/metro.png" alt="Tanque de gasolina" style="width: 80%;">
                        </center>
                        <div class="progress" id="barraGas">
                            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100"> </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p>
                ATENCIÓN: Por favor recoja sus objetos personales que se encuentren en el vehículo ya que la empresa no
                se hace responsable de ellos.
            </p>
            <div class="form-group row">
                <label for="staticCarga" class="col-sm-2 col-form-label">Carga consistente en:</label>
                <div class="col-sm-2">
                    <input type="text" readonly class="form-control-plaintext" id="staticCarga" value="">
                </div>
            </div>

            <div class="form-group row">
                <label for="staticObservaciones" class="col-sm-2 col-form-label">Observaciones:</label>
                <div class="col-sm-2">
                    <input type="text" readonly class="form-control-plaintext" id="staticObservaciones" value="">
                </div>
            </div>
            <div class="alert alert-danger" role="alert">
                <center>
                    <h4>NO NOS HACEMOS RESPONSABLES POR RECLAMACIONES DE DAÑOS Y/O PERDIDA POR OBJETOS Y/O COMPONENTES
                        OLVIDADOS EN SU AUTO SI ESTOS NO FUERON RECLAMADOS DE MANERA INICIAL EN EL INVENTARIO.</h4>
                </center>

            </div>
        </form>
    </div>
    <!---ACABAN LOS RADIO BUTTONS-->

    <script>
    var folio2, fecha, hora, direccion, getData = function() {

        switch (cadVariables) {
            case 'folio=001':
                folio2 = '001';
                fecha = 'YXSl1';
                hora = '15:00';
                direccion = 'Luis Hidalgo Monroy 47';
                vehiculo = 'Mazda';
                tipo = 'Sedan';
                modelo = '2015';
                color = 'Rojo';
                placas = 'YXSl1';
                serie = '24864';
                propietario = 'Hugo Mendoz Ramos';
                tel = 2281086075;
                grua = '001MRD';
                operador = 'Isabelo Hernández';
                solicitante = 'TuXDevelop';
                bateriaMarca = 'LTH';
                llantasMarca = 'Tornel';
                llantasMedida = 'R16';
                llantasCantidad = 4;
                barraGas = '25%';
                carga = 'Por definir';
                observaciones = 'Sin observaciones';
                document.getElementById('inlineRadioAsistencia').checked = "cheked",
                    document.getElementById('llavesNo').checked = "cheked",
                    //TABLA1
                    document.getElementById('bienDefensa').checked = "cheked",
                    document.getElementById('bienCarroceria').checked = "cheked",
                    document.getElementById('bienParrilla').checked = "cheked",
                    document.getElementById('bienCofre').checked = "cheked",
                    document.getElementById('bienFaros').checked = "cheked",
                    document.getElementById('bienParabrisas').checked = "cheked",
                    document.getElementById('malLimpiadores').checked = "cheked",
                    document.getElementById('malEmblemas').checked = "cheked",
                    document.getElementById('bienPortezuelaIzq').checked = "cheked",
                    document.getElementById('bienCristalLatIzq').checked = "cheked",
                    document.getElementById('bienMedallon').checked = "cheked",
                    document.getElementById('bienCajuela').checked = "cheked",
                    document.getElementById('bienDefensaTras').checked = "cheked",
                    document.getElementById('bienPortezuelaDer').checked = "cheked",
                    document.getElementById('malCristalLatDer').checked = "cheked",
                    document.getElementById('bienAntenas').checked = "cheked",
                    document.getElementById('malEspejos').checked = "cheked",
                    document.getElementById('noTaponesRuedas').checked = "cheked",
                    document.getElementById('noTaponGas').checked = "cheked",
                    document.getElementById('noSalpicaderaDer').checked = "cheked",
                    document.getElementById('noSalpicaderaIzq').checked = "cheked",
                    //Tabla2    
                    document.getElementById('bienTablero').checked = "cheked",
                    document.getElementById('bienVolante').checked = "cheked",
                    document.getElementById('noRadio').checked = "cheked",
                    document.getElementById('noEqpSonido').checked = "cheked",
                    document.getElementById('noEncendedor').checked = "cheked",
                    document.getElementById('malEspejo').checked = "cheked",
                    document.getElementById('bienAsientos').checked = "cheked",
                    document.getElementById('noTptAlfombra').checked = "cheked",
                    document.getElementById('bienTptHule').checked = "cheked",
                    document.getElementById('bienExtintor').checked = "cheked",
                    document.getElementById('bienGato').checked = "cheked",
                    document.getElementById('noTriangulo').checked = "cheked",
                    document.getElementById('noBocinas').checked = "cheked",
                    document.getElementById('bienLuces').checked = "cheked",
                    document.getElementById('bienTag').checked = "cheked",
                    document.getElementById('bienVial').checked = "cheked",
                    document.getElementById('noSimcard').checked = "cheked",
                    document.getElementById('bienRadiador').checked = "cheked",
                    document.getElementById('bienMotoventilador').checked = "cheked",
                    document.getElementById('malAlternador').checked = "cheked",
                    document.getElementById('bienCableBujias').checked = "cheked",
                    document.getElementById('noDepurador').checked = "cheked",
                    document.getElementById('malCarburador').checked = "cheked",
                    document.getElementById('bienFiltroAceite').checked = "cheked",
                    document.getElementById('bienInyectores').checked = "cheked",
                    document.getElementById('bienCompresor').checked = "cheked",
                    document.getElementById('noComputadora').checked = "cheked",
                    document.getElementById('bienBateria').checked = "cheked";

                break;

            case 'folio=002':
                folio2 = '002';
                fecha = '19/01/2020';
                hora = '15:00';
                direccion = 'Rafael Lucio';
                vehiculo = 'Volvo';
                tipo = 'V60';
                modelo = '2019';
                color = 'Negro';
                placas = 'YXSl1';
                serie = '78463';
                propietario = 'Rita Ramos Benitez';
                tel = 2283784569;
                grua = '020MRD';
                operador = 'Roboerto Rodriguez';
                solicitante = 'El Molino';
                bateriaMarca = 'Duralast';
                llantasMarca = 'Goodyear';
                llantasMedida = 'R15';
                llantasCantidad = 4;
                barraGas = '85%';
                carga = 'No definida';
                observaciones = 'Sin observaciones';
                document.getElementById('inlineRadioSiniestro').checked = "cheked",
                    document.getElementById('llavesSi').checked = "cheked",
                    //TABLA1
                    document.getElementById('bienDefensa').checked = "cheked",
                    document.getElementById('bienCarroceria').checked = "cheked",
                    document.getElementById('bienParrilla').checked = "cheked",
                    document.getElementById('malCofre').checked = "cheked",
                    document.getElementById('malFaros').checked = "cheked",
                    document.getElementById('bienParabrisas').checked = "cheked",
                    document.getElementById('malLimpiadores').checked = "cheked",
                    document.getElementById('malEmblemas').checked = "cheked",
                    document.getElementById('bienPortezuelaIzq').checked = "cheked",
                    document.getElementById('bienCristalLatIzq').checked = "cheked",
                    document.getElementById('bienMedallon').checked = "cheked",
                    document.getElementById('bienCajuela').checked = "cheked",
                    document.getElementById('bienDefensaTras').checked = "cheked",
                    document.getElementById('malPortezuelaDer').checked = "cheked",
                    document.getElementById('malCristalLatDer').checked = "cheked",
                    document.getElementById('bienAntenas').checked = "cheked",
                    document.getElementById('malEspejos').checked = "cheked",
                    document.getElementById('noTaponesRuedas').checked = "cheked",
                    document.getElementById('noTaponGas').checked = "cheked",
                    document.getElementById('noSalpicaderaDer').checked = "cheked",
                    document.getElementById('noSalpicaderaIzq').checked = "cheked",
                    //Tabla2    
                    document.getElementById('malTablero').checked = "cheked",
                    document.getElementById('bienVolante').checked = "cheked",
                    document.getElementById('noRadio').checked = "cheked",
                    document.getElementById('noEqpSonido').checked = "cheked",
                    document.getElementById('noEncendedor').checked = "cheked",
                    document.getElementById('malEspejo').checked = "cheked",
                    document.getElementById('bienAsientos').checked = "cheked",
                    document.getElementById('noTptAlfombra').checked = "cheked",
                    document.getElementById('malTptHule').checked = "cheked",
                    document.getElementById('bienExtintor').checked = "cheked",
                    document.getElementById('bienGato').checked = "cheked",
                    document.getElementById('noTriangulo').checked = "cheked",
                    document.getElementById('noBocinas').checked = "cheked",
                    document.getElementById('malLuces').checked = "cheked",
                    document.getElementById('bienTag').checked = "cheked",
                    document.getElementById('bienVial').checked = "cheked",
                    document.getElementById('noSimcard').checked = "cheked",
                    document.getElementById('bienRadiador').checked = "cheked",
                    document.getElementById('bienMotoventilador').checked = "cheked",
                    document.getElementById('malAlternador').checked = "cheked",
                    document.getElementById('bienCableBujias').checked = "cheked",
                    document.getElementById('noDepurador').checked = "cheked",
                    document.getElementById('malCarburador').checked = "cheked",
                    document.getElementById('malFiltroAceite').checked = "cheked",
                    document.getElementById('bienInyectores').checked = "cheked",
                    document.getElementById('bienCompresor').checked = "cheked",
                    document.getElementById('bienComputadora').checked = "cheked",
                    document.getElementById('malBateria').checked = "cheked";
                break;

        }
        document.getElementById('Folio').value = folio2,
            document.getElementById('Fecha').value = fecha,
            document.getElementById('Hora').value = hora,
            document.getElementById('Direccion').value = direccion,
            //RadioButtons Motivo de inventario  

            document.getElementById('staticVehiculo').value = vehiculo,
            document.getElementById('staticTipo').value = tipo,
            document.getElementById('staticModelo').value = modelo,
            document.getElementById('staticColor').value = color,
            document.getElementById('staticPlacas').value = placas,
            document.getElementById('staticSerie').value = serie,
            document.getElementById('staticPropietario').value = propietario,

            document.getElementById('staticTel').value = tel,
            document.getElementById('staticGrua').value = grua,
            document.getElementById('staticClave').value = operador,
            document.getElementById('staticSolicitante').value = solicitante,

            document.getElementById('bateriaMarca').value = bateriaMarca,
            document.getElementById('llantasMarca').value = llantasMarca,
            document.getElementById('llantasMedida').value = llantasMedida,
            document.getElementById('llantasCantidad').value = llantasCantidad,
            document.getElementById('barraGas').style.width = barraGas,
            document.getElementById('staticCarga').value = carga,
            document.getElementById('staticObservaciones').value = observaciones;


    }
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>