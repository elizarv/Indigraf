<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\
include_once realpath('../../facade/IndicadorFacade.php');

$list=IndicadorFacade::listAll();
$rta="";
foreach ($list as $obj => $Indicador) {	
	$rta.="{
 	    \"id\":\"{$Indicador->getid()}\",
	    \"nombre\":\"{$Indicador->getnombre()}\",
	    \"descripcion\":\"{$Indicador->getdescripcion()}\",
	    \"imagen\":\"{$Indicador->getimagen()}\",
	    \"padre_id\":\"{$Indicador->getpadre()->getid()}\"
	},";
}

if($rta!=""){
	$rta = substr($rta, 0, -1);
	$msg="{\"msg\":\"exito\"}";
}else{
	$msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";	
}
echo "[{$msg},{$rta}]";

//That´s all folks!