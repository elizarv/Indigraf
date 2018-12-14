<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Archivo.php');
require_once realpath('../../dao/interfaz/IArchivoDao.php');
require_once realpath('../../dto/Entrada.php');
require_once realpath('../../dto/Usuario.php');

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
   * @param entrada
   * @param subidoPor
   * @param fechaSubida
   * @param descripcion
   */
  public static function insert( $id,  $url,  $entrada,  $subidoPor,  $fechaSubida,  $descripcion){
      $archivo = new Archivo();
      $archivo->setId($id); 
      $archivo->setUrl($url); 
      $archivo->setEntrada($entrada); 
      $archivo->setSubidoPor($subidoPor); 
      $archivo->setFechaSubida($fechaSubida); 
      $archivo->setDescripcion($descripcion); 

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
   * @param entrada
   * @param subidoPor
   * @param fechaSubida
   * @param descripcion
   */
  public static function update($id, $url, $entrada, $subidoPor, $fechaSubida, $descripcion){
      $archivo = self::select($id);
      $archivo->setUrl($url); 
      $archivo->setEntrada($entrada); 
      $archivo->setSubidoPor($subidoPor); 
      $archivo->setFechaSubida($fechaSubida); 
      $archivo->setDescripcion($descripcion); 

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
/**
   * Lista todos los objetos Archivo de la base de datos a partir del id de su entrada.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Archivo en base de datos o Null
   */
  public static function listByEntrada($entrada){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $archivoDao =$FactoryDao->getarchivoDao(self::getDataBaseDefault());
     $result = $archivoDao->listByEntrada($entrada);
     $archivoDao->close();
     return $result;
  }

}
//That´s all folks!