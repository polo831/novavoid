<?php

namespace app\controllers;

use app\models\UserModel;

class AuthController {

    public function actionRegister() {
        $error = null;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nombre = trim($_POST['nombre'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirmar_password = $_POST['confirmar_password'] ?? '';
            $direccion = trim($_POST['direccion'] ?? '');
            $telefono = trim($_POST['telefono'] ?? '');

            if (!empty($nombre) && !empty($email) && !empty($password) && !empty($confirmar_password) && !empty($direccion) && !empty($telefono)) {
                
                // 1. Validar que las contraseñas coincidan
                if ($password !== $confirmar_password) {
                    $error = "Las contraseñas no coinciden.";
                } else {
                    // 2. Validar requisitos de seguridad (Mínimo 8 caracteres, 1 mayúscula, 1 número, 1 símbolo)
                    $patron_seguridad = '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
                    if (!preg_match($patron_seguridad, $password)) {
                        $error = "La contraseña debe tener al menos 8 caracteres, una letra mayúscula, un número y un símbolo especial.";
                    } else {
                        // 3. Hashear contraseña de forma segura
                        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                        // 4. Registrar en el modelo (Asegúrate de que UserModel::registrar acepte estos parámetros)
                      // En AuthController.php (acción actionRegister):
                           $exito = UserModel::registrar($nombre, $email, $password, $direccion, $telefono);

                        if ($exito) {
                            header('Location: /novavoid/public/index.php?url=auth/login&registrado=1');
                            exit;
                        } else {
                            $error = "El correo electrónico ya está registrado o hubo un error.";
                        }
                    }
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

                    header('Location: /novavoid/public/index.php?url=home/index');
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

    public function actionRecuperar() {
        $error = null;
        include_once __DIR__ . '/../views/auth/recuperar.php';
    }

    public function actionProcesarRecuperar() {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = trim($_POST['email'] ?? '');
            $nueva_password = $_POST['nueva_password'] ?? '';
            $confirmar_password = $_POST['confirmar_password'] ?? '';

            if ($nueva_password !== $confirmar_password) {
                $error = "Las contraseñas no coinciden.";
            } else {
                $patron_seguridad = '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/';
                if (!preg_match($patron_seguridad, $nueva_password)) {
                    $error = "La nueva contraseña no cumple con los requisitos de seguridad.";
                } else {
                    $passwordHash = password_hash($nueva_password, PASSWORD_DEFAULT);

                    // Actualizar contraseña en el modelo (asegúrate de crear este método en UserModel)
                    // UserModel::actualizarPasswordPorEmail($email, $passwordHash);

                    header('Location: /novavoid/public/index.php?url=auth/login&recuperado=1');
                    exit();
                }
            }
        }
        include_once __DIR__ . '/../views/auth/recuperar.php';
    }

    public function actionLogout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = array();

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header('Location: /novavoid/public/index.php?url=auth/login');
        exit();
    }

    public function action404() {
        echo "<h1 style='text-align: center; margin-top: 50px;'>404 - Página no encontrada en Nova Void</h1>";
        echo "<p style='text-align: center;'><a href='/novavoid/public/index.php?url=auth/login'>Volver al login</a></p>";
    }

}