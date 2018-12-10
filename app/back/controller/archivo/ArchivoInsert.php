<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\
include_once realpath('../../facade/ArchivoFacade.php');

$id = $_POST['id'];
$url = $_POST['url'];
$Entrada_id = $_POST['entrada'];
$entrada= new Entrada();
$entrada->setId($Entrada_id);
$Usuario_username = $_POST['subidoPor'];
$usuario= new Usuario();
$usuario->setUsername($Usuario_username);
$fechaSubida = $_POST['fechaSubida'];
$descripcion = $_POST['descripcion'];
ArchivoFacade::insert($id, $url, $entrada, $usuario, $fechaSubida, $descripcion);
echo "true";

//That´s all folks!