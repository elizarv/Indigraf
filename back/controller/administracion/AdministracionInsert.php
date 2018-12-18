<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...con el mayor de los disgustos, el benévolo señor Arciniegas.  \\
include_once realpath('../../facade/AdministracionFacade.php');

$id = $_POST['id'];
$colorP = $_POST['colorP'];
$colorS = $_POST['colorS'];
$nombre = $_POST['nombre'];

//capturar imagen cargada
//capturamos los datos del fichero subido
$type=$_FILES['idLogo']['type'];
$tmp_name = $_FILES['idLogo']["tmp_name"];
$name = $_FILES['idLogo']["name"];
//Creamos una nueva ruta (nuevo path)
//Así guardaremos nuestra idImagen en la carpeta "images"
$nuevo_path="../../images/".$name;
//Movemos el archivo desde su ubicación temporal hacia la nueva ruta
# $tmp_name: la ruta temporal del fichero
# $nuevo_path: la nueva ruta que creamos
//$tmp_name=$tmp_name."/".$name;
move_uploaded_file($tmp_name,$nuevo_path);
//Extraer la extensión del archivo. P.e: jpg
# Con explode() segmentamos la cadena de acuerdo al separador que definamos. En este caso punto (.)
$array=explode('.',$nuevo_path);
# Capturamos el último elemento del array anterior que vendría a ser la extensión
$ext= end($array);
$imagen="back/images/".$name;

AdministracionFacade::insert($id, $colorP, $colorS, $imagen, $nombre);
echo "true";

//That´s all folks!