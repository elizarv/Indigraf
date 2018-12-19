<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Muerte a todos los humanos!  \\
include_once realpath('../../facade/UsuarioFacade.php');

session_start();    
$Usuario=unserialize($_SESSION["usuario"]);
$rta = "";
$rta.="{
    \"username\":\"{$Usuario->getusername()}\",
   \"password\":\"{$Usuario->getpassword()}\",
   \"nombre\":\"{$Usuario->getnombre()}\",
   \"tipo\":\"{$Usuario->gettipo()}\"
},";
if($rta!=""){
	$rta = substr($rta, 0, -1);
	$msg="{\"msg\":\"exito\"}";
}else{
	$msg="{\"msg\":\"exito\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";	
}
echo "[{$msg},{$rta}]";
