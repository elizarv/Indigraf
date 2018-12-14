<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Vine a Comala porque me dijeron que acá vivía mi padre, un tal Pedro Páramo.  \\
include_once realpath('../../facade/UsuarioFacade.php');

$list=UsuarioFacade::listAll();
$rta="";
foreach ($list as $obj => $Usuario) {	
	$rta.="{
 	    \"username\":\"{$Usuario->getusername()}\",
	    \"password\":\"{$Usuario->getpassword()}\",
	    \"nombre\":\"{$Usuario->getnombre()}\",
	    \"tipo\":\"{$Usuario->gettipo()}\"
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