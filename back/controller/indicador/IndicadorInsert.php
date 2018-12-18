<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Pero el ruiseñor no respondió; yacía muerto sobre las altas hierbas, con el corazón traspasado de espinas.  \\
include_once realpath('../../facade/IndicadorFacade.php');

$nombre = $_POST['idNombre'];
$descripcion = $_POST['idDescripcion'];
$padre = $_POST['idPadre'];

//capturar imagen cargada
//capturamos los datos del fichero subido
$type=$_FILES['idImagen']['type'];
$tmp_name = $_FILES['idImagen']["tmp_name"];
$name = $_FILES['idImagen']["name"];
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
$indicador= new Indicador();
$indicador->setId($padre);
IndicadorFacade::insert($nombre, $descripcion, $imagen, $indicador);
echo "true";

//That´s all folks!
