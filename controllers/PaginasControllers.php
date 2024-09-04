<?php

namespace Controllers;


use GuzzleHttp\Psr7\Request;
use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PaginasControllers
{

    public static function index(Router $router)
    {

        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('Paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio
        ]);
    }


    public static function nosotros(Router $router)
    {
        $router->render('Paginas/nosotros', []);
    }

    public static function propiedades(Router $router)
    {
        $propiedades = Propiedad::all();

        $router->render('Paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router)
    {
        $id = validarOredireccionar('/propiedades');

        // buscar la propiedad 
        $propiedad = Propiedad::find($id);
        $router->render('Paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router)
    {
        $router->render('Paginas/blog', []);
    }

    public static function entrada(Router $router)
    {
        $router->render('Paginas/entrada', []);
    }


    public static function contacto(Router $router)
    { 
        $mensaje = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            //instanciar el metodo post para el formulario de envio con los datos.
            $respuestas = $_POST['contacto'];

            //crear una istancia para emails
            $email = new PHPMailer();
            //confugurar el SMTP
            $email->isSMTP();
            $email->Host = 'sandbox.smtp.mailtrap.io';
            $email->SMTPAuth = true;
            $email->Username = '7aabe1fa4a14d2';
            $email->Password = '3494b44930a3c9';
            $email->SMTPSecure = 'tls';
            $email->Port = 2525;


            //configurar el contendo del email
            $email->setFrom('admin@miempresa.com');
            $email->addAddress('admin@miempresa.com', 'BienesRaices.com');
            $email->Subject = 'Tienes un Nuevo Mensaje';

            // hablitar html para lo emails
            $email->isHTML(true);
            $email->CharSet = 'UTF-8';


            //definir el contenido
            $contenido = '<html>';
            $contenido .= '<p><strong>Tienes un nuevo mensaje</strong></p>';
            $contenido .= '<p><strong>Nombre:</strong> ' . $respuestas['nombre'] . '</p>';


            // enviar de forma condicional de los campos correo y telefono para ser contactado
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p><strong>Contactar por:</strong></p>';
                $contenido .= '<p><strong>No. telefono:</strong> ' . $respuestas['telefono'] . '</p>';
                $contenido .= '<p><strong>Fecha Para Contactar: </strong>' . $respuestas['fecha'] . '</p>';
                $contenido .= '<p><strong>Hora:</strong> ' . $respuestas['hora'] . '</p>';
            }else{
                $contenido .= ' <p><strong>Correo para Contactar</strong></p>';
                $contenido .= '<p><strong>E-mail:</strong> ' . $respuestas['email'] . '</p>';
            }

            $contenido .= '<p><strong>Mensaje:</strong> ' . $respuestas['mensaje'] . '</p>';
            $contenido .= '<p><strong>Vender o Comprar:</strong> ' . $respuestas['tipo'] . '</p>';
            $contenido .= '<p><strong>Precio o Presupuesto:</strong> ' . $respuestas['precio'] . '</p>';
            $contenido .= '</html>';


            $email->Body = $contenido;
            $email->AltBody = 'Texto alternativo de HTML';


            // enviar el mail 
            if ($email->send()) {
                $mensaje ='Mensaje Enviado Correctamente';
            } else {
                $mensaje = 'Error al Enviar el Mensaje, al admin';
            }
        }
        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
     }
}
