//Define an angular module for our app
var app = angular.module('myApp', []);

app.controller('tasksController', function($scope, $http) {

  getTask(); // Cargar todas las tareas disponibles en BD

  function getTask(){  
  $http.post("ajax/getTask.php").success(function(data){
        $scope.tasks = data;
       });
  };

  $scope.addTask = function (task) {
    $http.post("ajax/addTask.php?task="+task).success(function(data){
        getTask();
        $scope.taskInput = "";
      });
  };
  
  $scope.deleteTask = function (task) {
    if(confirm("Esta seguro que desea eliminar esta linea?")){
    $http.post("ajax/deleteTask.php?taskID="+task).success(function(data){
        getTask();
      });
    }
  };

  $scope.toggleStatus = function(item, status, task) {
    if(status=='2'){status='0';}else{status='2';}
      $http.post("ajax/updateTask.php?taskID="+item+"&status="+status).success(function(data){
        getTask();
      });
  };

});
