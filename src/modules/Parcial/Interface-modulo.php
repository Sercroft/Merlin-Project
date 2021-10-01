<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

require 'ModuloBacklog.php';
require 'ModuloUsuario.php';

$app->get('/menu', function (Request $request, Response $response, $args) {

    $getMenu = Get::getMenu();
    $response->getBody()->write(json_encode($getMenu));

    return $response;
});