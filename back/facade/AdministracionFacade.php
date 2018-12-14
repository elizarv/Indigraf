<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    gravitaban alrededor del astro de la noche, y por primera vez podía la vista penetrar todos sus misterios.  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Administracion.php');
require_once realpath('../../dao/interfaz/IAdministracionDao.php');

class AdministracionFacade {

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
   * Crea un objeto Administracion a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param colorP
   * @param colorS
   * @param logo
   * @param nombre
   */
  public static function insert( $id,  $colorP,  $colorS,  $logo,  $nombre){
      $administracion = new Administracion();
      $administracion->setId($id); 
      $administracion->setColorP($colorP); 
      $administracion->setColorS($colorS); 
      $administracion->setLogo($logo); 
      $administracion->setNombre($nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $administracionDao =$FactoryDao->getadministracionDao(self::getDataBaseDefault());
     $rtn = $administracionDao->insert($administracion);
     $administracionDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Administracion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $administracion = new Administracion();
      $administracion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $administracionDao =$FactoryDao->getadministracionDao(self::getDataBaseDefault());
     $result = $administracionDao->select($administracion);
     $administracionDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Administracion  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param colorP
   * @param colorS
   * @param logo
   * @param nombre
   */
  public static function update($id, $colorP, $colorS, $logo, $nombre){
      $administracion = self::select($id);
      $administracion->setColorP($colorP); 
      $administracion->setColorS($colorS); 
      $administracion->setLogo($logo); 
      $administracion->setNombre($nombre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $administracionDao =$FactoryDao->getadministracionDao(self::getDataBaseDefault());
     $administracionDao->update($administracion);
     $administracionDao->close();
  }

  /**
   * Elimina un objeto Administracion de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $administracion = new Administracion();
      $administracion->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $administracionDao =$FactoryDao->getadministracionDao(self::getDataBaseDefault());
     $administracionDao->delete($administracion);
     $administracionDao->close();
  }

  /**
   * Lista todos los objetos Administracion de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Administracion en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $administracionDao =$FactoryDao->getadministracionDao(self::getDataBaseDefault());
     $result = $administracionDao->listAll();
     $administracionDao->close();
     return $result;
  }


}
//That´s all folks!