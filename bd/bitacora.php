<?php
function EnvioBitacora($CONEXION,$ID_USUARIO, $TABLA, $ACCION, $CAMPO_ID, $CAMPO_MODIFICADO, $VALOR_ANTIGUO, $VALOR_NUEVO){
    $fecha = date("Y/m/d");
    date_default_timezone_set('America/Guatemala');
    $hora = date("h:i:s");
    //Envio a bitacora
    $consulta = "INSERT INTO bitacora (Fecha, Hora, ID_Usuario, Tabla, Accion, Campo_ID, Campo_Modificado, Valor_Antiguo, Valor_Nuevo) 
    VALUES ('$fecha', '$hora', '$ID_USUARIO', '$TABLA', '$ACCION', '$CAMPO_ID', '$CAMPO_MODIFICADO', '$VALOR_ANTIGUO', '$VALOR_NUEVO')";
    $resultado = $CONEXION->prepare($consulta);
    $resultado->execute();
}

?>