<?php
include '../php/ChromePhp.php';
ChromePhp::log('Hola Consola');
require_once '../php/db.php'; // El script de conexión de base de datos mysql

$status = '%';
if(isset($_GET['status'])){
	$status = $_GET['status'];
}
$query = "select * from  tbl_datos";
$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

$arr = array();
if($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		$arr[] = $row;	
	}
}

# JSON-encode the response
echo $json_response = json_encode($arr);
?>