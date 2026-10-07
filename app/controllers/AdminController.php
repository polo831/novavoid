<?php
namespace app\controllers;

class AdminController extends \Controller {

    public function actionIndex($var = null) {
        $datos = [
            "titulo" => "Panel de Administración",
            "mensaje" => "Bienvenido al panel de control de tu tienda."
        ];

        // Usamos APP_PATH que ya sabe dónde está la carpeta app/
        require_once APP_PATH . "views/admin/panel.php";
    }
}