<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Eres capaz de hackear mi Facebook?  \\
include_once realpath('../../facade/PeriodoFacade.php');

$id=$_POST['id'];
$periodo=PeriodoFacade::selectFirst($id);
$rta="";
	$rta="{
	    \"id\":\"{$periodo->getid()}\",
			\"indicador\":\"{$periodo->getindicador()}\",
			\"amarillo\":\"{$periodo->getamarillo()}\",
			\"verde\":\"{$periodo->getverde()}\",
			\"rojo\":\"{$periodo->getrojo()}\",
			\"fecha_ini\":\"{$periodo->getfecha_ini()}\",
			\"fecha_fin\":\"{$periodo->getfecha_fin()}\",
			\"cantidad\":\"{$periodo->getcantidad()}\"
	},";


if($rta!=""){
	$rta = substr($rta, 0, -1);
	$msg="{\"msg\":\"exito\"}";
}else{
	$msg="{\"msg\":\"exito\"}";
	//$msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";
}
echo "[{$msg},{$rta}]";
