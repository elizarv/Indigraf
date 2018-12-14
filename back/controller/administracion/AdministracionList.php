<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cansado de escribir bugs? tranquilo, los escribimos por ti  \\
include_once realpath('../../facade/AdministracionFacade.php');

$list=AdministracionFacade::listAll();
$rta="";
foreach ($list as $obj => $Administracion) {	
	$rta.="{
 	    \"id\":\"{$Administracion->getid()}\",
	    \"colorP\":\"{$Administracion->getcolorP()}\",
	    \"colorS\":\"{$Administracion->getcolorS()}\",
	    \"logo\":\"{$Administracion->getlogo()}\",
	    \"nombre\":\"{$Administracion->getnombre()}\"
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