<?php
    include 'ChromePhp.php';
    ChromePhp::log('llego a salir.php!');
    session_start();
	if(isset($_SESSION['usuario'])){
		session_destroy();
		echo 'holaa...';
	}
?>