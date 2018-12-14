<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Para entender la recursividad, primero debes entender la recursividad  \\

require_once realpath('../../facade/GlobalController.php');
require_once realpath('../../dao/interfaz/IFactoryDao.php');
require_once realpath('../../dto/Usuario.php');
require_once realpath('../../dao/interfaz/IUsuarioDao.php');

class UsuarioFacade {

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
   * Crea un objeto Usuario a partir de sus parámetros y lo guarda en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param username
   * @param password
   * @param nombre
   * @param tipo
   */
  public static function insert( $username,  $password,  $nombre,  $tipo){
      $usuario = new Usuario();
      $usuario->setUsername($username); 
      $usuario->setPassword($password); 
      $usuario->setNombre($nombre); 
      $usuario->setTipo($tipo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $rtn = $usuarioDao->insert($usuario);
     $usuarioDao->close();
     return $rtn;
  }

  /**
   * Selecciona un objeto Usuario de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param username
   * @return El objeto en base de datos o Null
   */
  public static function select($username){
      $usuario = new Usuario();
      $usuario->setUsername($username); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $result = $usuarioDao->select($usuario);
     $usuarioDao->close();
     return $result;
  }

  /**
   * Modifica los atributos de un objeto Usuario  ya existente en base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param username
   * @param password
   * @param nombre
   * @param tipo
   */
  public static function update($username, $password, $nombre, $tipo){
      $usuario = self::select($username);
      $usuario->setPassword($password); 
      $usuario->setNombre($nombre); 
      $usuario->setTipo($tipo); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $usuarioDao->update($usuario);
     $usuarioDao->close();
  }

  /**
   * Elimina un objeto Usuario de la base de datos a partir de su(s) llave(s) primaria(s).
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param username
   */
  public static function delete($username){
      $usuario = new Usuario();
      $usuario->setUsername($username); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $usuarioDao->delete($usuario);
     $usuarioDao->close();
  }

  /**
   * Lista todos los objetos Usuario de la base de datos.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @return $result Array con los objetos Usuario en base de datos o Null
   */
  public static function listAll(){
     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $result = $usuarioDao->listAll();
     $usuarioDao->close();
     return $result;
  }

  /**
   * Selecciona un objeto Usuario de la base de datos a partir de los atributos de inicio de sesión.
   * Puede recibir NullPointerException desde los métodos del Dao
   * @param username
   * @param password
   * @return El objeto en base de datos o Null
   */
  public static function login($username, $password){
      $usuario = new Usuario();
      $usuario->setUsername($username); 
      $usuario->setPassword($password); 

     $FactoryDao=new FactoryDao(self::getGestorDefault());
     $usuarioDao =$FactoryDao->getusuarioDao(self::getDataBaseDefault());
     $result = $usuarioDao->login($usuario);
     $usuarioDao->close();
     return $result;
  }


}
//That´s all folks!