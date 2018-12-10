<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\
include_once realpath('../../facade/EntradaFacade.php');

$id = null;
$nombre = $_POST['nomb'];
$descripcion = $_POST['dscrp'];
$Periodo_id = $_POST['periodo'];
$periodo= new Periodo();
$periodo->setId($Periodo_id);
EntradaFacade::insert($id, $nombre, $descripcion, $periodo);
echo "true";

//That´s all folks!