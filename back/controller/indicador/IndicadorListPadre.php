<?php

include_once realpath('../../facade/IndicadorFacade.php');

$padre = $_POST['padre'];
$list=IndicadorFacade::listAllByFather($padre);
$rta="";
foreach ($list as $obj => $Indicador) {	
	$rta.="{
 	    \"id\":\"{$Indicador->getid()}\",
	    \"nombre\":\"{$Indicador->getnombre()}\",
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