<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/estados', function (Request $request, Response $response, $args) {

    $data = json_decode($request->getBody(), true);
    $codigo = $data['codigo'];
    $nombre = $data['nombre'];

    $mapParam = new \Ds\Map();
    $mapParam->put(":codigo",$codigo);
    $mapParam->put(":nombre",$nombre);

    $sql = "INSERT INTO estado(codigo, nombre) VALUES (:codigo,:nombre);";

    try {
        DBUtils::insert($sql, $mapParam->toArray());

        $data = null;

        $response->getBody()->write(json_encode('El estado se creo exitosamente.'));
        return $response;

    } catch (PDOException $error) {
        $response->getBody()->write('{"error": {"text":' . $error->getMessage() . ' }}');
        return $response;
    }
});
