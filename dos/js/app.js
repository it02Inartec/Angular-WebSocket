    angular.module('chat', ['ngAnimate', 'angular-websocket'])
    .config(function(WebSocketProvider) {
      WebSocketProvider
        .prefix('')
        .uri('ws://echo.websocket.org/');
        //.uri('ws://echo.websocket.org/');
    })
    .controller('MessengerCtrl', function($scope, MessagesService, TestWebSocket, WebSocket) {
      $scope.messages = MessagesService.get();
      $scope.status = TestWebSocket.status();

      WebSocket.onmessage(function(event) {
        console.log('mensaje: ', event.data);
      });
      WebSocket.onclose(function() {
        console.log('conexión cerrada');
      });
      WebSocket.onopen(function() {
        console.log('conexión abierta');
        WebSocket.send('Hello World').send(' otra vez').send(' y otra vez');
      });
      setTimeout(function() {
        WebSocket.close();
      }, 500)

    })
    .factory('MessagesService', function($q) {
      var _messages = [
        {
          text: 'mensaje de prueba',
          created_at: new Date()
        }
      ];

      return {
        sync: function() {
          var dfd = $q.defer();
          dfd.resolve(_messages)
          return dfd.promise;
        },
        get: function() {
          return _messages;
        },
        create: function(message) {
          message
        }
      } // end return
    })
    .factory('TestWebSocket',function() {
      var _status = ['DESCONECTADO', 'CONECTADO'];
      var _currentStatus = 0;
      var ws;
      return {
        status: function(url) {
          return _status[_currentStatus];
        },
        new: function(wsUri) {
          ws = new WebSocket(wsUri);
          return ws;
        },
        on: function(event, callback) {
          ws['on'+event.toLowerCase()] = callback;
        },
        onopen: function(callback) {
          ws.onopen = callback;
        },
        onmessage: function(event) {
          ws.onmessage
        },
        onclose: function() {

        },
        send: function() {

        }
      }
    })

    var wsUri = "ws://echo.websocket.org/";

    var output;

    function init() {
      output = document.getElementById("output");
      testWebSocket();
    }

    function onOpen(evt) {
      writeToScreen("CONECTADO");
      doSend("WebSocket rocks");
    }
    function onClose(evt) {
      writeToScreen("DESCONECTADO");
    }
    function onMessage(evt) {
      writeToScreen('<span style="color: blue;">RESPUESTA: ' + evt.data+'</span>');
      websocket.close();
    }
    function onError(evt) {
      writeToScreen('<span style="color: red;">ERROR:</span> ' + evt.data);
    }
    function doSend(message) {
      writeToScreen("SENT: " + message);
      websocket.send(message);
    }
    function writeToScreen(message) {
      var pre = document.createElement("p"); pre.style.wordWrap = "break-word";
      pre.innerHTML = message; output.appendChild(pre);
    }

    function testWebSocket() {
      websocket = new WebSocket(wsUri);
      websocket.onopen = function(evt) {
        onOpen(evt)
      };
      websocket.onclose = function(evt) {
        onClose(evt)
      };
      websocket.onmessage = function(evt) {
        onMessage(evt)
      };
      websocket.onerror = function(evt) {
        onError(evt)
      };
    }

    window.addEventListener("load", init, false);