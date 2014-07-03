<?php
require_once '../php/db.php'; // El script de conexión de base de datos mysql
if(isset($_GET['usuario'])){
	$usuario = $_GET['usuario'];
	$status = "0";

	$created = time();

	$query="INSERT INTO tbl_datos(nombre,apellido,usuario,contrasena,status)  VALUES ('$usuario', '$status', '$created')";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$result = $mysqli->affected_rows;

	echo $json_response = json_encode($result);
}
?>