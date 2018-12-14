<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Era más fácil crear un framework que aprender a usar uno existente  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Relacion.php');
require_once realpath('../../dao/interfaz/IRelacionDao.php');
require_once realpath('../../dto/Indicador.php');
require_once realpath('../../dto/Indicador.php');

class RelacionFacade {

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
   * Crea un objeto Relacion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param predecesor
   * @param sucesor
   */
  public static function insert( $predecesor,  $sucesor){
      $relacion = new Relacion();
      $relacion->setPredecesor($predecesor); 
      $relacion->setSucesor($sucesor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $relacionDao =$FactoryDao->getrelacionDao(self::getDataBaseDefault());
     $rtn = $relacionDao->insert($relacion);
     $relacionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Relacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param predecesor
   * @param sucesor
   * @return El objeto en base de datos o Null
   */
  public static function select($predecesor, $sucesor){
      $relacion = new Relacion();
      $relacion->setPredecesor($predecesor); 
      $relacion->setSucesor($sucesor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $relacionDao =$FactoryDao->getrelacionDao(self::getDataBaseDefault());
     $result = $relacionDao->select($relacion);
     $relacionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Relacion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param predecesor
   * @param sucesor
   */
  public static function update($predecesor, $sucesor){
      $relacion = self::select($predecesor, $sucesor);

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $relacionDao =$FactoryDao->getrelacionDao(self::getDataBaseDefault());
     $relacionDao->update($relacion);
     $relacionDao->close();
  }

  /**
   * Elimina un objeto Relacion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param predecesor
   * @param sucesor
   */
  public static function delete($predecesor, $sucesor){
      $relacion = new Relacion();
      $relacion->setPredecesor($predecesor); 
      $relacion->setSucesor($sucesor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $relacionDao =$FactoryDao->getrelacionDao(self::getDataBaseDefault());
     $relacionDao->delete($relacion);
     $relacionDao->close();
  }

  /**
   * Lista todos los objetos Relacion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Relacion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $relacionDao =$FactoryDao->getrelacionDao(self::getDataBaseDefault());
     $result = $relacionDao->listAll();
     $relacionDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Relacion de la base de datos a partir de predecesor.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param predecesor
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listByPredecesor($predecesor){
      $relacion = new Relacion();
      $relacion->setPredecesor($predecesor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $relacionDao =$FactoryDao->getrelacionDao(self::getDataBaseDefault());
     $result = $relacionDao->listByPredecesor($relacion);
     $relacionDao->close();
     return $result;
  }

  /**
   * Lista todos los objetos Relacion de la base de datos a partir de sucesor.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param sucesor
   * @return $result Array con los objetos en base de datos o Null
   */
  public static function listBySucesor($sucesor){
      $relacion = new Relacion();
      $relacion->setSucesor($sucesor); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $relacionDao =$FactoryDao->getrelacionDao(self::getDataBaseDefault());
     $result = $relacionDao->listBySucesor($relacion);
     $relacionDao->close();
     return $result;
  }


}
//That´s all folks!