<?php
    include 'ChromePhp.php';
    ChromePhp::log('llego a formulario.php!');
    //ChromePhp::log($_SERVER);
    //ChromePhp::warn('something went wrong!');

    // Incluimos la conexión a la base de datos
    include_once('ez_sql_core.php');
    include_once ('ez_sql_mysql.php');
    $db = new ezSQL_mysql("root", "123","usuario","localhost");
    //$db = mysqli_connect('localhost', 'root', '123', 'usuario');
    //$db = new mysqli('localhost', 'root', '123', 'usuario');

    // Iniciamos session
    session_start();

    // creamos una funcion para simular el $_POST
    function getPost(){
        $request = file_get_contents('php://input');
        return json_decode($request,true);
    }

    //    Declaramos las variables con los resultados que llegaron
    //    mediante request simulando el $_POST

    $getPost    = getPost();
    $usuario    = $getPost['usuario'];
    $contrasena = $getPost['contrasena'];

    // Creamos el query para darle un select a la bd
    $query = "SELECT usuario, contrasena FROM  tbl_datos WHERE usuario = '".$usuario."' AND contrasena = '".$contrasena."'";

    // Ejecutamos el query  y obtenemos el resultado de este mismo
    $rs         = $db->get_row($query);
    if($rs!=null){
        $usuario2    = $rs->usuario;
        $contrasena2 = $rs->contrasena;
    }

    // checamos si $usuario y $contrasena existen si si existen creamos las
    // sessiones correspondientes

    if (!empty($usuario2) && !empty($contrasena2) ){
        echo $_SESSION['usuario']    = $usuario2;
        $_SESSION['contrasena'] = $contrasena2;
    }
    elseif (empty($usuario2) && empty($contrasena2)) {
        echo "";
        $_SESSION = array();
        //session_destroy();
     }
     else {
        echo "FALSE";
    }
?>