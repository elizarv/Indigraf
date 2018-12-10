<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No quiero morir sin tener cicatrices.  \\

include_once realpath('../../dao/interfaz/IPeriodoDao.php');
include_once realpath('../../dto/Periodo.php');
include_once realpath('../../dto/Indicador.php');

class PeriodoDao implements IPeriodoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Periodo en la base de datos.
     * @param periodo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($periodo){
      $fecha_ini=$periodo->getFecha_ini();
$fecha_fin=$periodo->getFecha_fin();
$meta=$periodo->getMeta();
$indicador=$periodo->getIndicador()->getId();
$id=$periodo->getId();

      try {
          $sql= "INSERT INTO `periodo`( `fecha_ini`, `fecha_fin`, `meta`, `indicador`, `id`)"
          ."VALUES ('$fecha_ini','$fecha_fin','$meta','$indicador','$id')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Periodo en la base de datos.
     * @param periodo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($periodo){
      $id=$periodo->getId();

      try {
          $sql= "SELECT `fecha_ini`, `fecha_fin`, `meta`, `indicador`, `id`"
          ."FROM `periodo`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $periodo->setFecha_ini($data[$i]['fecha_ini']);
          $periodo->setFecha_fin($data[$i]['fecha_fin']);
          $periodo->setMeta($data[$i]['meta']);
           $indicador = new Indicador();
           $indicador->setId($data[$i]['indicador']);
           $periodo->setIndicador($indicador);
          $periodo->setId($data[$i]['id']);

          }
      return $periodo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Periodo en la base de datos.
     * @param periodo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($periodo){
      $fecha_ini=$periodo->getFecha_ini();
$fecha_fin=$periodo->getFecha_fin();
$meta=$periodo->getMeta();
$indicador=$periodo->getIndicador()->getId();
$id=$periodo->getId();

      try {
          $sql= "UPDATE `periodo` SET`fecha_ini`='$fecha_ini' ,`fecha_fin`='$fecha_fin' ,`meta`='$meta' ,`indicador`='$indicador' ,`id`='$id' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Periodo en la base de datos.
     * @param periodo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($periodo){
      $id=$periodo->getId();

      try {
          $sql ="DELETE FROM `periodo` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Periodo en la base de datos.
     * @return ArrayList<Periodo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `fecha_ini`, `fecha_fin`, `meta`, `indicador`, `id`"
          ."FROM `periodo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $periodo= new Periodo();
          $periodo->setFecha_ini($data[$i]['fecha_ini']);
          $periodo->setFecha_fin($data[$i]['fecha_fin']);
          $periodo->setMeta($data[$i]['meta']);
           $indicador = new Indicador();
           $indicador->setId($data[$i]['indicador']);
           $periodo->setIndicador($indicador);
          $periodo->setId($data[$i]['id']);

          array_push($lista,$periodo);
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