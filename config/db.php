<?php




class DataBase{
    public static function connect(){
        $db = new mysqli(db_host, db_usuario, db_pasword, db_nombre);
        $db->query("SET NAMES 'utf8'");
        return $db;
    }
}


