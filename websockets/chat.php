<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8' />
	<link rel="stylesheet" href="css/estilo.css" type="text/css" />
	<script src="js/jquery.min.js"></script>
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>-->
</head>
<body>
<?php include 'php/includ.php'; ?>
	<div class="chat_wrapper">
		<div class="message_box" id="message_box"></div>
		<div class="panel">
			<input type="text" name="name" id="name" value="<?php $numerodado = rand(1,1000); echo "Anon".$numerodado; ?>" maxlength="10" style="width:20%"  />
			<input type="text" name="message" onkeyup="validateEnter(event)" id="message" placeholder="Tu Mensaje" maxlength="80" style="width:60%" />
			<button id="send-btn">Enviar</button>
		</div>
	</div>
</body>
</html>