<?php
session_start();
function salir(){
    session_destroy();
}
?>
<!DOCTYPE html>
<html ng-app='myApp'>
<head>
<meta charset="utf-8" />
<title>Usuario Sesion Notificacion</title>
    <!-- Incluimos librerias como bootstrap.css-->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/taskman.css"/>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,300,700" rel="stylesheet" type="text/css">
    <!-- Agregamos primero jQuery antes que angular es una buena practica -->
    <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular.min.js"></script>
    <script src="js/script.js"></script>
    <script language="javascript" type="text/javascript">
    function salir(){

    }
    </script>
</head>
<body>
    <div class="container">
        <hr>
        <?php
        // Si existe el usuario conectado oculta div para iniciar sesion
        if(!isset($_SESSION['usuario'])){
        ?>
            <div class="span5" ng-controller="loginCtrl">
                <form>
                    <label>Usuario</label>
                    <input type="text" ng-model="usuario">
                    <br />
                    <label>Contraseña</label>
                    <input type="password" ng-model="contrasena">
                    <br />
                    <input type="submit" value="entrar" ng-click="doLogin()" class="btn btn-primary">
                    <div>{{aviso}}</div>
                </form>
            </div>
        <?php }
        if(!isset($_SESSION['usuario'])){ ?>
            <div class="span1" ng-hide="true">
        <?php }
        else {
            include 'php/includ.php';
        ?>
            <div class="span1" ng-hide="false">
        <?php }?>
                <b>Bienvenido</b><input type="button" value="Salir" onclick="<?php //salir();?>">
                <br>Usuario: {{aviso}}<?php if(isset($_SESSION['usuario'])) echo $_SESSION['usuario']; ?>
                <div class="message_box" id="message_box"></div>
                <div ng-include src="'partials/task.html'"></div>
            </div>
   </div>
 </body>
</html>