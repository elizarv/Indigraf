<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Error 404: Frase no encontrada  \\
include_once realpath('../../facade/EntradaFacade.php');

$entrada=EntradaFacade::select();

$list=ArchivoFacade::listByEntrada($entrada);
$listadoArchivos="[";
foreach ($list as $obj => $Archivo) {	
	$listadoArchivos.="{
	    \"url\":\"{$Archivo->geturl()}\",
	    \"subidoPor\":\"{$Archivo->getsubidoPor()->getusername()}\",
	    \"fechaSubida\":\"{$Archivo->getfechaSubida()}\",
	    \"descripcion\":\"{$Archivo->getdescripcion()}\"
	},";
}
if($listadoArchivos!=""){
	$listadoArchivos = substr($listadoArchivos, 0, -1);
}
$listadoArchivos="]";

$rta="{
 	    \"idEntrada\":\"{$entrada->getid()}\",
	    \"nombre\":\"{$entrada->getnombre()}\",
	    \"descripcion\":\"{$entrada->getdescripcion()}\",
	    \"listadoArchivos\":\"{$listadoArchivos}\"
	}";

$msg="{\"msg\":\"exito\"}";
echo "[{$msg},{$rta}]";

//That´s all folks!