<?php

class DBSelect
{

    public static function select($sql)
    {
        $data = 'No existen registros.';
        $db = new Db();

        $result = $db->getConnection()->query($sql);

        if ($result->rowCount() > 0) {
            $data = $result->fetchAll(PDO::FETCH_OBJ);
        }

        return $data;
    }
}
