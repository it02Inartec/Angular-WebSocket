// Definir un módulo angular de nuestra aplicación
var app = angular.module('AppRegister', []);

app.controller('TareasControlador', function($scope, $http){

	// Funcion que permite insertar en BD un "nuevo usuario"
	$scope.addUser = function (nombre, apellido,usuario,contrasena) {
		debugger;
		$http.post("php/addUser.php?nombre="+nombre+"&apellido="+apellido+"&usuario="+usuario+"&contrasena="+contrasena).success(function(data){
			// Envio data en variable "tareas"
			$scope.tareas = usuario;

			// Limpio los campos del formulario
			$scope.nombre = "",	$scope.apellido = "", $scope.usuario = "", $scope.contrasena = "";
    	});
  };

});
