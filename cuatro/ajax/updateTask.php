<?php
require_once '../php/db.php'; // El script de conexión de base de datos mysql
if(isset($_GET['taskID'])){
	$status = $_GET['status'];
	$taskID = $_GET['taskID'];
	$query="update tbl_datos set status='$status' where id='$taskID'";
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	$result = $mysqli->affected_rows;

	$json_response = json_encode($result);
}
?>