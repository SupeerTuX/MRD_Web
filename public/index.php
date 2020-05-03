<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../src/config/db.php';

$app = AppFactory::create();
$app->setBasePath("/mrd/public");

//Ruta clientes
require __DIR__ . '/../src/rutas/clientes.php';


$app->run();