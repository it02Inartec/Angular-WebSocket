<?php
    include 'ChromePhp.php';

    // Incluimos la conexión a la base de datos
    include_once('ez_sql_core.php');
    include_once ('ez_sql_mysql.php');
    $db = new ezSQL_mysql("root", "123","usuario","localhost");

    // Creamos el query para darle un select a la bd
    $query = "SELECT usuario, contrasena FROM  tbl_datos";
    $result = $db->query($query) or die($db->error.__LINE__);

    $arr = array();
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $arr[] = $row;
        }
    }
    /*
    $rs = $db->get_row($query);
    ChromePhp::log($rs);
    if($rs!=null){
        $usuario2    = $rs->usuario;
        $contrasena2 = $rs->contrasena;
    }*/

    # JSON-encode the response
    echo $json_response = json_encode($arr);
?>