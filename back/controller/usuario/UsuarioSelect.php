<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Muerte a todos los humanos!  \\
include_once realpath('../../facade/UsuarioFacade.php');

$username = $_POST['id'];
$Usuario = UsuarioFacade::select($username);
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
	$msg="{\"msg\":\"MANEJO DE EXCEPCIONES AQUÍ\"}";
	$rta="{\"result\":\"No se encontraron registros.\"}";	
}
echo "[{$msg},{$rta}]";
