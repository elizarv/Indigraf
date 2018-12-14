<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Era más fácil crear un framework que aprender a usar uno existente  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Indicador.php');
require_once realpath('../../dao/interfaz/IIndicadorDao.php');
require_once realpath('../../dto/Indicador.php');

class IndicadorFacade {

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
   * Crea un objeto Indicador a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param descripcion
   * @param imagen
   * @param padre
   */
  public static function insert( $id,  $nombre,  $descripcion,  $imagen,  $padre){
      $indicador = new Indicador();
      $indicador->setId($id); 
      $indicador->setNombre($nombre); 
      $indicador->setDescripcion($descripcion); 
      $indicador->setImagen($imagen); 
      $indicador->setPadre($padre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $indicadorDao =$FactoryDao->getindicadorDao(self::getDataBaseDefault());
     $rtn = $indicadorDao->insert($indicador);
     $indicadorDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Indicador de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
  public static function select($id){
      $indicador = new Indicador();
      $indicador->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $indicadorDao =$FactoryDao->getindicadorDao(self::getDataBaseDefault());
     $result = $indicadorDao->select($indicador);
     $indicadorDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Indicador  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @param nombre
   * @param descripcion
   * @param imagen
   * @param padre
   */
  public static function update($id, $nombre, $descripcion, $imagen, $padre){
      $indicador = self::select($id);
      $indicador->setNombre($nombre); 
      $indicador->setDescripcion($descripcion); 
      $indicador->setImagen($imagen); 
      $indicador->setPadre($padre); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $indicadorDao =$FactoryDao->getindicadorDao(self::getDataBaseDefault());
     $indicadorDao->update($indicador);
     $indicadorDao->close();
  }

  /**
   * Elimina un objeto Indicador de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $indicador = new Indicador();
      $indicador->setId($id); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $indicadorDao =$FactoryDao->getindicadorDao(self::getDataBaseDefault());
     $indicadorDao->delete($indicador);
     $indicadorDao->close();
  }

  /**
   * Lista todos los objetos Indicador de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Indicador en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $indicadorDao =$FactoryDao->getindicadorDao(self::getDataBaseDefault());
     $result = $indicadorDao->listAll();
     $indicadorDao->close();
     return $result;
  }


}
//That´s all folks!