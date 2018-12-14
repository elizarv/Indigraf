<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\
include_once realpath('../../facade/IndicadorFacade.php');

$list=IndicadorFacade::listAll();
$rta="";
foreach ($list as $obj => $Indicador) {	
	$rta.="{
 	    \"id\":\"{$Indicador->getid()}\",
	    \"nombre\":\"{$Indicador->getnombre()}\",
	    \"descripción\":\"{$Indicador->getdescripción()}\",
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