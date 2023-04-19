<?php 
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

$result = pg_query($dbconn, "SELECT
album.nombre AS nombre_album,
join3.id_cancion AS id_cancion,
join3.nombre_artista AS nombre_artista,
join3.apellido_artista AS apellido_artista,
join3.nombre_artistico AS nombre_artistico,
join3.nombre_cancion AS nombre_cancion
FROM
album INNER JOIN (SELECT
    join2.id_cancion AS id_cancion,
    join2.nombre_artista AS nombre_artista,
      join2.apellido_artista AS apellido_artista,
    join2.nombre_artistico AS nombre_artistico,
    join2.nombre_cancion AS nombre_cancion,
    album_tiene_cancion.id_album AS id_album
FROM
    album_tiene_cancion INNER JOIN
        (SELECT
            usuario.nombre AS nombre_artista,
            usuario.apellido AS apellido_artista,
            usuario.nombre_artistico AS nombre_artistico,
            join1.id_cancion AS id_cancion,
            join1.nombre_cancion AS nombre_cancion
        FROM
                usuario INNER JOIN(SELECT
                    cancion.id AS id_cancion,
                    cancion.nombre AS nombre_cancion,
                    artista_compuso_cancion.id_artista AS id_artista
                FROM
                    cancion INNER JOIN artista_compuso_cancion
                ON
                    cancion.id = artista_compuso_cancion.id_cancion) AS join1
        ON
            usuario.id = join1.id_artista) AS join2
ON
    join2.id_cancion = album_tiene_cancion.id_cancion) AS join3
ON
album.id = join3.id_album;");

if (!$result) {
    echo pg_last_error($dbconn);
    exit;
}
$arr = pg_fetch_all($result);
foreach ($arr as $clave => $valor) {
    
    echo "<tbody>";
    echo "<tr>";

    echo ("<th>". htmlspecialchars($valor["nombre_cancion"]) ."</th>");        
    echo ("<th>". htmlspecialchars($valor["nombre_album"]) ."</th>");        
    if (isset($valor{"nombre_artistico"})){
        echo ("<th>". htmlspecialchars($valor["nombre_artistico"]) ."</th>");        
    }else{
        echo ("<th>". htmlspecialchars($valor["nombre_artista"]). " ". $valor["apellido_artista"] ."</th>");        
    }
    echo ("<th>
    <form action=\"../php/perfil_cancion.php\" method=\"post\">
    <button name=\"perfil\" type=\"submit\" class=\"btn btn-sm\" value=\"". $valor["id_cancion"] . "\">
    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"blue\" class=\"bi bi-pencil\" viewBox=\"0 0 16 16\">
    <path d=\"M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z\"></path>
    </svg>    
    </form>
    </button>
    </th>");
   
    echo "</tr>";
    echo "</tbody>";
      
}
$result = pg_query($dbconn, "SELECT
usuario.nombre AS nombre_artista,
usuario.apellido AS apellido_artista,
usuario.nombre_artistico AS nombre_artistico,
canciones.id_cancion,
canciones.nombre_cancion
FROM
usuario INNER JOIN (SELECT
canciones.id_cancion AS id_cancion,
canciones.nombre_cancion AS nombre_cancion,
artista_compuso_cancion.id_artista AS id_artista
FROM artista_compuso_cancion INNER JOIN (SELECT
    cancion.id AS id_cancion,
    cancion.nombre AS nombre_cancion
FROM
    cancion LEFT JOIN album_tiene_cancion
ON
    cancion.id = album_tiene_cancion.id_cancion
WHERE
    album_tiene_cancion.id_cancion IS null) AS canciones
ON
canciones.id_cancion = artista_compuso_cancion.id_cancion) AS canciones
ON
canciones.id_artista = usuario.id;");

if (!$result) {
    echo pg_last_error($dbconn);
    exit;
}

foreach ($arr as $clave => $valor) {
    
    echo "<tbody>";
    echo "<tr>";

    echo ("<th>". htmlspecialchars($valor["nombre_cancion"]) ."</th>");        
    echo ("<th>". "No album :(" ."</th>");        
    if (isset($valor{"nombre_artistico"})){
        echo ("<th>". htmlspecialchars($valor["nombre_artistico"]) ."</th>");        
    }else{
        echo ("<th>". htmlspecialchars($valor["nombre_artista"]). " ". $valor["apellido_artista"] ."</th>");        
    }
    echo ("<th>
    <form action=\"../php/perfil_cancion.php\" method=\"post\">
        <button name=\"perfil\" type=\"submit\" class=\"btn btn-sm\" value=\"". $valor["id_cancion"] . "\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"blue\" class=\"bi bi-pencil\" viewBox=\"0 0 16 16\">
        <path d=\"M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z\"></path>
        </svg> 
        </form>
    </button>
    </th>");
    echo "</tr>";
    echo "</tbody>";
}

$arr = pg_fetch_all($result);
?>