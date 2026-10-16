<?php
namespace app\controllers;

class CarritoController {

    public function actioncarrito() {
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }
        
        $total = 0;
        foreach ($_SESSION['carrito'] as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }

        // Cargar la vista del carrito
        require_once '../app/views/carrito/index.php';
    }

    public function agregar() {
        $id = $_GET['id'] ?? null;
        
        if ($id) {
            if (isset($_SESSION['carrito'][$id])) {
                $_SESSION['carrito'][$id]['cantidad'] += 1;
            } else {
                // Lógica de producto
            }
        }
        
        header("Location: index.php?url=Carrito/index");
        exit;
    }

    public function eliminar() {
        $id = $_GET['id'] ?? null;
        
        if ($id && isset($_SESSION['carrito'][$id])) {
            unset($_SESSION['carrito'][$id]);
        }
        
        header("Location: index.php?url=Carrito/index");
        exit;
    }
       public function action404() {
        echo "<h1 style='text-align: center; margin-top: 50px;'>404 - Página no encontrada en Nova Void</h1>";
        echo "<p style='text-align: center;'><a href='/novavoid/public/index.php?url=auth/login'>Volver al login</a></p>";
    }

}