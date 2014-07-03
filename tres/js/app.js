debugger;
var http = require('http');
var sockjs = require('sockjs');
var connections = [];

var chat = sockjs.createServer();
chat.on('connection', function(conn) {
    debugger;
    connections.push(conn);
    var number = connections.length;
    conn.write("Bienvenido, Usuario " + number);
    conn.on('data', function(message) {
        for (var ii=0; ii < connections.length; ii++) {
            connections[ii].write("Usuario " + number + " dice: " + message);
        }
    });
    conn.on('close', function() {
        debugger;
        for (var ii=0; ii < connections.length; ii++) {
            connections[ii].write("Usuario " + number + " se ha desconectado");
        }
    });
});

var server = http.createServer();
chat.installHandlers(server, {prefix:'/chat'});
server.listen(9999, '0.0.0.0');