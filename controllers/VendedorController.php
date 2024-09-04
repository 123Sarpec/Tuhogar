<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class VendedorController
{

    public static function crear(Router $router)
    {

        $errores = Vendedor::getErrores();
        $vendedor = new Vendedor;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // crear una nueva instancia
            $vendedor = new Vendedor($_POST['vendedor']);

            // validar los campos llenos. o vacios
            $errores = $vendedor->validar();

            // no hay errores 
            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }


    public static function actualizar(Router $router)
    {

        $errores = Vendedor::getErrores();
        $id = validarOredireccionar('/admin');

        // obtener resultado del vendedor al actulizar 
        $vendedor = Vendedor::find($id);

        // Ejecutar el código después de que el usuario envia el formulario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Asignar los atributos
            $args = $_POST['vendedor'];

            $vendedor->sincronizar($args);

            // Validación
            $errores = $vendedor->validar();


            if (empty($errores)) {
                $vendedor->guardar();
            }
        }

        $router->render('/vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }



    public static function eliminar()
    {
     if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            $tipo = $_POST['tipo'];

            if(validarTipoContenido($tipo)){
                $vendedor = Vendedor::find($id);

                $vendedor->eliminar();
            }
        }
     }   
    }
}
