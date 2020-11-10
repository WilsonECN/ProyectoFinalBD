<?php

class Conexion{
    public static function Conectar(){
        define('servidor', 'localhost');
        define('nombre_db', 'PP');
        define('usuario', 'root');
        define('pass', '');
        
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        
        try{
            $conexion = new PDO ("mysql:host=".servidor."; dbname=".nombre_db, usuario, pass, $opciones);
            return $conexion;
        }catch(Exception $e){
            die("error: ".$e ->getMessage());
        }
    }
}

?>