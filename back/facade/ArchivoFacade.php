<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Generar buen código o poner frases graciosas? ¡La frase! ¡La frase!  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Archivo.php');
require_once realpath('../../dao/interfaz/IArchivoDao.php');
require_once realpath('../../dto/Usuario.php');
require_once realpath('../../dto/Periodo.php');

class ArchivoFacade {

  /**
   * Para su comodidad, defina aquí el gestor de conexión predilecto para esta entidad
   * @return idGestor Devuelve el identificador del gestor de conexión
   */
  private static function getGestorDefault(){
      return DEFAULT_GESTOR;
  }
  /**
   * Para su comodidad, defina aquí el nombre de base de datos predilecto para esta entidad
   * @return dbName Devuelve el nombre de la base de datos a emplear
   */
  private static function getDataBaseDefault(){
      return DEFAULT_DBNAME;
  }
  /**
   * Crea un objeto Archivo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param url
   * @param subidoPor
   * @param fechaSubida
   * @param descripcion
   * @param periodo
   */
  public static function insert( $id,  $url,  $subidoPor,  $fechaSubida,  $descripcion,  $periodo){
      $archivo = new Archivo();
      $archivo->setId($id); 
      $archivo->setUrl($url); 
      $archivo->setSubidoPor($subidoPor); 
      $archivo->setFechaSubida($fechaSubida); 
      $archivo->setDescripcion($descripcion); 
      $archivo->setPeriodo($periodo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $archivoDao =$FactoryDao->getarchivoDao(self::getDataBaseDefault());
     $rtn = $archivoDao->insert($archivo);
     $archivoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Archivo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $archivo = new Archivo();
      $archivo->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $archivoDao =$FactoryDao->getarchivoDao(self::getDataBaseDefault());
     $result = $archivoDao->select($archivo);
     $archivoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Archivo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param url
   * @param subidoPor
   * @param fechaSubida
   * @param descripcion
   * @param periodo
   */
  public static function update($id, $url, $subidoPor, $fechaSubida, $descripcion, $periodo){
      $archivo = self::select($id);
      $archivo->setUrl($url); 
      $archivo->setSubidoPor($subidoPor); 
      $archivo->setFechaSubida($fechaSubida); 
      $archivo->setDescripcion($descripcion); 
      $archivo->setPeriodo($periodo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $archivoDao =$FactoryDao->getarchivoDao(self::getDataBaseDefault());
     $archivoDao->update($archivo);
     $archivoDao->close();
  }

  /**
   * Elimina un objeto Archivo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $archivo = new Archivo();
      $archivo->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $archivoDao =$FactoryDao->getarchivoDao(self::getDataBaseDefault());
     $archivoDao->delete($archivo);
     $archivoDao->close();
  }

  /**
   * Lista todos los objetos Archivo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Archivo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $archivoDao =$FactoryDao->getarchivoDao(self::getDataBaseDefault());
     $result = $archivoDao->listAll();
     $archivoDao->close();
     return $result;
  }

  public static function listByIn(){
    $FactoryDao=new FactoryDao(self::getGestorDefault());
    $archivoDao =$FactoryDao->getarchivoDao(self::getDataBaseDefault());
    $result = $archivoDao->listByIn();
    $archivoDao->close();
    return $result;
  }

  public static function listIn($id){
    $FactoryDao=new FactoryDao(self::getGestorDefault());
    $archivoDao =$FactoryDao->getarchivoDao(self::getDataBaseDefault());
    $result = $archivoDao->listIn($id);
    $archivoDao->close();
    return $result;
  }

  public static function aprove($id){
    $archivo = new Archivo();
    $archivo->setId($id); 

   $FactoryDao=new FactoryDao(self::getGestorDefault());
   $archivoDao =$FactoryDao->getarchivoDao(self::getDataBaseDefault());
   $archivoDao->aprove($archivo);
   $archivoDao->close();
}

}
//That´s all folks!