<?php
include_once realpath('../../facade/IndicadorFacade.php');

$id = $_POST['id'];
$Indicador=IndicadorFacade::select($id);
$rta="";

	$rta.="{
 	    \"id\":\"{$Indicador->getid()}\",
	    \"nombre\":\"{$Indicador->getnombre()}\",
	    \"imagen\":\"{$Indicador->getimagen()}\",
	    \"padre_id\":\"{$Indicador->getpadre()->getid()}\",
			\"esPadre\":\"{$Indicador->getEsPadre()}\"
	},";


if($rta!=""){
	$rta = substr($rta, 0, -1);
	$msg="{\"msg\":\"exito\"}";
}else{
	$msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";
}
echo "[{$msg},{$rta}]";
