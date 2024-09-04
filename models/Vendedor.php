<?php

namespace Model;

class Vendedor extends ActiveRecord
{
    // Base DE DATOS
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
    }
    public function validar()
    {

        if (!$this->nombre) {
            self::$arreglo[] = "El Nombre es Obligatorio";
        }

        if (!$this->apellido) {
            self::$arreglo[] = 'El Apellido es Obligatorio';
        }

        if (!$this->telefono) {
            self::$arreglo[] = 'El NO. de Telefono es Obligatorio';
        }

        if(!preg_match('/[0-9]{8}/', $this->telefono)){
            self::$arreglo[] = "Numero Invalido";

        }
        return self::$arreglo;
    }
}
