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
$Indicador_id = $_POST['id'];//respuesta insert anterior
$cantidad = $_POST['cantidad'];
$amarillo = $_POST['amarillo'];
$verde = $_POST['verde'];
$rojo = $_POST['rojo'];
$periodo=PeriodoFacade::selectFirst($Indicador_id);
$id=$periodo->getId();
PeriodoFacade::update($id, $fecha_ini,  $fecha_fin,  $verde,  $cantidad, $amarillo, $rojo);
echo "true";

//That´s all folks!
