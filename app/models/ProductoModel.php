<?php

namespace app\models;

use \DataBase;

class ProductoModel {

    public static function obtenerTodos() {
        $db = \DataBase::connection();
        $stmt = $db->query("SELECT * FROM productos");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

  public static function obtenerPorCategoria($id_categoria) {
    $db = \DataBase::connection(); // O mantén \DataBase::connection() según cómo se llame tu método de conexión
    
    // Filtramos directamente por el ID de la categoría de forma exacta
    $stmt = $db->prepare("SELECT * FROM productos WHERE id_categoria = :id_categoria");
    $stmt->execute(['id_categoria' => $id_categoria]);
    
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}
}