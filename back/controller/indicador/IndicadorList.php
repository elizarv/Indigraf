<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Cuando la gente cree que está muriendo, te escucha en lugar de esperar su turno para hablar.  \\
include_once realpath('../../facade/IndicadorFacade.php');
include_once realpath('../../facade/PeriodoFacade.php');

$list=IndicadorFacade::listAll();
$rta="";
foreach ($list as $obj => $Indicador) {	
	$periodos=PeriodoFacade::listByIndicador($Indicador);
	$periodo=$periodos[count($periodos)-1];
	$color="red";	
    if($periodo->getCantidad()>$periodo->getRojo()){ //recuerde que el amarillo es la meta
        $color="yellow";
    }
    if($periodo->getCantidad()>$periodo->getVerde()){ //no pregunte, sólo gócelo
        $color="green";
    }
	$rta.="{
 	    \"id\":\"{$Indicador->getid()}\",
	    \"nombre\":\"{$Indicador->getnombre()}\",
	    \"descripcion\":\"{$Indicador->getdescripcion()}\",
	    \"imagen\":\"{$Indicador->getimagen()}\",
	    \"padre_id\":\"{$Indicador->getpadre()->getid()}\",
	    \"color\":\"{$color}\"
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