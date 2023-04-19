<?php

include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';
session_start();

$id_cancion = $_SESSION["cancion"];
$query="SELECT
join3.nombre_artista AS nombre_artista ,
join3.apellido_artista  as apellido_artista,
join3.nombre_artistico_artista AS nombre_artistico_artista,
join3.nombre_cancion as nombre_cancion,
join3.letra_cancion as letra_cancion,
album.nombre as nombre_album
FROM

album INNER JOIN(SELECT
join2.nombre_artista AS nombre_artista ,
join2.apellido_artista  as apellido_artista,
join2.nombre_artistico_artista AS nombre_artistico_artista,
join2.id_cancion as id_cancion,
join2.nombre_cancion as nombre_cancion,
join2.letra_cancion as letra_cancion,
album_tiene_cancion.id_album as id_album
FROM
album_tiene_cancion INNER JOIN (SELECT
    usuario.nombre AS nombre_artista,
    usuario.apellido as apellido_artista,
    usuario.nombre_artistico AS nombre_artistico_artista,
    join1.id_cancion as id_cancion,
    join1.nombre_cancion as nombre_cancion,
    join1.letra_cancion as letra_cancion

FROM
    usuario INNER JOIN (SELECT
    cancion.id AS id_cancion,
    cancion.nombre AS nombre_cancion,
    cancion.letra AS letra_cancion,
    artista_compuso_cancion.id_artista AS id_artista
FROM
artista_compuso_cancion INNER JOIN(SELECT
    *
FROM
    cancion
WHERE
    id = ". $id_cancion .") AS cancion
ON
    cancion.id = artista_compuso_cancion.id_cancion) as join1
ON
    usuario.id = join1.id_artista) AS join2
ON
album_tiene_cancion.id_cancion = join2.id_cancion) as join3
on
album.id = join3.id_album;";
$result = pg_query($dbconn, $query);
$row = pg_fetch_row($result);
echo "<div class=\"card-header\">" . $row[0] . " " . $row[1] . " " . $row[2]. "</div>";
echo "<div class=\"card-body\"> <p class=\"text-center fs-2\">" . $row[3] . "</p> ";
echo "<p class=\"text-center fs-3\">" . $row[4] . "</p>";
echo "<p class=\"text-center fs-2\">" . $row[5] . "</p> </div>";


?>