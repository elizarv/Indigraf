<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Alguna vez Anarchy se llamó Molotov ( u.u) *Nostalgia  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Periodo.php');
require_once realpath('../../dao/interfaz/IPeriodoDao.php');
require_once realpath('../../dto/Indicador.php');

class PeriodoFacade {

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
   * Crea un objeto Periodo a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param fecha_ini
   * @param fecha_fin
   * @param meta
   * @param indicador
   * @param id
   * @param cantidad
   */
  public static function insert($fecha_ini,  $fecha_fin,  $verde,  $indicador,  $cantidad, $amarillo, $rojo){
      $periodo = new Periodo();
      $periodo->setFecha_ini($fecha_ini);
      $periodo->setFecha_fin($fecha_fin);
      $periodo->setVerde($verde);
      $periodo->setIndicador($indicador);
      $periodo->setCantidad($cantidad);
      $periodo->setAmarillo($amarillo);
      $periodo->setRojo($rojo);

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $periodoDao =$FactoryDao->getperiodoDao(self::getDataBaseDefault());
     $rtn = $periodoDao->insert($periodo);
     $periodoDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Periodo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   * @return El objeto en base de datos o Null
   */
   public static function selectFirst($id){
       $periodo = new Periodo();
       $periodo->setIndicador($id);
      $FactoryDao=new FactoryDao(self::getGestorDefault());
      $periodoDao =$FactoryDao->getperiodoDao(self::getDataBaseDefault());
      $result = $periodoDao->selectFirst($periodo);
      $periodoDao->close();
      return $result;
   }


  public static function select($id){
      $periodo = new Periodo();
      $periodo->setId($id);

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $periodoDao =$FactoryDao->getperiodoDao(self::getDataBaseDefault());
     $result = $periodoDao->select($periodo);
     $periodoDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Periodo  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param fecha_ini
   * @param fecha_fin
   * @param meta
   * @param indicador
   * @param id
   * @param cantidad
   */
  public static function update($id, $fecha_ini,  $fecha_fin,  $verde, $cantidad, $amarillo, $rojo){
      $periodo = self::select($id);
      $periodo->setFecha_ini($fecha_ini);
      $periodo->setFecha_fin($fecha_fin);
      $periodo->setVerde($verde);
      $periodo->setCantidad($cantidad);
      $periodo->setAmarillo($amarillo);
      $periodo->setRojo($rojo);

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $periodoDao =$FactoryDao->getperiodoDao(self::getDataBaseDefault());
     $periodoDao->update($periodo);
     $periodoDao->close();
  }

  /**
   * Elimina un objeto Periodo de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param id
   */
  public static function delete($id){
      $periodo = new Periodo();
      $periodo->setId($id);

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $periodoDao =$FactoryDao->getperiodoDao(self::getDataBaseDefault());
     $periodoDao->delete($periodo);
     $periodoDao->close();
  }

  /**
   * Lista todos los objetos Periodo de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Periodo en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $periodoDao =$FactoryDao->getperiodoDao(self::getDataBaseDefault());
     $result = $periodoDao->listAll();
     $periodoDao->close();
     return $result;
  }

  public static function listByIndicador($indicador){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $periodoDao =$FactoryDao->getperiodoDao(self::getDataBaseDefault());
     $result = $periodoDao->listByIndicador($indicador);
     $periodoDao->close();
     return $result;
  }

}
//That´s all folks!
