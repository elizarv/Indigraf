<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Antes que me hubiera apasionado por mujer alguna, jugué mi corazón al azar y me lo ganó la Violencia.  \\
include_once realpath('../../facade/UsuarioFacade.php');

$username = $_POST['username'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
UsuarioFacade::insert($username, $password, $nombre, $tipo);
echo "true";

//That´s all folks!