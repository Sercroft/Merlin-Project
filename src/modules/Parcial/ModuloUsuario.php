<?php
require_once 'Get.php';

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/usuario', function (Request $request, Response $response, $args) {

    $id = 1;
    $nombre_modulo = 'Pepito';
    $modulo_padre = 'Modulo1';
    $estado = 1;

    $getMenu = Get::getMenu();
    $getUsuario = Get::getUsuarios($id, $nombre_modulo, $modulo_padre, $estado);
    $getProyecto = Get::getProyectos();

    $response->getBody()->write(json_encode($getMenu));
    $response->getBody()->write(json_encode($getUsuario));
    $response->getBody()->write(json_encode($getProyecto));

    return $response;
});