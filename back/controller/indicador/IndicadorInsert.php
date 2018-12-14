<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Les traigo amor  \\
include_once realpath('../../facade/IndicadorFacade.php');

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripción = $_POST['descripción'];
$imagen = $_POST['imagen'];
$Indicador_id = $_POST['padre'];
$indicador= new Indicador();
$indicador->setId($Indicador_id);
IndicadorFacade::insert($id, $nombre, $descripción, $imagen, $indicador);
echo "true";

//That´s all folks!