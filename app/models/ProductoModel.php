<?php

namespace app\models;

use \DataBase;

class ProductoModel {
    public static function obtenerTodos() {
        $db = DataBase::connect();
        $query = $db->prepare("SELECT * FROM productos");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_ASSOC);
    }
}