<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No hay de qué so no más de papa  \\
include_once realpath('../../facade/RelacionFacade.php');

$Indicador_id = $_POST['predecesor'];
$indicador= new Indicador();
$indicador->setId($Indicador_id);
$Indicador_id = $_POST['sucesor'];
$indicador= new Indicador();
$indicador->setId($Indicador_id);
RelacionFacade::insert($indicador, $indicador);
echo "true";

//That´s all folks!