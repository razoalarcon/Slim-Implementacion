<?php

/**
 ******************************************************
 * @file index.php
 * @brief Archivo main de todo el proyecto
 * Aqui se tendra el acceso a las API´s expuestas para poder hacer las consultas a la BD
 * @author Miguel Alarcon
 * @version 1.0
 * @date Agosto 2020
 *******************************************************/

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
//use Slim\Exception\NotFoundException;
use Slim\Factory\AppFactory;
use Slim\Routing\RouteCollectorProxy;
use Slim\Views\PhpRenderer;
//use App\config\bd;

require __DIR__ . '/../vendor/autoload.php';

$app = AppFactory::create();
$app->addRoutingMiddleware();
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

/** @param $app define el inicio de la api
 *  @param $renderer accede a los templates que tendran las vistas
 */
$app->get('/', function (Request $request, Response $response, $args) {
    $renderer = new PhpRenderer(__DIR__ . './../src/templates');
    return $renderer->render($response, "home.php", $args);
});
/**  */
$app->group('/farmacias', function (RouteCollectorProxy $group) {

    $group->get('/tipo/farmatodo', function (Request $request, Response $response, $args) {
        $renderer = new PhpRenderer(__DIR__ . './../src/templates');
        return $renderer->render($response, "farmacias.php", $args);
    });
    //TODO: Vista para detalle de farmacia
    //    $group->get('/detalle', function (Request $request, Response $response, $args) {
    //        $renderer = new PhpRenderer(__DIR__ . './../src/templates');
    //        return $renderer->render($response, "farmacia_d.php", $args);
    //    });
});


/** @param group
 *  define un grupo de rutas para toda la informacion relacionada con farmacia 
 *  @param $registros contiene toda la data de la consulta y acceso a la BD
 *  @param response tiene el body de la consulta 
 *  @return response con los datos en formato JSON*/
$app->group('/api', function (RouteCollectorProxy $group) {

    $group->get('/farmacias', function (Request $request, Response $response, $args) {
        $db = new App\config\bd();
        $sql = "SELECT * FROM farmacia ";
        $registros = $db->run($sql);

        if ($registros->rowCount() > 0) {
            $payload = json_encode($registros->fetchAll());
            $code = 200;
        } else {
            $payload = json_encode(["msg" => "No existen registros"]);
            $code = 202;
        }
        // $payload = json_encode($registros->fetchAll());
        $response->getBody()->write($payload);
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus($code);
    });

    $group->get('/detalle', function (Request $request, Response $response, $args) {
        $db = new App\config\bd();
        $sql = "SELECT * FROM detalle_farmacia WHERE id_farmacia = ?";
        $registros = $db->run($sql, [1]);

        if ($registros->rowCount() > 0) {
            $payload = json_encode($registros->fetchAll());
            $code = 200;
        } else {
            $payload = json_encode(["msg" => "No existen registros"]);
            $code = 202;
        }
        $response->getBody()->write($payload);
        return $response
            ->withHeader('content-type', 'application/json')
            ->withStatus($code);
    });
});
$app->run();
