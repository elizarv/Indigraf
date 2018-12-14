<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Para entender la recursividad, primero debes entender la recursividad  \\

include_once realpath('../../dao/interfaz/IAdministracionDao.php');
include_once realpath('../../dto/Administracion.php');

class AdministracionDao implements IAdministracionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Administracion en la base de datos.
     * @param administracion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($administracion){
      $id=$administracion->getId();
$colorP=$administracion->getColorP();
$colorS=$administracion->getColorS();
$logo=$administracion->getLogo();
$nombre=$administracion->getNombre();

      try {
          $sql= "INSERT INTO `administracion`( `id`, `colorP`, `colorS`, `logo`, `nombre`)"
          ."VALUES ('$id','$colorP','$colorS','$logo','$nombre')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Administracion en la base de datos.
     * @param administracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($administracion){
      $id=$administracion->getId();

      try {
          $sql= "SELECT `id`, `colorP`, `colorS`, `logo`, `nombre`"
          ."FROM `administracion`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $administracion->setId($data[$i]['id']);
          $administracion->setColorP($data[$i]['colorP']);
          $administracion->setColorS($data[$i]['colorS']);
          $administracion->setLogo($data[$i]['logo']);
          $administracion->setNombre($data[$i]['nombre']);

          }
      return $administracion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Administracion en la base de datos.
     * @param administracion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($administracion){
      $id=$administracion->getId();
$colorP=$administracion->getColorP();
$colorS=$administracion->getColorS();
$logo=$administracion->getLogo();
$nombre=$administracion->getNombre();

      try {
          $sql= "UPDATE `administracion` SET`id`='$id' ,`colorP`='$colorP' ,`colorS`='$colorS' ,`logo`='$logo' ,`nombre`='$nombre' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Administracion en la base de datos.
     * @param administracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($administracion){
      $id=$administracion->getId();

      try {
          $sql ="DELETE FROM `administracion` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Administracion en la base de datos.
     * @return ArrayList<Administracion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `colorP`, `colorS`, `logo`, `nombre`"
          ."FROM `administracion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $administracion= new Administracion();
          $administracion->setId($data[$i]['id']);
          $administracion->setColorP($data[$i]['colorP']);
          $administracion->setColorS($data[$i]['colorS']);
          $administracion->setLogo($data[$i]['logo']);
          $administracion->setNombre($data[$i]['nombre']);

          array_push($lista,$administracion);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

      public function insertarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $sentencia = null;
          return $this->cn->lastInsertId();
    }
      public function ejecutarConsulta($sql){
          $this->cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $sentencia=$this->cn->prepare($sql);
          $sentencia->execute(); 
          $data = $sentencia->fetchAll();
          $sentencia = null;
          return $data;
    }
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close(){
      $cn=null;
  }
}
//That´s all folks!