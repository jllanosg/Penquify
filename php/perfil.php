<?php
session_start();

$nombre = $_SESSION["nombre"];
$es_artista = $_SESSION["es_artista"];


if ($es_artista){
    if(isset($_SESSION["nombre_artistico"])){
        $nombre_artistico = "<p class=\"card-text lead\">". $_SESSION["nombre_artistico"] ."</p>";
    }else{
        $nombre_artistico="";
    }
    $verificado = $_SESSION["verificado"];
    if ($verificado){
        $ver = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-patch-check\" viewBox=\"0 0 16 16\">
        <path fill-rule=\"evenodd\" d=\"M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z\"/>
        <path d=\"m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z\"/>
      </svg>";
    }else{
        $ver = "";
    }

    $perfil = "<div class=\"d-flex justify-content-center\">
    <div class=\"card text-center m-5 \" style=\"width: 300px;\">
    <i class=\"bi bi-patch-check\"></i>
        <div class=\"card-header\">
            " . $ver ." " . $nombre . "
            </div>
        <div class=\"card-body\">
            <h5 class=\"card-title\">" . $nombre_artistico ."</h5>
            ". $_SESSION["email"] /* el nombre artistico solo se coloca si existe. */ ."            
            </div>
                <div class=\"card-footer text-muted m-2\">
                <a href=\"../html/crud_artista.html\" class=\"btn btn-primary m-2\">Editar canciones</a>
                <a href=\"../html/crud_album.html\" class=\"btn btn-primary m-2\">Editar albumes</a>
                </div>
            </div>
            </div>";
}else{
    //sus
    $sus = $_SESSION["sus"];
    if ($sus){
        $suscripcion_activa = "Tu suscripción está altamente activa";
    }else{
        
        $suscripcion_activa = "Su suscripción no está activa. Por favor, pague, las gracias no me quitan el hambre.";
    }
    $perfil ="<div class=\"d-flex justify-content-center\">
    <div class=\"card text-center m-5 \" style=\"width: 300px;\">
        <div class=\"card-header\">
            " .  $nombre . "
        </div>
        <div class=\"card-body\">
            <div class\"row\">
            <h5 class=\"card-title\">" . $_SESSION["email"] ."</h5>
            Son las 1:27 AM del Sábado 28 de mayo del 2022. Me tomé un café y por consecuencia no pude dormir, 
            por lo que tomé la decisión de avanzar la tarea. Si esta está especialmente mal hecha, este es uno de los motivos... XD, gracias a cenco*** por hacerme trabajar hasta tan tarde
            </div>
            <div class\"row\">
            <a href=\"../html/canciones.html\" class=\"btn btn-primary m-2\">Ver canciones</a>
            </div>
            </div>
            <div class=\"card-footer text-muted\">
                    " . $suscripcion_activa ."
                </div>
            </div>
            </div>";
}





?>