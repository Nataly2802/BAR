<?php
namespace App;

require_once 'C:/config/config.php';

class Conexion {
    public $conexion;

    public function __construct() {
        $this->conexion = new \mysqli($GLOBALS['db_host'], $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_name']);
        if ($this->conexion->connect_error) {
            die("Error en la conexión: " . $this->conexion->connect_error);
        }
    }
}
