<?php
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

# Poner el album

if (isset ($_POST['save_task'])){
    $nombre = $_POST['nombre'];


    if(empty($_POST['fecha_lanzamiento'])){
        $fecha = NULL;
    }else{
        $fecha = $_POST['fecha_lanzamiento'];
    }


    if(empty($_POST['imagen'])){
        $imagen = "https://e00-elmundo.uecdn.es/assets/multimedia/imagenes/2022/05/12/16523487412472.jpg";
    }else{
        $imagen = $_POST['imagen'];
    }
}

    // Metemos el album
    $sql_statement = "INSERT INTO album(nombre,imagen,fecha_lanzamiento) VALUES ($1,$2,$3);";
    $result = pg_query_params($dbconn, $sql_statement, array($nombre,$imagen,$fecha));

    
    if ($result){
        header("Location: ../html/crud_album.html");
    } else {
        echo pg_last_error($dbconn);
    }
?>