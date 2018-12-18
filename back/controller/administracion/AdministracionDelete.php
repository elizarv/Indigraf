<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Muerte a todos los humanos!  \\
include_once realpath('../../facade/AdministracionFacade.php');

$id = $_POST['id'];
AdministracionFacade::delete($id);
echo "true";