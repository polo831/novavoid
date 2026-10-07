<?php

namespace app\controllers;

use \Controller;
use \Response;
use \DataBase;
use app\models\UserModel;
use app\models\ProductoModel; // 1. Importamos el modelo de productos

class HomeController extends Controller
{

    // Constructor
    public function __construct()
    {
        self::$sessionStatus = SessionController::sessionVerificacion();
    }


    public function actionIndex($var = null)
    {
		exit("¡SÍ ENTRÓ AL CONTROLADOR HOME!");
        SessionController::onlyUsers(); 
        $nombre = "jose";   

        // 2. Obtenemos los productos desde la base de datos
        $productos = ProductoModel::obtenerTodos();

        static::path();
        $nombre_de_archivoDeVista = 'home';
        $parametros_de_vista = [
            "head" => SiteController::head(),
            "header" => SiteController::header(),
            "topbar" => SiteController::topbar(),
            "menu" => SiteController::menu(),
            "menu_res" => SiteController::menu_res(),
            "nombre" => $nombre,
            "productos" => $productos, // 3. Inyectamos los productos a la vista
        ]; 
        Response::render($this->viewDir(__NAMESPACE__), $nombre_de_archivoDeVista, $parametros_de_vista);
    }
}