<?php

namespace app\models;

use PDO;
use PDOException;

class UserModel {

    public static function registrar($nombre, $email, $password) {
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        try {
            // Usamos DataBase con B y el método connection()
            $db = \DataBase::connection(); 
            $sql = "INSERT INTO usuarios (nombre, email, password, rol) VALUES (:nombre, :email, :password, 'cliente')";
            $stmt = $db->prepare($sql);
            
            return $stmt->execute([
                'nombre' => $nombre,
                'email' => $email,
                'password' => $passwordHash
            ]);
        } catch (PDOException $e) {
            return false; 
        }
    }

    public static function login($email, $password) {
        try {
            // Usamos DataBase con B y el método connection()
            $db = \DataBase::connection();
            $sql = "SELECT * FROM usuarios WHERE email = :email LIMIT 1";
            $stmt = $db->prepare($sql);
            $stmt->execute(['email' => $email]);
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && password_verify($password, $usuario['password'])) {
                return $usuario;
            }
            return false;
        } catch (PDOException $e) {
            return false;
        }
    }

}