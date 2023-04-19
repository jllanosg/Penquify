<?php
require("hash_password.php");
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

$email = $_POST["email"];
$password = $_POST["password"];

// Obtenemos la contraseña hasheada del usuario de la BD.
$sql_statement = "SELECT password,es_artista,nombre,apellido,suscripcion_activa,nombre_artistico,verificado,id FROM usuario WHERE email = $1;";
$result = pg_query_params($dbconn, $sql_statement, array($email));
if (!$result){
    header("Location: ../html/login.html");
    exit("Usuario no encontrado.");
}
$row = pg_fetch_row($result);

$contraseña = $row[0];

if (password_verify($password, $contraseña)) {
    session_start();
    $_SESSION["email"] = $email;

    // Guardando datos generales para $_SESSION
    $es_artista = $row[1];
    $_SESSION["id"] = $row[7];

    //es artista o no
    if($es_artista=="t") {
        $_SESSION["es_artista"]=true;
    }else{
        $_SESSION["es_artista"]=false;
    }
    

    // como el apellido no es NOT NULL, se consideran ambos casos: usuario con y sin apellido.
    if($row[3]){
        $nombre_completo = $row[2] . " " . $row[3];
        
    }else{
        $nombre_completo = $row[2];
    }

    $_SESSION["nombre"] = $nombre_completo;


    if ($es_artista=="t"){
        //guardar datos de sesión para artista

            //nombre artistico
        if($row[5]){
            $nombre_artistico = $row[5];
            $_SESSION["nombre_artistico"] = $nombre_artistico;
        }

            //verificado
        $verificado = $row[6];
        
        
        if($verificado == "t"){
            $_SESSION["verificado"] = true;
        }else{
            $_SESSION["verificado"] = false;
        }
        
    }else{
        //guardar datos de sesión para usuario comun
        $sus = $row[4];
        if($sus == "t"){
            $_SESSION["sus"] = true;
        }else{
            $_SESSION["sus"] = false;
        }
        
    }

    header("Location: ../html/frontpage.html");
    exit("Inicio de sesión correcto!");
}
// Login incorrecto
header("Location: ../html/login.html");
?>
