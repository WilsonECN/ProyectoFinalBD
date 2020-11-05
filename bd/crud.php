<?php
include_once '../bd/conexion.php';
include_once '../bd/bitacora.php';
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

//$ID_Usuario = (isset($_POST['ID_Usuario'])) ? $_POST['ID_Usuario'] : '';
$ID_Usuario = 1;
switch($opcion){
    case 1:
        //ingreso de nuevo dato
        $consulta = "INSERT INTO clientes (Nombre, Apellido, NIT, Fch_Nacimiento, Genero, Direccion, Telefono, Descripcion) 
        VALUES('$Nombre', '$Apellido', '$NIT', '$Fch_Nacimiento', '$Genero', '$Direccion', '$Telefono', '$Descripcion')";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        //consulta del nuevo dato ingresado
        $consulta = "SELECT ID_Cliente, Nombre, Apellido, NIT, Fch_Nacimiento, Genero, Direccion, Telefono, Descripcion FROM clientes ORDER BY ID_Cliente DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        $IDCLIENTE = $data[0]['ID_Cliente'];

        //            $conexion  ID_Usuario,    Tabla,     Accion,    Campo_ID,  Campo_Modificado,  Valor_Antiguo,  Valor_Nuevo
        EnvioBitacora($conexion, $ID_Usuario, "clientes", "INSERT", "$IDCLIENTE",  "ID_Cliente",       "NULL",      "$IDCLIENTE" );

        break;
    case 2:

        //Recive datos antiguos
        $consulta = "SELECT ID_Cliente, Nombre, Apellido, NIT, Fch_Nacimiento, Genero, Direccion, Telefono, Descripcion FROM clientes WHERE ID_Cliente='$ID'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $dataAntes=$resultado->fetchAll(PDO::FETCH_ASSOC);

        //actualización de los campos 
        $consulta = "UPDATE clientes SET Nombre='$Nombre', Apellido='$Apellido', NIT='$NIT', Fch_Nacimiento='$Fch_Nacimiento', Genero='$Genero', Direccion='$Direccion', Telefono='$Telefono', Descripcion='$Descripcion' WHERE ID_Cliente='$ID'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT ID_Cliente, Nombre, Apellido, NIT, Fch_Nacimiento, Genero, Direccion, Telefono, Descripcion FROM clientes WHERE ID_Cliente='$ID'";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);

        if($dataAntes[0]["Nombre"] != $data[0]["Nombre"]){
            $campo = "Nombre";
            $antiguo = $dataAntes[0]['Nombre'];
            $nuevo   = $data[0]["Nombre"];
            //            $conexion  ID_Usuario,    Tabla,     Accion,    Campo_ID,  Campo_Modificado,  Valor_Antiguo,  Valor_Nuevo
            EnvioBitacora($conexion, $ID_Usuario, "clientes", "UPDATE",     "$ID",       "$campo",        "$antiguo",    "$nuevo" );
            //error_log("NOMBRE ACTUALIZADO");
        }
        if($dataAntes[0]["Apellido"] != $data[0]["Apellido"]){
            $campo = "Apellido";
            $antiguo = $dataAntes[0]['Apellido'];
            $nuevo   = $data[0]["Apellido"];
            //            $conexion  ID_Usuario,    Tabla,     Accion,    Campo_ID,  Campo_Modificado,  Valor_Antiguo,  Valor_Nuevo
            EnvioBitacora($conexion, $ID_Usuario, "clientes", "UPDATE",     "$ID",       "$campo",        "$antiguo",    "$nuevo" );
            //error_log("APELLIDO ACTUALIZADO");
        }
        if($dataAntes[0]["Fch_Nacimiento"] != $data[0]["Fch_Nacimiento"]){
            $campo = "Fch_Nacimiento";
            $antiguo = $dataAntes[0]['Fch_Nacimiento'];
            $nuevo   = $data[0]["Fch_Nacimiento"];
            //            $conexion  ID_Usuario,    Tabla,     Accion,    Campo_ID,  Campo_Modificado,  Valor_Antiguo,  Valor_Nuevo
            EnvioBitacora($conexion, $ID_Usuario, "clientes", "UPDATE",     "$ID",       "$campo",        "$antiguo",    "$nuevo" );
            //error_log("Fch_Nacimiento ACTUALIZADO");
        }
        if($dataAntes[0]["Genero"] != $data[0]["Genero"]){
            $campo = "Genero";
            $antiguo = $dataAntes[0]['Genero'];
            $nuevo   = $data[0]["Genero"];
            //            $conexion  ID_Usuario,    Tabla,     Accion,    Campo_ID,  Campo_Modificado,  Valor_Antiguo,  Valor_Nuevo
            EnvioBitacora($conexion, $ID_Usuario, "clientes", "UPDATE",     "$ID",       "$campo",        "$antiguo",    "$nuevo" );
            //error_log("Genero ACTUALIZADO");
        }
        if($dataAntes[0]["Direccion"] != $data[0]["Direccion"]){
            $campo = "Direccion";
            $antiguo = $dataAntes[0]['Direccion'];
            $nuevo   = $data[0]["Direccion"];
            //            $conexion  ID_Usuario,    Tabla,     Accion,    Campo_ID,  Campo_Modificado,  Valor_Antiguo,  Valor_Nuevo
            EnvioBitacora($conexion, $ID_Usuario, "clientes", "UPDATE",     "$ID",       "$campo",        "$antiguo",    "$nuevo" );
            error_log("Direccion ACTUALIZADO");
        }
        if($dataAntes[0]["Telefono"] != $data[0]["Telefono"]){
            $campo = "Telefono";
            $antiguo = $dataAntes[0]['Telefono'];
            $nuevo   = $data[0]["Telefono"];
            //            $conexion  ID_Usuario,    Tabla,     Accion,    Campo_ID,  Campo_Modificado,  Valor_Antiguo,  Valor_Nuevo
            EnvioBitacora($conexion, $ID_Usuario, "clientes", "UPDATE",     "$ID",       "$campo",        "$antiguo",    "$nuevo" );
            error_log("Telefono ACTUALIZADO");
        }
        if($dataAntes[0]["Descripcion"] != $data[0]["Descripcion"]){
            $campo = "Descripcion";
            $antiguo = $dataAntes[0]['Descripcion'];
            $nuevo   = $data[0]["Descripcion"];
            //            $conexion  ID_Usuario,    Tabla,     Accion,    Campo_ID,  Campo_Modificado,  Valor_Antiguo,  Valor_Nuevo
            EnvioBitacora($conexion, $ID_Usuario, "clientes", "UPDATE",     "$ID",       "$campo",        "$antiguo",    "$nuevo" );
            error_log("Descripcion ACTUALIZADO");
        }

        break;
    case 3:
        $consulta = "DELETE FROM clientes WHERE ID_Cliente='$ID' ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        //            $conexion  ID_Usuario,    Tabla,     Accion,    Campo_ID,  Campo_Modificado,  Valor_Antiguo,  Valor_Nuevo
        EnvioBitacora($conexion, $ID_Usuario, "clientes", "DELETE", "$ID",  "ID_Cliente",       "$ID",      "NULL" );


        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviamos el array final en formato JSON a el archivo JS
$conexion =NULL;

?>