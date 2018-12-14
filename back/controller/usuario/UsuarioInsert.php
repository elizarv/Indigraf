<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No dejes el código del futuro en manos humanas  \\
include_once realpath('../../facade/UsuarioFacade.php');

$username = $_POST['username'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
UsuarioFacade::insert($username, $password, $nombre, $tipo);
echo "true";

//That´s all folks!