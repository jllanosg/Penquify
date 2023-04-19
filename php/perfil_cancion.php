<?php

session_start();
$id = $_POST["perfil"];
$_SESSION["cancion"] = $id;

header("Location: ../html/perfil_cancion.html");


?>