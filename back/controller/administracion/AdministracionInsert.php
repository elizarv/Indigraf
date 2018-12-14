<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿En serio? ¿Tantos buenos frameworks y estás usando Anarchy?  \\
include_once realpath('../../facade/AdministracionFacade.php');

$id = $_POST['id'];
$colorP = $_POST['colorP'];
$colorS = $_POST['colorS'];
$logo = $_POST['logo'];
$nombre = $_POST['nombre'];
AdministracionFacade::insert($id, $colorP, $colorS, $logo, $nombre);
echo "true";

//That´s all folks!