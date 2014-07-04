<?php
    include 'ChromePhp.php';
    ChromePhp::log('llego a includ.php!');
	$colours = array('007AFF','FF7000','FF7000','15E25F','CFC700','CFC700','CF1100','CF00BE','F00');
	$user_colour = array_rand($colours);
?>
<script language="javascript" type="text/javascript">
	$(document).ready(function(){

		//codigo agregado por Lorenzo Antonio
		$('#message').focus();

		// crea un nuevo objeto WebSocket.
		var wsUri = "ws://localhost:8080/websockets/php/server.php";
		websocket = new WebSocket(wsUri);

		websocket.onopen = function(ev) { // conexión está abierta
			//$('#message_box').append("<div class=\"system_msg\">Bienvenido!<br /></div>"); // notificar al usuario
		}

		//#### Mensaje recibido desde el servidor?
		websocket.onmessage = function(ev) {
			if(ev.data!=""){
				var msg = JSON.parse(ev.data); // PHP envía datos Json
			}
			else{
				return false;
			}

			var type = msg.type; // tipo de mensaje
			var umsg = msg.message; // texto del mensaje
			var uname = msg.name; // nombre de usuario
			var ucolor = msg.color; // color

			if(type == 'usermsg'){
				$('#message_box').append("<div><span class=\"user_name\" style=\"color:#"+ucolor+"\">"+uname+"</span> : <span class=\"user_message\">"+umsg+"</span></div>");
			}

			if(type == 'system'){
				$('#message_box').append("<div class=\"system_msg\">"+umsg+"</div>");
			}

			$('#message').val(''); // restablecer el texto
		};

		websocket.onerror	= function(ev){$('#message_box').append("<div class=\"system_error\">Error - "+ev.data+"</div>");};
		websocket.onclose 	= function(ev){$('#message_box').append("<div class=\"system_msg\">Conexion Cerrada</div>");};
	});

	//codigo agregado por Lorenzo Antonio
	function validateEnter(e) {
		var key=e.keyCode || e.which;
		if (key==13){ $('#send-btn').click() }
	}
</script>