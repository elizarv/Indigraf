<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../../facade/IndicadorFacade.php');

$nombre = $_POST['idNombre'];
$descripcion = $_POST['idDescripcion'];
$imagen = $_POST['idImagen'];
$padre = $_POST['idPadre'];
$indicador= new Indicador();
$indicador->setId($padre);
IndicadorFacade::insert($nombre, $descripcion, $imagen, $indicador);
echo "true";

//That´s all folks!
