<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../../facade/IndicadorFacade.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];
$Indicador_id = $_POST['padre'];
$indicador= new Indicador();
$indicador->setId($Indicador_id);
IndicadorFacade::insert($id, $nombre, $descripcion, $imagen, $indicador);
echo "true";

//That´s all folks!