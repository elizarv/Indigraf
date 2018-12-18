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
$indicador = new Indicador();
$indicador->setId($Indicador_id);
$cantidad = $_POST['cantidad'];
$amarillo = $_POST['amarillo'];
$verde = $_POST['verde'];
$rojo = $_POST['rojo'];
PeriodoFacade::insert($fecha_ini,  $fecha_fin,  $verde,  $indicador,  $cantidad, $amarillo, $rojo);
echo "true";

//That´s all folks!
