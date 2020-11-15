<?php
	
$user = $_POST['usuario'];
$contra = $_POST['password'];

$usuario = "";
$contrase = "";

if(empty($user)||empty($contra)){
echo '<script language="javascript">alert("Por favor llenar todos los campos");</script>';
echo '<a href="javascript:history.go(-1)">ATRÁS</a>';
}
	 else{
				$servername = "127.0.0.1";
				$database = "pp";
				$username = "root";
				$password = "";
				$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
					if (!$conn) {
					      die("Conexion fallida: " . mysqli_connect_error());
					}	 
					$sql = "SELECT*FROM usuarios WHERE ID_Usuario = '".$user."'";

					if (mysqli_query($conn, $sql)) {
						$datos= mysqli_query ($conn, $sql);

					      while ($fila =mysqli_fetch_array($datos)){
							$usuario = $fila["ID_Usuario"];
							$contrase= $fila["Pass"];
							$idacceso= $fila["ID_Acceso"];
							}

						if (empty($usuario)) {
								echo '<script language="javascript">alert("El usuario no existe");</script>';
								echo '<a href="javascript:history.go(-1)">ATRÁS</a>';
							} else if ($usuario==$user and $contrase==$contra) { 
								
								if($idacceso==1){ 
									
									require_once"vistas/parte_superior.php";

									require_once"vistas/clientes.php";

									require_once"vistas/parte_inferior.php";} 
								
								else{ 

									require_once"vistas/parte_superior2.php";

									require_once"vistas/clientes.php";

									require_once"vistas/parte_inferior.php";}	
								
								}
								else{
									echo '<script language="javascript">alert("Datos Incorrectos");</script>';
									echo '<a href="javascript:history.go(-1)">ATRÁS</a>';
								}


					} else {
					      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
					mysqli_close($conn);
				
				}


?>