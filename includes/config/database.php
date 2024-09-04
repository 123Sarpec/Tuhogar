
<?php

function conectarDB():mysqli
{
    $db =  new mysqli('localhost','root', 'root','crud_bienesraices');
    if(!$db){
        echo "Conexion Fallida";
        exit;
    }
    return $db;
}