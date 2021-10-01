<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/estados', function (Request $request, Response $response, $args) {

    $sql = 'SELECT * FROM estado';
    $data = DBUtils::select($sql);
    $response->getBody()->write(json_encode($data));

    return $response;
});