<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\
include_once realpath('../../facade/PeriodoFacade.php');

$fecha_ini = $_POST['idInicioP'];
$fecha_fin = $_POST['idFinalP'];
$Indicador_id = $_POST['idIndicador'];//respuesta insert anterior
$indicador = new Indicador();
$indicador->setId($Indicador_id);
$cantidad = $_POST['idCantidad'];
$amarillo = $_POST['idMeta'];
$verde = $_POST['idVerde'];
$rojo = $_POST['idRojo'];
PeriodoFacade::insert($fecha_ini,  $fecha_fin,  $verde,  $indicador,  $cantidad, $amarillo, $rojo);
echo "true";

//That´s all folks!
