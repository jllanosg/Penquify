<?php
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
session_start();
#Agregar cancion

if (isset ($_POST['save_task'])){

    // parametros del usuario
    $nombre = $_POST['title'];
    
    if (!isset($_POST['letra'])){
        $letra = NULL;
    }else{
        $letra = $_POST['letra'];
    }

    if(empty($_POST['fecha'])){
        $fecha = NULL;
    }else{
        $fecha = $_POST['fecha'];
    }
    
    if (!isset($_POST['id_album'])){
        $id_album = 0;
    }else{
        $id_album = $_POST['id_album'];
    }
        
    //insert de la canción
    $sql_statement = "INSERT INTO cancion(nombre,letra,fecha_composicion) VALUES ($1,$2,$3) RETURNING id;";
    $result = pg_query_params($dbconn, $sql_statement, array($nombre,$letra,$fecha));
    if(!$result){
        echo pg_last_error($dbconn);
    }


    //read de la id de la canción
    $row = pg_fetch_row($result);
    $id_cancion = $row[0];


    //creacion fila en artista_compuso_cancion
    $sql_statement = "INSERT INTO artista_compuso_cancion(id_artista,id_cancion) VALUES ($1,$2);";
    pg_query_params($dbconn, $sql_statement, array($_SESSION["id"],$id_cancion));
    if(!$result){
        echo pg_last_error($dbconn);
    }

    // si el usuario agrego un album para la canción, se guarda
    if($id_album){
        
        //creacion fila en album_tiene_cancion
        $sql_statement = "INSERT INTO album_tiene_cancion(id_album,id_cancion) VALUES ($1,$2);";
        pg_query_params($dbconn, $sql_statement, array($id_album,$id_cancion));
    }
    

    if ($result){
        header("Location: ../html/crud_artista.html");
    } else {
        echo pg_last_error($dbconn);
    }
}
?>

