<?php
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

$id= $_POST['id'];
$nombre= $_POST['nombre'];

if(empty($_POST['imagen'])){
    $imagen = "https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2022/05/12/16523487412472.jpg";
}else{
    $imagen = $_POST['imagen'];
}

if(empty($_POST['fecha_lanzamiento'])){
    $fecha = NULL;
}else{
    $fecha = $_POST['fecha_lanzamiento'];
}

$sql_statement="UPDATE album SET nombre=$2,imagen=$3,fecha_lanzamiento=$4 WHERE id=$1";
$result = pg_query_params($dbconn, $sql_statement, array($id,$nombre,$imagen,$fecha));

if ($result){
    header("Location: ../html/crud_album.html");
} else {
    echo pg_last_error($dbconn);
}


?>