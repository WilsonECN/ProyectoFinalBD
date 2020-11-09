<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT ID_Bitacora, Fecha, Hora, ID_Usuario, Tabla, Accion, Campo_ID, Campo_Modificado, Valor_Antiguo, Valor_Nuevo FROM bitacora";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html>
    <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>BITACORA</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="../assets/main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="../assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
    </head>
        <div class="container prueba">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablaClientes" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr> 
                                <th>ID Bitacora</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>ID Usuario</th>
                                <th>Tabla</th>
                                <th>Accion</th>
                                <th>Campo ID</th>
                                <th>Campo Modificado</th>
                                <th>Valor Antiguo</th>
                                <th>Valor Nuevo</th>
                                </tr>
                            </thead>                        
                            <tbody>
                                <?php
                                foreach($data as $da) {
                                ?>
                                <tr>
                                    <td><?php echo $da['ID_Bitacora'];?></td>
                                    <td><?php echo $da['Fecha'];?></td>
                                    <td><?php echo $da['Hora'];?></td>
                                    <td><?php echo $da['ID_Usuario'];?></td>
                                    <td><?php echo $da['Tabla'];?></td>
                                    <td><?php echo $da['Accion'];?></td>
                                    <td><?php echo $da['Campo_ID'];?></td>
                                    <td><?php echo $da['Campo_Modificado'];?></td>
                                    <td><?php echo $da['Valor_Antiguo'];?></td>
                                    <td><?php echo $da['Valor_Nuevo'];?></td>
                                    
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
 
    <!-- jQuery, Popper.js, Bootstrap JS -->
    <script src="../assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/popper/popper.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- datatables JS -->
    <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="../assets/bitacora.js"></script>  
    </body>
</html>
