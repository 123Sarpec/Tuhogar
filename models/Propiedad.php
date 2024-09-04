<?php

namespace Model;
use GuzzleHttp\Psr7\Query;

class Propiedad extends ActiveRecord {

    // Base DE DATOS
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'sanitarios', 'estacionamiento', 'creado', 'vendedores_id'];


    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitaciones;
    public $sanitarios;
    public $estacionamiento;
    public $creado;
    public $vendedores_id;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitaciones = $args['habitaciones'] ?? '';
        $this->sanitarios = $args['sanitarios'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedores_id = $args['vendedores_id'] ?? '';
    }
    public function validar()
    {

        if (!$this->titulo) {
            self::$arreglo[] = "Debes añadir un titulo";
        }

        if (!$this->precio) {
            self::$arreglo[] = 'El Precio es Obligatorio';
        }

        if (strlen($this->descripcion) < 50) {
            self::$arreglo[] = 'La descripción es obligatoria y debe tener al menos 50 caracteres';
        }

        if (!$this->habitaciones) {
            self::$arreglo[] = 'El Número de habitaciones es obligatorio';
        }

        if (!$this->sanitarios) {
            self::$arreglo[] = 'El Número de Baños es obligatorio';
        }

        if (!$this->estacionamiento) {
            self::$arreglo[] = 'El Número de lugares de Estacionamiento es obligatorio';
        }

        if (!$this->vendedores_id) {
            self::$arreglo[] = 'Elige un vendedor';
        }

        if (!$this->imagen) {
            self::$arreglo[] = 'La Imagen de la Propiedda es Obligatoria';
        }

        return self::$arreglo;
    }




}