<?php

class Get
{

    public static function getMenu()
    {
        $getMenu = ' - Bienvenido al Menu - ';
        return $getMenu;
    }

    public static function getUsuarios($id, $nombre_modulo, $modulo_padre, $estado)
    {
        $getUsuario = '  - Id: '.$id.'  - Nombre modulo: '.$nombre_modulo.'  - Modulo padre: '.$modulo_padre.'  - Estado:'.$estado;
        return $getUsuario;
    }

    public static function getProyectos()
    {
        $getProyecto = '  - Proyecto: Proyecto TITAN';
        return $getProyecto;
    }

}
