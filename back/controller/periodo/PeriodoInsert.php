<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\
include_once realpath('../../facade/PeriodoFacade.php');

$fecha_ini = $_POST['fecha_ini'];
$fecha_fin = $_POST['fecha_fin'];
$meta = $_POST['meta'];
$Indicador_id = $_POST['indicador'];
$indicador= new Indicador();
$indicador->setId($Indicador_id);
$id = $_POST['id'];
$cantidad = $_POST['cantidad'];
PeriodoFacade::insert($fecha_ini, $fecha_fin, $meta, $indicador, $id, $cantidad);
echo "true";

//That´s all folks!