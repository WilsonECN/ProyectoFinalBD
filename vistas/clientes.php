<?php
include_once './bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT ID_Cliente, Nombre, Apellido, NIT, Fch_Nacimiento, Genero, Direccion, Telefono, Descripcion FROM clientes";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
$NOMBRE = "FRANCISCO";
echo '<input type="hidden" id="ID_USUARIO" name="ID_Usuario" value="' . $NOMBRE . '" />';
?>

<!doctype html>
<html>
    <head>
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="#" />  
    <title>CLIENTES</title>
      
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./assets/bootstrap/css/bootstrap.min.css">
    <!-- CSS personalizado --> 
    <link rel="stylesheet" href="./assets/main.css">  
      
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="./assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="./assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
      
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  
    </head>
    
    <body>
        <div class="container p">
            <div class="row">
                <div class="col-lg-12">
                    <button id="btnNuevo" type="button" class="btn btn-success">Añadir Cliente</button>
                </div>
            </div>
        </div>
   
        <div class="container prueba">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table id="tablaClientes" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Nacimiento</th>
                                <th>Genero</th>
                                <th>Direccion</th>
                                <th>Teléfono</th>
                                <th>NIT</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                                </tr>
                            </thead>                        
                            <tbody>
                                <?php
                                foreach($data as $da) {
                                ?>
                                <tr>
                                    <td><?php echo $da['ID_Cliente'];?></td>
                                    <td><?php echo $da['Nombre'];?></td>
                                    <td><?php echo $da['Apellido'];?></td>
                                    <td><?php echo $da['Fch_Nacimiento'];?></td>
                                    <td><?php echo $da['Genero'];?></td>
                                    <td><?php echo $da['Direccion'];?></td>
                                    <td><?php echo $da['Telefono'];?></td>
                                    <td><?php echo $da['NIT'];?></td>
                                    <td><?php echo $da['Descripcion'];?></td>
                                    <td></td>
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
        
            <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModelLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formClientes">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Nombre:</label>
                                            <input type="text" class="form-control" id="Nombre">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Apellido:</label>
                                            <input type="text" class="form-control" id="Apellido">
                                        </div> 
                                    </div>    
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Fecha de Nacimiento:</label>
                                            <input type="date" class="form-control" id="Fch_Nacimiento">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Sexo</label>
                                            <select name="select" class="form-control" id="Genero">
                                                <option value="Femenino" selected>Femenino</option> 
                                                <option value="Masculino">Masculino</option>
                                            </select>
                                        </div> 
                                    </div>                                    
                                </div>
                                
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">NIT:</label>
                                            <input type="text" class="form-control" id="NIT">
                                        </div> 
                                    </div>                                    
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">Teléfono:</label>
                                            <input type="number" class="form-control" id="Telefono">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="pais" class="col-form-label">Direccion:</label>
                                    <textarea type="textarea" rows="1" class="form-control" id="Direccion"></textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="pais" class="col-form-label">Descripción:</label>
                                    <input type="text" class="form-control" id="Descripcion">
                                </div>
                                
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


    <!-- jQuery, Popper.js, Bootstrap JS -->
        <!-- Bootstrap core JavaScript-->
        <script src="assets/jquery/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/popper/popper.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- datatables JS -->
    <script type="text/javascript" src="assets/datatables/datatables.min.js"></script>    
    <script type="text/javascript" src="assets/main.js"></script> 
 
    </body>
</html>