<?php

$usuario = $_POST['nnombre'];
$pass = $_POST['npassword'];
$passw = $_POST['npassword2'];

if(empty($usuario) || empty($pass) || empty($passw)){
	echo '<script language="javascript">alert("Debe llenar todos los campos.");</script>';
}else{

if($pass == $passw){
	$conexion = new mysqli("localhost", "root", "Batman97Hector", "login");
	if (mysqli_connect_errno()) {
    	printf("Connect failed: %s\n", mysqli_connect_error());
    	exit();
	} 

	$query="INSERT INTO usuario (user, password) VALUES('" . $usuario . "', '" . $pass . "')";
	$resultados=mysqli_query($conexion,$query);
	echo '<script language="javascript">alert("Usuario registrado exitosamente.");</script>';
}else{
	echo '<script language="javascript">alert("Las contraseñas no coinciden.");</script>';
}}
?>