<?php

$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];

if(empty($usuario) || empty($pass)){
	header("Location: index.html");
	exit();
}

$conexion = new mysqli("localhost", "root", "Batman97Hector", "login");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} 

$query="SELECT * FROM usuario WHERE user='" . $usuario . "'";
$resultados=mysqli_query($conexion,$query);

if($fila = mysqli_fetch_row($resultados)){
	if($fila[2]==$pass){
		session_start();
		$_SESSION['user'] = $usuario;
		header("Location: contenido.php");

	}
	else{
		echo '<script language="javascript">alert("Usuario o contraseña incorrectos, vuelva a intentar.");</script>'; 
		header("Location: registro.html");		
	}
}

?>