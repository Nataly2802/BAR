<?php
namespace App;

use Config\Config;

class Conexion {
    public $conexion;

    public function __construct() {
        $config = new Config();
        $this->conexion = new \mysqli(
            $config->db_host,
            $config->db_user,
            $config->db_pass,
            $config->db_name
        );

        if ($this->conexion->connect_error) {
            die("Error en la conexión: " . $this->conexion->connect_error);
        }
    }
}
