<?php

namespace app\controllers;

use app\models\UserModel;

class AuthController {

    public function actionRegister() {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (!empty($nombre) && !empty($email) && !empty($password)) {
                $exito = UserModel::registrar($nombre, $email, $password);

                if ($exito) {
                    header('Location: /tiendaonlinepolo/public/index.php?url=auth/login&registrado=1');
                    exit;
                } else {
                    $error = "El correo electrónico ya está registrado o hubo un error.";
                }
            } else {
                $error = "Por favor completa todos los campos.";
            }
        }

        include_once __DIR__ . '/../views/auth/registro.php';
    }

    public function actionLogin() {
        $error = null;
        $mensajeExito = isset($_GET['registrado']) ? "¡Registro exitoso! Ya puedes iniciar sesión." : null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = trim($_POST['password'] ?? '');

            if (!empty($email) && !empty($password)) {
                $usuario = UserModel::login($email, $password);

                if ($usuario) {
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start();
                    }
                    
                    $_SESSION['user_id'] = $usuario['id'] ?? null;
                    $_SESSION['nombre'] = $usuario['nombre'];
                    $_SESSION['email'] = $usuario['email'];
                    $_SESSION['rol'] = $usuario['rol'];

                    header('Location: /tiendaonlinepolo/public/index.php?url=home/index');
                    exit;
                } else {
                    $error = "Correo electrónico o contraseña incorrectos.";
                }
            } else {
                $error = "Por favor completa todos los campos.";
            }
        }

        include_once __DIR__ . '/../views/auth/login.php';
    }

    public function action404() {
        echo "<h1 style='text-align: center; margin-top: 50px;'>404 - Página no encontrada en Noda Void</h1>";
        echo "<p style='text-align: center;'><a href='/tiendaonlinepolo/public/index.php?url=auth/login'>Volver al login</a></p>";
    }

}