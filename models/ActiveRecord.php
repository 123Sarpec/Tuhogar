<?php

namespace Model;

class ActiveRecord{
    
    // base de datos 
    protected static $db;
    protected static $columnasDB = [];

    // hereda el atributo de tabla 
     protected static $tabla = '';

    // errores de un arreglo vacio...
    protected static $arreglo = [];


    // definir la conexionn a la db 

    public static function setDB($database)
    {
        self::$db = $database;
    }


    public function guardar()
    {
        if (!is_null($this->id)) {
            // actulizar
            $this->actulizar();
        } else {
            $this->crear();
        }
    }

    public function crear()
    {

        // sanitizar los datos de entrada
        $atributos = $this->sanitzarDatos();

        $query = "INSERT INTO " .  static::$tabla  .  " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " )  VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        $resultado = self::$db->query($query);

        // mesaje de exito 
        if ($resultado) {
            // redicciona a la pagina principal del admin 
            header('Location: /admin?resultado=1');
        }
    }



    public function actulizar()
    {
        $atributos = $this->sanitzarDatos();
        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }
        $query = "UPDATE " . static::$tabla  . " SET ";
        $query .= join(', ', $valores);
        $query .= " WHERE id ='" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1";

        $resultado = self::$db->query($query);

        if ($resultado) {
            header('Location: /admin?resultado=2');
        }
    }




    // eliminar registro 
    public function eliminar()
    {
        //eliminar propiedad
        $query = "DELETE FROM " . static::$tabla  . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 ";

        $resultado = self::$db->query($query);

        if ($resultado) {
            $this->borarImagen();
            header('Location: /admin?resultado=3');
        }
    }

    // identificar los atributos de la base de datos.... 
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // sanitiza los datos de la based de datos para tener mayor seguridad   
    public function sanitzarDatos()
    {
        $atributos = $this->atributos();
        $zanitido = [];


        foreach ($atributos as $key => $value) {
            $zanitido[$key] = self::$db->escape_string($value);
        }
        return $zanitido;
    }


    // subida de archivo de imagens
    public function setImagen($imagen)
    {
        if (!is_null($this->id)) {

            $this->borarImagen();
        }
        // asignar el atributo en el nombre de la imagen
        if ($imagen) {
            $this->imagen = $imagen;
        }
    }



    // eliminar setImagen
    public function borarImagen()
    {
        // comprobar si el archivo exixte
        $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
        if ($existeArchivo) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }
    }

    // validacon  
    public static function getErrores() {
        return static::$arreglo;
    }

    public function validar()  {

        static::$arreglo = [];
        return static::$arreglo;
    }


    //lista todos los registros
    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //obtiene el determina de numero de registro
    public static function get($cantidad)
    {
        $query = "SELECT * FROM " . static::$tabla. " LIMIT " . $cantidad;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }



    //buscar registro por su ID
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla  . " WHERE id = {$id}";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }


    public static function consultarSQL($query)
    {
        //consultar la bd
        $resultado = self::$db->query($query);

        // iterar el resulatado
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();

        // retornar el resulatado 
        return $array;
    }
    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //sicroniza el objeto en memoria con los cambios realizados por el usuario 
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
    
}