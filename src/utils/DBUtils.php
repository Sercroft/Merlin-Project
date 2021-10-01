<?php

require 'DBSelect.php';
require 'DBInsert.php';
require 'DBUpdate.php';

class DBUtils
{
    public static function select($sql)
    {
        return DBSelect::select($sql);
    }

    public static function insert($sql, $arrayParam)
    {
       DBInsert::insert($sql, $arrayParam);
    }

    public static function update($sql, $arrayParam)
    {
       DBUpdate::update($sql, $arrayParam);
    }
}
