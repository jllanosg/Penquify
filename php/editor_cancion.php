<?php
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

$id_cancion= $_POST['id_cancion'];
$id_album= $_POST['id_album'];
$nombre= $_POST['title'];
$letra= $_POST['letra'];
if(empty($_POST['fecha'])){
    $fecha = NULL;
}else{
    $fecha = $_POST['fecha'];
}

$sql_statement="UPDATE cancion SET nombre=$2,imagen=$3,fecha_composicion=$4 WHERE id=$1";
$result = pg_query_params($dbconn, $sql_statement, array($id_cancion,$nombre,$imagen,$fecha));

if ($result){
    header("Location: ../html/crud_album.html");
} else {
    echo pg_last_error($dbconn);
}


?>