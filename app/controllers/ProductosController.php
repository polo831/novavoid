<?php

namespace app\controllers;

use app\models\ProductoModel;

class ProductosController {

    public function actionDetalle() {
        // Obtenemos el ID de la URL de forma segura
        $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        // Buscamos el producto en la base de datos
        $producto = ProductoModel::obtenerPorId($id);

        // Si no existe el producto, redirigimos al inicio o catálogo
        if (!$producto) {
            header('Location: /novavoid/public/index.php?url=home/index');
            exit;
        }

        // Cargamos la vista de detalle pasando el producto
        include_once __DIR__ . '/../views/productos/detalle.php';
    }
}