<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/modulos', function (Request $request, Response $response, $args) {

    $sql = 'SELECT * FROM modulo';
    $data = DBUtils::select($sql);
    $response->getBody()->write(json_encode($data));

    return $response;
});