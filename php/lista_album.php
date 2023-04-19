<?php
include $_SERVER['DOCUMENT_ROOT'].'/db_config.php';

$result = pg_query($dbconn, "SELECT id,nombre,imagen,fecha_lanzamiento FROM album");

if (!$result) {
    echo pg_last_error($dbconn);
    exit;
}

$arr = pg_fetch_all($result);

foreach ($arr as $clave => $valor) {
    $flag=false;
    $flag2=true;
    echo "<tbody>";
    echo "<tr>";

    echo ("<th>". htmlspecialchars($valor["id"]) ."</th>");        
    echo ("<th>". htmlspecialchars($valor["nombre"]) ."</th>");        
    echo ("<th> <img src=" . htmlspecialchars($valor["imagen"]) . " style=\"width: 200px; height:200px\"></th>");        
    echo ("<th>". htmlspecialchars($valor["fecha_lanzamiento"]) ."</th>");
    
    /*
    se agregan botones para borrar la canción o editarla.
    nótese que el valor (value) del botón por defecto es la id de la canción,
    enviandose así hacia el action del form.
    */
    
    echo ("<th>
    
    <form action=\"../php/borrar_album.php\" method=\"post\">
        <button name=\"delete\" type=\"submit\" class=\"btn btn-sm\" value=\"". $valor["id"] . "\">
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"red\" class=\"bi bi-trash\" viewBox=\"0 0 16 16\">
            <path d=\"M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z\"></path>
            <path fill-rule=\"evenodd\" d=\"M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z\"></path>
            </svg>
        </form>
    </button>
    </th>");        

    echo "</tr>";
    echo "</tbody>";
}

?>