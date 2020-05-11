<?php

use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$container = new Container();
$container->set('upload_directory', __DIR__ . '/uploads');
AppFactory::setContainer($container);

$app = AppFactory::create();
$app->setBasePath("/mrd/public");



//Get Todos los clientes
$app->get('/api/hello/world', function (Request $request, Response $response, array $args) {
    // TODO: Validar datos de enntrada
    // TODO: Validar parametros

    $sql = "SELECT * FROM  usuarios";
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->query($sql);

        if ($resultado->rowCount() > 0) {
            $clientes = $resultado->fetchAll();
            //echo json_encode($clientes);
        } else {
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al generar folio ->" . $e->getMessage(), 400));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }

    $response->getBody()->write(json_encode($clientes));
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(200);
});

// *##################################################################### //
// * http-> Get proporciona los reportes en la fecha proporcionada
// *##################################################################### //
$app->get('/api/reporte/{fecha}/{region}', function (Request $request, Response $response, array $args) {

    $region = $args['region'];
    $fecha = $args['fecha'];
    $reportes = array(); //Variables para contener los reportes

    //? Obtiene los reportes por fecha
    $sql = "SELECT * FROM $region WHERE DATE(Fecha) = :fecha";
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':fecha', $fecha);
        $resultado->execute();
        if ($resultado->rowCount() > 0) {
            //* Si existen reportes estan en $reportes
            $reportes = $resultado->fetchAll();
            //* Por cada reporte en el array agregamos la informacion del ticket
            foreach ($reportes as $i => $v) {
                //* Generamos la peticion para la informacion del ticket
                $_tabla = "folio_$region";
                $sql = "SELECT * FROM $_tabla WHERE Folio=:folio";
                $_folio = $reportes[$i]['Folio'];
                try {
                    $db = new db();
                    $db = $db->connectDB();
                    $resultado = $db->prepare($sql);
                    $resultado->bindParam(':folio', $_folio);
                    $resultado->execute();
                    if ($resultado->rowCount() > 0) {
                        $ticket = $resultado->fetchAll();
                        //* Informacion del ticket
                        $reportes[$i]['Ticket'] = $ticket;
                    } else {
                        //No hay reportes en esta fecha
                    }
                } catch (PDOException $e) {
                }
                //TODO continuar aqui
            }

            $response->getBody()->write(json_encode($reportes));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } else {
            //No hay reportes en esta fecha
            $response->getBody()->write(response(true, "No hay reportes en esta fecha", 202));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al buscar fecha " . $e->getMessage() . $sql, 400));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }
});

// *##################################################################### //
// * http-> Get proporciona los reportes entre 2 fechas 
// *##################################################################### //
$app->get('/api/reporte/{fecha1}/{fecha2}/{region}', function (Request $request, Response $response, array $args) {

    $region = $args['region'];
    $fechaInicio = $args['fecha1'];
    $fechaFinal = $args['fecha2'];
    $sql = "SELECT * FROM $region WHERE Fecha BETWEEN :fechaInicial AND :fechaFinal";

    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':fechaInicial', $fechaInicio);
        $resultado->bindParam(':fechaFinal', $fechaFinal);
        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            //*Si existen reportes se guardan en $reportes
            $reportes = $resultado->fetchAll(PDO::FETCH_ASSOC);
            //* Por cada reporte en el array agregamos la informacion del ticket
            foreach ($reportes as $i => $v) {
                //* Generamos la peticion para la informacion del ticket
                $_tabla = "folio_$region";
                $sql = "SELECT * FROM $_tabla WHERE Folio=:folio";
                $_folio = $reportes[$i]['Folio'];
                try {
                    $db = new db();
                    $db = $db->connectDB();
                    $resultado = $db->prepare($sql);
                    $resultado->bindParam(':folio', $_folio);
                    $resultado->execute();
                    if ($resultado->rowCount() > 0) {
                        $ticket = $resultado->fetchAll();
                        //* Informacion del ticket
                        $reportes[$i]['Ticket'] = $ticket;
                    } else {
                        //No hay reportes en esta fecha
                    }
                } catch (PDOException $e) {
                    $response->getBody()->write(response(true, "Error al buscar fecha " . $e->getMessage() . $sql, 400));
                    return $response
                        ->withHeader('Content-Type', 'application/json')
                        ->withStatus(400);
                }
            }
            $response->getBody()->write(json_encode($reportes));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } else {
            //No hay reportes en esta fecha
            $response->getBody()->write(response(true, "No hay reportes en esta fecha", 202));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al buscar fecha " . $e->getMessage() . $sql, 400));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }
});

//Get proporciona los reportes ingresados segun el folio proporcionado
$app->get('/api/buscar/{folio}/{region}', function (Request $request, Response $response, array $args) {

    $region = $args['region'];
    $folio = $args['folio'];
    $sql = "SELECT * FROM $region WHERE Folio = :folio";
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':folio', $folio);
        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $reportes = $resultado->fetchAll();

            $response->getBody()->write(json_encode($reportes));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } else {
            //No hay reportes en esta fecha
            $response->getBody()->write(response(true, "No hay reportes con este folio: " . $folio, 202));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al buscar fecha " . $e->getMessage() . $sql, 400));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }
});


//Generacion de folio
$app->get('/api/folio/{region}', function (Request $request, Response $response, array $args) {
    //Recojemos el argumento pasado
    $data = $args['region'];
    //Verificamos que corresponda a una region definida
    //Para crear el folio en la db requerida

    $tabla = "";

    switch ($data) {
        case "Coatepec":
            $tabla = "`folio_coatepec`";
            break;
        case "Cordoba":
            $tabla = "`folio_cordoba`";
            break;
        case "Coatzacoalcos":
            $tabla = "`folio_coatzacoalcos`";
            break;
        case "Minatitlan":
            $tabla = "`folio_minatitlan`";
            break;
        case "Puebla":
            $tabla = "`folio_puebla`";
            break;
        case "Poza Rica":
            $tabla = "`folio_poza_rica`";
            break;
        case "Veracruz":
            $tabla = "`folio_veracruz`";
            break;
        case "Xalapa":
            $tabla = "`folio_xalapa`";
            break;
        default:
            $response->getBody()->write(response(true, "Error en el parametro", 400));
            return $response
                ->withHeader('Content-Type', 'application/json; charset = utf-8')
                ->withStatus(400);
            break;
    }

    //Generamos la consulta, Obtenemos el ultimo Folio
    $sql = "SELECT id, Prefijo FROM " . $tabla . " ORDER BY id DESC LIMIT 1 ";
    $newFolio = "";

    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->query($sql);


        if ($resultado->rowCount() > 0) {

            //Ultimo folio
            $ultimoFolio = $resultado->fetch(PDO::FETCH_ASSOC);

            //Aumentamos el folio en 1
            $ultimoFolio['id'] = $ultimoFolio['id'] + 1;
            $newFolio = $ultimoFolio['Prefijo'] . $ultimoFolio['id'];
        } else {
            $response->getBody()->write(response(true, "Error al generar folio", 401));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(401);
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al generar folio :" . $e->getMessage(), 401));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(401);
    }

    //Creamos el folio nuevo
    $sql = "INSERT INTO $tabla (`Folio`) VALUES('$newFolio')";

    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->query($sql);

        $resultado = null;
        $db = null;

        $response->getBody()->write(response(false, $newFolio, 201));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(201);
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al generar folio :" . $e->getMessage(), 401));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(401);
    }
});


//Routa POST
$app->post('/api/reporte', function (Request $request, Response $response, array $args) {
    //Verificamos los datos de entrada
    $data = verifyRequiredParams(array(
        'Region', 'Folio', 'Fecha', 'Direccion', 'MotivoInventario', 'VahiculoMarca', 'Tipo',
        'Modelo', 'Color', 'Placas', 'NoSerie', 'NombreConductor', 'Llaves', 'Telefono', 'Grua', 'ClaveOperador',
        'Solicitante', 'DefensaDelantera', 'CarroceriaSinGolpes', 'Parrilla', 'Faros', 'Cofre', 'Parabrisas',
        'Limpiadores', 'Emblemas', 'PortezuelaIzq', 'CristalLatIzq', 'Medallon', 'Cajuela', 'DefensaTrasera',
        'PortezuelaDer', 'CristalLatDer', 'Antenas', 'Espejos', 'TaponesRuedas', 'TaponGasolina', 'SalpicaderaDer',
        'SalpicaderaIzq', 'Tablero', 'Volante', 'Radio', 'EquipoSonido', 'Encendedor', 'Espejo', 'Asientos',
        'TapetesAlfombra', 'TapetesHule', 'Extintor', 'GatoYManeral', 'TrianguloDeSeguridad', 'Bocinas', 'Luces',
        'Tag', 'VialPass', 'SimCard', 'Radiador', 'Motoventilador', 'Alternador', 'CableDeBujias', 'Depurador',
        'Carburador', 'FiltroAire', 'Inyectores', 'Compresor', 'Computadora', 'Bateria', 'MarcaMotor', 'MarcaLlantas',
        'MedidaLlantas', 'CantidadLlantas', 'TanqueGasolina', 'CargaConsistente', 'Observaciones', 'NombreEntrega',
        'NombreDeOficial', 'NombreOperador'
    ), $request);

    $payload = json_encode($data);

    if ($data["error"]) {
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }


    //Peticion SQL
    $body = $request->getBody();
    $data = json_decode($body, true);

    $sql = "INSERT INTO " . $data['Region'] . " (`Folio`,`Fecha`,`Direccion`,`MotivoInventario`,`VahiculoMarca`,`Tipo`,`Modelo`,`Color`,`Placas`,`NoSerie`,`NombreConductor`,`Llaves`,`Telefono`,`Grua`,`ClaveOperador`,`Solicitante`,`DefensaDelantera`,`CarroceriaSinGolpes`,`Parrilla`,`Faros`,`Cofre`,`Parabrisas`,`Limpiadores`,`Emblemas`,`PortezuelaIzq`,`CristalLatIzq`,`Medallon`,`Cajuela`,`DefensaTrasera`,`PortezuelaDer`,`CristalLatDer`,`Antenas`,`Espejos`,`TaponesRuedas`,`TaponGasolina`,`SalpicaderaDer`,`SalpicaderaIzq`,`Tablero`,`Volante`,`Radio`,`EquipoSonido`,`Encendedor`,`Espejo`,`Asientos`,`TapetesAlfombra`,`TapetesHule`,`Extintor`,`GatoYManeral`,`TrianguloDeSeguridad`,`Bocinas`,`Luces`,`Tag`,`VialPass`,`SimCard`,`Radiador`,`Motoventilador`,`Alternador`,`CableDeBujias`,`Depurador`,`Carburador`,`FiltroAire`,`Inyectores`,`Compresor`,`Computadora`,`Bateria`,`MarcaMotor`,`MarcaLlantas`,`MedidaLlantas`,`CantidadLlantas`,`TanqueGasolina`,`CargaConsistente`,`Observaciones`,`NombreEntrega`,`NombreDeOficial`,`NombreOperador`) VALUES
    (:Folio,:Fecha,:Direccion,:MotivoInventario,:VahiculoMarca,:Tipo,:Modelo,:Color,:Placas,:NoSerie,:NombreConductor,:Llaves,:Telefono,:Grua,:ClaveOperador,:Solicitante,:DefensaDelantera,:CarroceriaSinGolpes,:Parrilla,:Faros,:Cofre,:Parabrisas,:Limpiadores,:Emblemas,:PortezuelaIzq,:CristalLatIzq,:Medallon,:Cajuela,:DefensaTrasera,:PortezuelaDer,:CristalLatDer,:Antenas,:Espejos,:TaponesRuedas,:TaponGasolina,:SalpicaderaDer,:SalpicaderaIzq,:Tablero,:Volante,:Radio,:EquipoSonido,:Encendedor,:Espejo,:Asientos,:TapetesAlfombra,:TapetesHule,:Extintor,:GatoYManeral,:TrianguloDeSeguridad,:Bocinas,:Luces,:Tag,:VialPass,:SimCard,:Radiador,:Motoventilador,:Alternador,:CableDeBujias,:Depurador,:Carburador,:FiltroAire,:Inyectores,:Compresor,:Computadora,:Bateria,:MarcaMotor,:MarcaLlantas,:MedidaLlantas,:CantidadLlantas,:TanqueGasolina,:CargaConsistente,:Observaciones,:NombreEntrega,:NombreDeOficial,:NombreOperador)";

    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);

        $resultado->bindParam('Folio', $data["Folio"]);
        $resultado->bindParam('Fecha', $data["Fecha"]);
        $resultado->bindParam('Direccion', $data["Direccion"]);
        $resultado->bindParam('MotivoInventario',  $data["MotivoInventario"]);
        $resultado->bindParam('VahiculoMarca', $data["VahiculoMarca"]);
        $resultado->bindParam('Tipo', $data["Tipo"]);
        $resultado->bindParam('Modelo', $data["Modelo"]);
        $resultado->bindParam('Color', $data["Color"]);
        $resultado->bindParam('Placas', $data["Placas"]);
        $resultado->bindParam('NoSerie', $data["NoSerie"]);
        $resultado->bindParam('NombreConductor', $data["NombreConductor"]);
        $resultado->bindParam('Llaves', $data["Llaves"]);
        $resultado->bindParam('Telefono', $data["Telefono"]);
        $resultado->bindParam('Grua', $data["Grua"]);
        $resultado->bindParam('ClaveOperador', $data["ClaveOperador"]);
        $resultado->bindParam('Solicitante', $data["Solicitante"]);
        $resultado->bindParam('DefensaDelantera', $data["DefensaDelantera"]);
        $resultado->bindParam('CarroceriaSinGolpes', $data["CarroceriaSinGolpes"]);
        $resultado->bindParam('Parrilla', $data["Parrilla"]);
        $resultado->bindParam('Faros', $data["Faros"]);
        $resultado->bindParam('Cofre', $data["Cofre"]);
        $resultado->bindParam('Parabrisas', $data["Parabrisas"]);
        $resultado->bindParam('Limpiadores', $data["Limpiadores"]);
        $resultado->bindParam('Emblemas', $data["Emblemas"]);
        $resultado->bindParam('PortezuelaIzq', $data["PortezuelaIzq"]);
        $resultado->bindParam('CristalLatIzq', $data["CristalLatIzq"]);
        $resultado->bindParam('Medallon', $data["Medallon"]);
        $resultado->bindParam('Cajuela', $data["Cajuela"]);
        $resultado->bindParam('DefensaTrasera', $data["DefensaTrasera"]);
        $resultado->bindParam('PortezuelaDer', $data["PortezuelaDer"]);
        $resultado->bindParam('CristalLatDer', $data["CristalLatDer"]);
        $resultado->bindParam('Antenas', $data["Antenas"]);
        $resultado->bindParam('Espejos', $data["Espejos"]);
        $resultado->bindParam('TaponesRuedas', $data["TaponesRuedas"]);
        $resultado->bindParam('TaponGasolina', $data["TaponGasolina"]);
        $resultado->bindParam('SalpicaderaDer', $data["SalpicaderaDer"]);
        $resultado->bindParam('SalpicaderaIzq', $data["SalpicaderaIzq"]);
        $resultado->bindParam('Tablero', $data["Tablero"]);
        $resultado->bindParam('Volante', $data["Volante"]);
        $resultado->bindParam('Radio', $data["Radio"]);
        $resultado->bindParam('EquipoSonido', $data["EquipoSonido"]);
        $resultado->bindParam('Encendedor', $data["Encendedor"]);
        $resultado->bindParam('Espejo', $data["Espejo"]);
        $resultado->bindParam('Asientos', $data["Asientos"]);
        $resultado->bindParam('TapetesAlfombra', $data["TapetesAlfombra"]);
        $resultado->bindParam('TapetesHule', $data["TapetesHule"]);
        $resultado->bindParam('Extintor', $data["Extintor"]);
        $resultado->bindParam('GatoYManeral', $data["GatoYManeral"]);
        $resultado->bindParam('TrianguloDeSeguridad', $data["TrianguloDeSeguridad"]);
        $resultado->bindParam('Bocinas', $data["Bocinas"]);
        $resultado->bindParam('Luces', $data["Luces"]);
        $resultado->bindParam('Tag', $data["Tag"]);
        $resultado->bindParam('VialPass', $data["VialPass"]);
        $resultado->bindParam('SimCard', $data["SimCard"]);
        $resultado->bindParam('Radiador', $data["Radiador"]);
        $resultado->bindParam('Motoventilador', $data["Motoventilador"]);
        $resultado->bindParam('Alternador', $data["Alternador"]);
        $resultado->bindParam('CableDeBujias', $data["CableDeBujias"]);
        $resultado->bindParam('Depurador', $data["Depurador"]);
        $resultado->bindParam('Carburador', $data["Carburador"]);
        $resultado->bindParam('FiltroAire', $data["FiltroAire"]);
        $resultado->bindParam('Inyectores', $data["Inyectores"]);
        $resultado->bindParam('Compresor', $data["Compresor"]);
        $resultado->bindParam('Computadora', $data["Computadora"]);
        $resultado->bindParam('Bateria', $data["Bateria"]);
        $resultado->bindParam('MarcaMotor', $data["MarcaMotor"]);
        $resultado->bindParam('MarcaLlantas', $data["MarcaLlantas"]);
        $resultado->bindParam('MedidaLlantas', $data["MedidaLlantas"]);
        $resultado->bindParam('CantidadLlantas', $data["CantidadLlantas"]);
        $resultado->bindParam('TanqueGasolina', $data["TanqueGasolina"]);
        $resultado->bindParam('CargaConsistente', $data["CargaConsistente"]);
        $resultado->bindParam('Observaciones', $data["Observaciones"]);
        $resultado->bindParam('NombreEntrega', $data["NombreEntrega"]);
        $resultado->bindParam('NombreDeOficial', $data["NombreDeOficial"]);
        $resultado->bindParam('NombreOperador', $data["NombreOperador"]);

        $resultado->execute();
    } catch (PDOException $e) {
        $error = array();
        $error["error"] = true;
        $error["msg"] = $e->getMessage();
        $error_json = json_encode($error);

        $response->getBody()->write($error_json);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(401);
    }

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});


//Manejo de imagenes
$app->post('/api/upload', function (Request $request, Response $response) {
    $directory = $this->get('upload_directory');

    $uploadedFiles = $request->getUploadedFiles();
    // handle single input with single file upload
    $uploadedFile = $uploadedFiles['example1'];
    if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
        $filename = moveUploadedFile($directory, $uploadedFile);
        //$response->write('uploaded ' . $filename . '<br/>');
    } else {
        return $response
            ->withStatus(400);
    }

    return $response
        ->withStatus(201);
});


//Manejo de imagenes
$app->post('/api/multiupload/{folio}/{region}', function (Request $request, Response $response, array $args) {
    $directory = $this->get('upload_directory');
    $data = $args['folio'];
    $tabla = $args['region'];
    $fileNames = array(1 => "", 2 => "", 3 => "", 3 => "");
    $i = 1;
    $uploadedFiles = $request->getUploadedFiles();
    // handle multiple inputs with the same key
    foreach ($uploadedFiles['example2'] as $uploadedFile) {
        if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
            $fileNames[$i] = moveUploadedFile($directory, $uploadedFile);
            //$response->write('uploaded ' . $filename . '<br/>');
            $i++;
        } else {
            return $response
                ->withStatus(400);
        }
    }

    //Realizamos la peticion sql

    $sql = "UPDATE `$tabla` SET `img1` = '$fileNames[1]', `img2` = '$fileNames[2]', `img3` = '$fileNames[3]', `img4` = '$fileNames[4]' WHERE `Folio` = '$data' ";

    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->query($sql);
        //echo $resultado->rowCount();

        if ($resultado->rowCount() > 0) {

            $response->getBody()->write(response(false, "Filas afectadas: " . $resultado->rowCount(), 201));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
        } else {
            $response->getBody()->write(response(true, "Filas Afectadas: " . $resultado->rowCount() . ". Los nombres de archivo ya existen", 200));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al actualizar la tabla :" . $e->getMessage(), 401));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(401);
    }
});


//+ Regresa los ususarios segun la region
$app->get('/api/user/{region}', function (Request $request, Response $response, array $args) {
    $region = $args['region'];
    $sql = 'SELECT id, user, nombre, rol_id, region FROM usuarios WHERE region = :region';
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':region', $region);
        $resultado->execute();
        if ($resultado->rowCount() > 0) {
            $usuarios = $resultado->fetchAll();
            $response->getBody()->write(json_encode($usuarios));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        } else {
            //No hay usuarios en esta region
            $response->getBody()->write(response(true, "No hay usuarios en esta region: ", 204));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al buscar " . $e->getMessage() . $sql, 400));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }
});


// Actualiza el usuario
$app->post('/api/user/update', function (Request $request, Response $response, array $args) {

    $data = verifyRequiredParams(array('id', 'nombre', 'region', 'rol', 'user'), $request);
    $payload = json_encode($data);

    if ($data["error"]) {
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }
    //Peticion SQL
    $body = $request->getBody();
    $data = json_decode($body, true);
    $rol = 0;

    if ($data['rol'] ==  "user") {
        switch ($data['region']) {
            case 'xalapa':
                $rol = 2;
                break;

            case 'coatepec':
                $rol = 3;
                break;

            case 'orizaba':
                $rol = 4;
                break;

            case 'cordoba':
                $rol = 5;
                break;

            case 'puebla':
                $rol = 6;
                break;

            case 'poza_rica':
                $rol = 7;
                break;

            case 'veracruz':
                $rol = 8;
                break;

            case 'coatzacoalcos':
                $rol = 9;
                break;

            case 'minatitlan':
                $rol = 10;
                break;

            default:
                # code...
                break;
        }
    } else if ($data['rol'] ==  "admin") {
        $rol = 1;
    }

    $sql = "UPDATE usuarios SET user=:user, nombre=:nombre, rol_id=:rol, region=:region WHERE id=:id";

    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':user', $data['user']);
        $resultado->bindParam(':nombre', $data['nombre']);
        $resultado->bindParam(':rol', $rol);
        $resultado->bindParam(':region', $data['region']);
        $resultado->bindParam(':id', $data['id']);
        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $response->getBody()->write(response(false, "Filas afectadas: " . $resultado->rowCount(), 201));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
        } else {
            $response->getBody()->write(response(true, "Filas Afectadas: " . $resultado->rowCount() . ". Los nombres de archivo ya existen", 200));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al actualizar la tabla :" . $e->getMessage(), 401));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(401);
    }

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});


//Funcion para nuevo usuario
$app->post('/api/user/new', function (Request $request, Response $response, array $args) {
    $data = verifyRequiredParams(array('nombre', 'pass', 'region', 'user'), $request);
    $payload = json_encode($data);

    if ($data["error"]) {
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }
    //Peticion SQL
    $body = $request->getBody();
    $data = json_decode($body, true);
    $rol = 0;
    $password = password_hash($data['pass'], PASSWORD_DEFAULT);
    //Dterminar rol
    switch ($data['region']) {
        case 'admin':
            $rol = 1;
            break;

        case 'xalapa':
            $rol = 2;
            break;

        case 'coatepec':
            $rol = 3;
            break;

        case 'orizaba':
            $rol = 4;
            break;

        case 'cordoba':
            $rol = 5;
            break;

        case 'puebla':
            $rol = 6;
            break;

        case 'poza_rica':
            $rol = 7;
            break;

        case 'veracruz':
            $rol = 8;
            break;

        case 'coatzacoalcos':
            $rol = 9;
            break;

        case 'minatitlan':
            $rol = 10;
            break;

        case 'orizaba':
            $rol = 11;
            break;

        default:
            $response->getBody()->write(response(true, "Error, region inexistente Region->" . $data['region'], 400));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(400);
            break;
    }

    $sql = "INSERT INTO usuarios (user, pass, nombre, rol_id, region) VALUES(:user, :pass, :nombre, :rol, :region)";

    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':user', $data['user']);
        $resultado->bindParam(':pass', $password); //
        $resultado->bindParam(':nombre', $data['nombre']);
        $resultado->bindParam(':rol', $rol);
        $resultado->bindParam(':region', $data['region']);
        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $response->getBody()->write(response(false, "Filas afectadas: " . $resultado->rowCount(), 201));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
        } else {
            $response->getBody()->write(response(true, "Filas Afectadas: " . $resultado->rowCount() . ". Los nombres de archivo ya existen", 200));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al actualizar la tabla :" . $e->getMessage(), 401));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(401);
    }
    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});


//Borrar Usuario
$app->delete('/api/user', function (Request $request, Response $response, array $args) {
    $data = verifyRequiredParams(array('user', 'region'), $request);
    $payload = json_encode($data);
    if ($data["error"]) {
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }
    //Peticion SQL
    $body = $request->getBody();
    $data = json_decode($body, true);
    $sql = "DELETE FROM usuarios WHERE user=:user";
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':user', $data['user']);
        $resultado->execute();
        if ($resultado->rowCount() > 0) {
            $response->getBody()->write(response(false, "Usuario Borrado Exitosamente: ", 200));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
        } else {
            $response->getBody()->write(response(true, "No se ha podido borrar el usuario " . $data['user'] . " $sql", 200));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al actualizar la tabla :" . $e->getMessage(), 401));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(401);
    }

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});


$app->post('/api/user/editpsw', function (Request $request, Response $response, array $args) {
    $data = verifyRequiredParams(array('user', 'pass'), $request);
    $payload = json_encode($data);

    if ($data["error"]) {
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }

    //Peticion SQL
    $body = $request->getBody();
    $data = json_decode($body, true);
    $sql = "UPDATE usuarios SET pass=:pass WHERE user=:user";
    $password = password_hash($data['pass'], PASSWORD_DEFAULT);

    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':pass', $password);
        $resultado->bindParam(':user', $data['user']);
        $resultado->execute();

        if ($resultado->rowCount() > 0) {
            $response->getBody()->write(response(false, "Filas afectadas: " . $resultado->rowCount(), 201));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
        } else {
            $response->getBody()->write(response(true, "Filas Afectadas: " . $resultado->rowCount() . ". No se pudo cambiar el password", 200));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(200);
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al actualizar la tabla :" . $e->getMessage(), 401));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(401);
    }

    $response->getBody()->write($payload);
    return $response
        ->withHeader('Content-Type', 'application/json')
        ->withStatus(201);
});


// ?##################################################################### //
// ? http-> Post Servicio para cerrar el ticket
// ?##################################################################### //
$app->post('/api/ticket/close', function (Request $request, Response $response, array $args) {
    //* Parametrso requeridos en el JSON para procesar la solicitud
    $data = verifyRequiredParams(array(
        'Estado', 'FechaTicket', 'FechaArrastre', 'Folio', 'Placas', 'Marca', 'Tipo',
        'Color', 'IFE', 'Nombre', 'Importe', 'ImporteLetra', 'Concepto', 'Region'
    ), $request);
    //* Codificamos en JSON la respuesta si hay algun error
    $payload = json_encode($data);
    //* Si verifyRequiredParams(array(), $request) devolviio error
    //* Terminamos el proceso y devolvemos el error 
    if ($data["error"]) {
        $response->getBody()->write($payload);
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }
    //* Obtenemos el JSON de la request
    $body = $request->getBody();
    //* Decodificamos el JSON en un array
    $data = json_decode($body, true);
    //*Tabla a actualizar
    $tabla = "folio_" . $data['Region'];
    //* Consulta SQL

    //? Manejo de consecutivo
    //*Si elaumento del consecutivo ha fallado regresamos el error
    if (!aumentarConsecutivo($data)) {
        $response->getBody()->write(response(false, "Error al incrementar el consecutivo", 400));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    } //Continuamos

    //*Leemos el consecutivo
    $_consecutivo = leerConsecutivo($data);
    $consecutivo = $_consecutivo['0']['0'];

    if ($consecutivo == -1) {
        $response->getBody()->write(response(false, "Error al leer el consecutivo", 400));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(400);
    }

    $sql = "UPDATE $tabla SET Consecutivo=:consecutivo, Estado=true, FechaTicket=:fechaTicket, FechaArrastre=:fechaArrastre, Placas=:placas, Marca=:marca, Tipo=:tipo, Color=:color, IFE=:ife, Nombre=:nombre, Importe=:importe, ImporteLetra=:importeLetra, Concepto=:conceptp WHERE Folio=:folio";
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':consecutivo', $consecutivo);
        $resultado->bindParam(':fechaTicket', $data['FechaTicket']);
        $resultado->bindParam(':fechaArrastre', $data['FechaArrastre']);
        $resultado->bindParam(':placas', $data['Placas']);
        $resultado->bindParam(':marca', $data['Marca']);
        $resultado->bindParam(':tipo', $data['Tipo']);
        $resultado->bindParam(':color', $data['Color']);
        $resultado->bindParam(':ife', $data['IFE']);
        $resultado->bindParam(':nombre', $data['Nombre']);
        $resultado->bindParam(':importe', $data['Importe']);
        $resultado->bindParam(':importeLetra', $data['ImporteLetra']);
        $resultado->bindParam(':conceptp', $data['Concepto']);
        $resultado->bindParam(':folio', $data['Folio']);
        //*Ejecutamos la consulta
        $resultado->execute();
        //var_dump($consecutivo);

        if ($resultado->rowCount() > 0) {
            $response->getBody()->write(response(false, $consecutivo, 201));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(201);
        } else {
            $response->getBody()->write(response(true, "Filas Afectadas: " . $resultado->rowCount() . ". Los nombres de archivo ya existen", 200));
            return $response
                ->withHeader('Content-Type', 'application/json')
                ->withStatus(203);
        }
        $resultado = null;
        $db = null;
    } catch (PDOException $e) {
        $response->getBody()->write(response(true, "Error al actualizar la tabla :" . $e->getMessage(), 401));
        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus(401);
    }
});


// ?##################################################################### //
// ? Aumento del consecutivo del ticket
// ?##################################################################### //
function aumentarConsecutivo($data)
{
    $region = $data['Region'];
    $sql = "UPDATE consecutivo SET $region=$region+1 WHERE id='1'";
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->query($sql);

        if ($resultado->rowCount() > 0) {
            //Si hay resultados
            return 1;
        } else {
            return -1;
        }
    } catch (PDOException $e) {
        return -1;
    }
}

// ?##################################################################### //
// ? Aumento del consecutivo del ticket
// ?##################################################################### //
function leerConsecutivo($data)
{
    $region = $data['Region'];
    $sql = "SELECT $region FROM consecutivo WHERE id=1";
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->query($sql);
        if ($resultado->rowCount() > 0) {
            //Si hay resultados
            return $resultado->fetchAll();
        } else {
            return -1;
        }
    } catch (PDOException $e) {
        return -1;
    }
}

function getTicket($reportes, $folio, $sql)
{
    try {
        $db = new db();
        $db = $db->connectDB();
        $resultado = $db->prepare($sql);
        $resultado->bindParam(':folio', $reportes['0']['Folio']);
        $resultado->execute();
        if ($resultado->rowCount() > 0) {
            $ticket = $resultado->fetchAll();
            //* Informacion del ticket
            $reportes['0']['Ticket'] = $ticket;
        } else {
            //No hay reportes en esta fecha
        }
    } catch (PDOException $e) {
    }
}


/**
 * Verificando los parametros requeridos en el metodo o endpoint
 */

function verifyRequiredParams($required_fields, $request)
{
    $error = false;
    $error_fields = "";
    $request_params = array();
    $body = $request->getBody();
    $request_params = json_decode($body, true);

    // Handling PUT request params
    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }

    if ($error) {
        // Required field(s) are missing or empty
        // echo error json and stop the app
        $response_verify_params = array();
        $response_verify_params["error"] = true;
        $response_verify_params["msg"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
        $response_verify_params["code"] = 400;
        //$response_verify_params["data"] = $request_params;
        return $response_verify_params;
    } else {
        $response_verify_params = array();
        $response_verify_params["error"] = false;
        $response_verify_params["msg"] = "Reporte agregado correctamente";
        $response_verify_params["code"] = 201;
        return $response_verify_params;
    }
}


/**
 * Moves the uploaded file to the upload directory and assigns it a unique name
 * to avoid overwriting an existing uploaded file.
 *
 * @param string $directory directory to which the file is moved
 * @param UploadedFileInterface $uploaded file uploaded file to move
 * @return string filename of moved file
 */


function moveUploadedFile($directory,  $uploadedFile)
{
    $extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
    $name = pathinfo($uploadedFile->getClientFilename(), PATHINFO_FILENAME);
    //$basename = bin2hex(random_bytes(8)); // see http://php.net/manual/en/function.random-bytes.php
    //$filename = sprintf('%s.%0.8s', $basename, $extension);
    $filename = $name . "." . $extension;
    $uploadedFile->moveTo($directory . DIRECTORY_SEPARATOR . $filename);
    return $filename;
}


//Funcion para generar el json de la respuesta a la consulta
function response($error, $msg, $code)
{
    $_payload = array();
    $_payload['error'] = $error;
    $_payload['msg'] = $msg;
    $_payload['code'] = $code;

    return $_JS = json_encode($_payload);
}
