<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    NEVERMORE  \\
include_once realpath('../../facade/PeriodoFacade.php');

$fecha_ini = $_POST['fecha_ini'];
$fecha_fin = $_POST['fecha_fin'];
$meta = $_POST['meta'];
$Indicador_id = $_POST['indicador'];
$indicador= new Indicador();
$indicador->setId($Indicador_id);
$id = $_POST['id'];
PeriodoFacade::insert($fecha_ini, $fecha_fin, $meta, $indicador, $id);
echo "true";

//That´s all folks!