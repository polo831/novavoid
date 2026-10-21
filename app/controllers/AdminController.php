<?php
namespace app\controllers;

class AdminController extends \Controller {

    // Cubrimos la opción si el enrutador busca directamente 'index'
    public function index($var = null) {
        $this->actionIndex($var);
    }

    // Cubrimos la opción si el enrutador busca con el prefijo 'actionIndex'
    public function actionIndex($var = null) {
        $datos = [
            "titulo" => "Panel de Administración",
            "mensaje" => "Bienvenido al panel de control de tu tienda."
        ];

        // Carga la vista de la administración
        require_once APP_PATH . "views/admin/panel.php";
    }

    // Método de respaldo obligatorio por si el enrutador busca una acción inexistente
    public function action404() {
        echo "<h1 style='text-align: center; margin-top: 50px;'>404 - Acción no encontrada en el admin</h1>";
        echo "<p style='text-align: center;'><a href='index.php?url=auth/login'>Volver al login</a></p>";
    }
}