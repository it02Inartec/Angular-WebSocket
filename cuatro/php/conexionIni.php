
<?php 
//$DB_HOST = '127.0.0.1';
/*$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '123';
$DB_NAME = 'usuario';
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);*/
include 'ChromePhp.php';
ChromePhp::log('Hola Consola');

include_once('ez_sql_core.php');
include_once ('ez_sql_mysql.php');
$db = new ezSQL_mysql("root", "123","usuario","localhost");
?>