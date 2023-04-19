<?php
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

$id = $_POST["delete"];
$sql_statement="DELETE FROM cancion WHERE id = $1";
$result = pg_query_params($dbconn, $sql_statement, array($id));

if ($result){
    header("Location: ../html/crud_artista.html");
} else {
    echo pg_last_error($dbconn);
}

?>