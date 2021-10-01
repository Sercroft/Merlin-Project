<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->put('/modulos/{id}', function (Request $request, Response $response, $args) {

    $id = $request->getAttribute('id');

    $data = json_decode($request->getBody(), true);
    $nombre = $data['nombre'];
    $modulo_padre_id = $data['modulo_padre_id'];
    $estado = $data['estado'];

    $sql = "UPDATE modulo SET nombre=:nombre, modulo_padre_id=:modulo_padre_id, estado=:estado WHERE id=$id;";

    try {
        $db = new Db();

        $result = $db->getConnection()->prepare($sql);
        $result->bindParam(':nombre', $nombre);
        $result->bindParam(':modulo_padre_id', $modulo_padre_id);
        $result->bindParam(':estado', $estado);

        $result->execute();

        $data = null;
        $result = null;
        $db = null;

        $response->getBody()->write(json_encode('El módulo se actualizó exitosamente.'));
        return $response;
        
    } catch (PDOException $error) {
        $response->getBody()->write('{"error": {"text":' . $error->getMessage() . ' }}');
        return $response;
    }
});
