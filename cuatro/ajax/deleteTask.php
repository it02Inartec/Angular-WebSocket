<?php
require_once '../php/db.php'; // El script de conexión de base de datos mysql
if(isset($_GET['usuarioID'])){
	$usuarioID = $_GET['usuarioID'];

	$query="delete from tbl_datos where id='$usuarioID'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$result = $mysqli->affected_rows;

	echo $json_response = json_encode($result);
}
?>