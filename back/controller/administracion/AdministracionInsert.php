<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...con el mayor de los disgustos, el benévolo señor Arciniegas.  \\
include_once realpath('../../facade/AdministracionFacade.php');

$id = $_POST['id'];
$colorP = $_POST['colorP'];
$colorS = $_POST['colorS'];
$logo = $_POST['logo'];
$nombre = $_POST['nombre'];
AdministracionFacade::insert($id, $colorP, $colorS, $logo, $nombre);
echo "true";

//That´s all folks!