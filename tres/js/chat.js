debugger;
var sock = new SockJS('http://localhost:8080/Angular-WebSocket/tres/index');
function ChatCtrl($scope) {
	debugger;
  $scope.messages = [];
  $scope.sendMessage = function() {
    sock.send($scope.messageText);
    $scope.messageText = "";
  };

  sock.onmessage = function(e) {
    $scope.messages.push(e.data);
    $scope.$apply();
  };
}