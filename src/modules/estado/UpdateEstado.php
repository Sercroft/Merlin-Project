<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->put('/estados/{id}', function (Request $request, Response $response, $args) {

    $codigo = $request->getAttribute('id');

    $data = json_decode($request->getBody(), true);
    $nombre = $data['nombre'];

    $mapParam = new \Ds\Map();
    $mapParam->put(":nombre",$nombre);


    $sql = "UPDATE estado SET nombre=:nombre WHERE codigo=$codigo;";

    try {
        DBUtils::update($sql, $mapParam->toArray());
        $data = null;

        $response->getBody()->write(json_encode('El estado se actualizó exitosamente.'));
        return $response;
        
    } catch (PDOException $error) {
        $response->getBody()->write('{"error": {"text":' . $error->getMessage() . ' }}');
        return $response;
    }
});
