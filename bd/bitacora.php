<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

//Recepcion de los datos enviados mediante el metodo post desde el archivo de javascript

$ID = (isset($_POST['id'])) ? $_POST['id'] : '';
$Nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$Apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$NIT = (isset($_POST['nit'])) ? $_POST['nit'] : '';
$Fch_Nacimiento = (isset($_POST['fch_nacimiento'])) ? $_POST['fch_nacimiento'] : '';
$Genero = (isset($_POST['genero'])) ? $_POST['genero'] : '';
$Direccion = (isset($_POST['direccion'])) ? $_POST['direccion'] : '';
$Telefono = (isset($_POST['telefono'])) ? $_POST['telefono'] : '';
$Descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : '';
$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';

if($opcion==1){
    $fecha = date("T/m/d");
    $hora = date("h:i:sa");
    
    $consulta = "INSERT INTO bitacora (Fecha, Hora, ID_Usuario, Tabla, Accion, Campo_ID Campo_Modificado, Valor_Antiguo, Valor_Nuevo) VALUES('$fecha', '$hora', '1', 'clientes', 'INSERT', '10', 'ID_Cliente', 'NULL', '10')";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
}




/*
switch($opcion){
    case 1:
        $consulta = "INSERT INTO clientes (Nombre, Apellido, NIT, Fch_Nacimiento, Genero, Direccion, Telefono, Descripcion) VALUES('$Nombre', '$Apellido', '$NIT', '$Fch_Nacimiento', '$Genero', '$Direccion', '$Telefono', '$Descripcion')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT ID_Cliente, Nombre, Apellido, NIT, Fch_Nacimiento, Genero, Direccion, Telefono, Descripcion FROM clientes ORDER BY ID_Cliente DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
        $consulta = "UPDATE clientes SET Nombre='$Nombre', Apellido='$Apellido', NIT='$NIT', Fch_Nacimiento='$Fch_Nacimiento', Genero='$Genero', Direccion='$Direccion', Telefono='$Telefono', Descripcion='$Descripcion' WHERE ID_Cliente='$ID'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT ID_Cliente, Nombre, Apellido, NIT, Fch_Nacimiento, Genero, Direccion, Telefono, Descripcion FROM clientes WHERE ID_Cliente='$ID'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:
        $consulta = "DELETE FROM clientes WHERE ID_Cliente='$ID' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        break;
}
*/

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviamos el array final en formato JSON a el archivo JS
$conexion =NULL;

?>