<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Muerte a todos los humanos!  \\
include_once realpath('../../facade/UsuarioFacade.php');

$username = $_POST['id'];
UsuarioFacade::delete($username);
echo "true";