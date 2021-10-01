<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->post('/modulos', function (Request $request, Response $response, $args) {

    $data = json_decode($request->getBody(), true);
    $nombre = $data['nombre'];
    $modulo_padre_id = $data['modulo_padre_id'];

    $sqlInto = "";
    $sqlValues = "";

    $mapParam = new \Ds\Map();

    if($nombre != null && $nombre != ""){
        $sqlInto = $sqlInto . " nombre";
        $sqlValues = $sqlValues . " :nombre";
        $mapParam->put(":nombre",$nombre);
    }

    if($modulo_padre_id != null && $modulo_padre_id != ""){
        if(strlen($sqlInto) > 0){
            $sqlInto = $sqlInto . ",";    
        }
        $sqlInto = $sqlInto . " modulo_padre_id";

        if(strlen($sqlValues) > 0){
            $sqlValues = $sqlValues . ",";    
        }
        $sqlValues = $sqlValues . " :modulo_padre_id";

        $mapParam->put(":modulo_padre_id",$modulo_padre_id);
    }

    $sql = "INSERT INTO modulo(".$sqlInto.") VALUES (".$sqlValues.");";

    try {

        DBUtils::insert($sql, $mapParam->toArray());

        $response->getBody()->write(json_encode('El módulo '.$nombre.' se creo exitosamente.'));
        return $response;
    } catch (PDOException $error) {
        $response->getBody()->write('{"error": {"text":' . $error->getMessage() . ' }}');
        return $response;
    }
});
