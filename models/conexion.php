<?php 
    class ConexionBD
    {
        public function get_conexion()
        {
            if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') 
            {
                $user = "root";
                $pass = "Admin2020";
                $host = "localhost";
                $bd = "iss";
            } 
            else 
            {
                $user = "poo";
                $pass = "poo";
                $host = "localhost";
                $bd = "iss";
            }
            $conexion = new PDO("mysql:host=$host;dbname=$bd;",$user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            return $conexion; 
        } 
    }
?>