<?php

include("hash_password.php");
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$email = $_POST["email"];
$password = $_POST["password"];
$password = hash_password($password);

// se define la variable normal = 0 para que se pueda 
// ingresar en la BBDD que el usuario NO es artista.
$normal = 0;

// CASO: USUARIO COMÚN
$sql_statement = "INSERT INTO usuario (nombre,apellido,email,password,es_artista) VALUES ($1,$2,$3,$4,$5)";
$result = pg_query_params($dbconn, $sql_statement, array($nombre,$apellido,$email,$password,$normal));

if ($result){
    header("Location: ../html/login.html");
} else {
    echo(pg_last_error($dbconn));
}
?>