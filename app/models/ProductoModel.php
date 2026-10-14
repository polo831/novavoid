<?php

namespace app\models;

use PDO;

class ProductoModel {

    public static function obtenerTodos() {
        $db = \DataBase::connection();
        $stmt = $db->query("SELECT * FROM productos");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorCategoria($id_categoria) {
        $db = \DataBase::connection();
        $stmt = $db->prepare("SELECT * FROM productos WHERE categoria_id = :id_categoria");
        $stmt->execute(['id_categoria' => $id_categoria]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function obtenerPorId($id) {
        try {
            $db = \DataBase::connection();
            $stmt = $db->prepare("SELECT * FROM productos WHERE id = :id LIMIT 1");
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            return null;
        }
    }

}