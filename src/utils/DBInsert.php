<?php

class DBInsert{
    
    public static function insert($sql, $arrayParam)
    {

        $db = new Db();

        $result = $db->getConnection()->prepare($sql);

        foreach ($arrayParam as $key => $value) {

            echo "key = $key, value = $value";

            if ($value != null && $value != "") {
                $result->bindParam($key, $value);
            }
        }

        $result->execute();

        $result = null;
        $db = null;
    }

}