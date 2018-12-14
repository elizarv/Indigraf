<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Tranquilo, yo tampoco entiendo cómo funciona mi código  \\
include_once realpath('../../facade/ArchivoFacade.php');

$id = $_POST['id'];
$url = $_POST['url'];
$Usuario_username = $_POST['subidoPor'];
$usuario= new Usuario();
$usuario->setUsername($Usuario_username);
$fechaSubida = $_POST['fechaSubida'];
$descripcion = $_POST['descripcion'];
$Periodo_id = $_POST['periodo'];
$periodo= new Periodo();
$periodo->setId($Periodo_id);
ArchivoFacade::insert($id, $url, $usuario, $fechaSubida, $descripcion, $periodo);
echo "true";

//That´s all folks!