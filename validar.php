<?php
session_start();
$user = $_POST['usuario'];
$contra = $_POST['password'];

$usuario = "";
$contrase = "";

if(empty($user)||empty($contra)){
	echo '<script language="javascript">alert("Por favor llenar todos los campos");</script>';
	header("location: index.php");
}
	 else{
				$servername = "127.0.0.1";
				$database = "PP";
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
							$nombre = $fila["Nombre"];
							$apellido = $fila["Apellido"];
							$contrase= $fila["Pass"];
							$idacceso= $fila["ID_Acceso"];
							}

						if (empty($usuario)) {
								echo '<script language="javascript">alert("El usuario no existe");</script>';
								header("location: index.php");
							} else if ($usuario==$user and $contrase==$contra) { 								
									$_SESSION["s_usuario"] = $nombre.' '.$apellido;
									$_SESSION["s_acceso"] = $idacceso;
									$_SESSION["s_dash"] = "CLIENTES";
									header("location: clientes.php");
								}
								else{
									echo '<script language="javascript">alert("Datos Incorrectos");</script>';
									header("location: index.php");
								}


					} else {
					      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
					mysqli_close($conn);
				}
?>