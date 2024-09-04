<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController
{
    public static function login(Router $router)
    {

        $errores = [];



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if (empty($errores)) {
                // verificar el usuario si existe o no 
                $resultado = $auth->ValidarUsurio();
                if (!$resultado) {
                    //verifica si el usuario es existente
                    $errores = Admin::getErrores();
                } else {
                    //verificar password
                    $autenticado = $auth->comprobaPassword($resultado);
                    if ($autenticado) {
                        //autenticar al usuario
                        $auth->autenticar();
                    } else {
                        //validar la contrase que es correcto
                        $errores = Admin::getErrores();
                    }
                }
            }
        }

        $router->render('auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout()
    {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }
}
