<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Muerte a todos los humanos!  \\
include_once realpath('../../facade/ArchivoFacade.php');

$id = $_POST['id'];
ArchivoFacade::delete($id);
echo "true";