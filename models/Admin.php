<?php

namespace Model;

use GuzzleHttp\Psr7\Query;


class Admin extends ActiveRecord
{
    // Base DE DATOS
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'email', 'password'];


    public $id;
    public $email;
    public $password;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
    }
    public function validar()
    {

        if (!$this->email) {
            self::$arreglo[] = "Su Correo es Obligatorio";
        }

        if (!$this->password) {
            self::$arreglo[] = 'La contraseña es Obligatoria';
        }

        return self::$arreglo;
    }
    public function ValidarUsurio()
    {
        //revisiar el usuario si existe o no

        $query = "SELECT * FROM " . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";


        $resultado = self::$db->query($query);
        if (!$resultado->num_rows) {
            self::$arreglo[] = 'Su correo es Invalido o no Existe';
            return;
        }
        return $resultado;
    }
    public function comprobaPassword($resultado)
    {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify($this->password, $usuario->password);
        if (!$autenticado) {
            self::$arreglo[] = 'La Contraseña es Incorrecta';
        }
        return $autenticado;
    }
    public function autenticar(){
        session_start();

        //llenar el arreglo para validar inicio de sesion
        $_SESSION['usuario'] = $this->email;
        $_SESSION['login'] = true;

        header('Location: /admin');
    }
}
