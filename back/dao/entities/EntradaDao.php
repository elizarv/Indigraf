<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Cuantas frases como esta crees que puedo escribir?  \\

include_once realpath('../../dao/interfaz/IEntradaDao.php');
include_once realpath('../../dto/Entrada.php');
include_once realpath('../../dto/Periodo.php');

class EntradaDao implements IEntradaDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Entrada en la base de datos.
     * @param entrada objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($entrada){
      $id=$entrada->getId();
$nombre=$entrada->getNombre();
$descripcion=$entrada->getDescripcion();
$periodo=$entrada->getPeriodo()->getId();

      try {
          $sql= "INSERT INTO `entrada`( `id`, `nombre`, `descripcion`, `periodo`)"
          ."VALUES ('$id','$nombre','$descripcion','$periodo')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Entrada en la base de datos.
     * @param entrada objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($entrada){
      $id=$entrada->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `descripcion`, `periodo`"
          ."FROM `entrada`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $entrada->setId($data[$i]['id']);
          $entrada->setNombre($data[$i]['nombre']);
          $entrada->setDescripcion($data[$i]['descripcion']);
           $periodo = new Periodo();
           $periodo->setId($data[$i]['periodo']);
           $entrada->setPeriodo($periodo);

          }
      return $entrada;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Entrada en la base de datos.
     * @param entrada objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($entrada){
      $id=$entrada->getId();
$nombre=$entrada->getNombre();
$descripcion=$entrada->getDescripcion();
$periodo=$entrada->getPeriodo()->getId();

      try {
          $sql= "UPDATE `entrada` SET`id`='$id' ,`nombre`='$nombre' ,`descripcion`='$descripcion' ,`periodo`='$periodo' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Entrada en la base de datos.
     * @param entrada objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($entrada){
      $id=$entrada->getId();

      try {
          $sql ="DELETE FROM `entrada` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Entrada en la base de datos.
     * @return ArrayList<Entrada> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `descripcion`, `periodo`"
          ."FROM `entrada`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $entrada= new Entrada();
          $entrada->setId($data[$i]['id']);
          $entrada->setNombre($data[$i]['nombre']);
          $entrada->setDescripcion($data[$i]['descripcion']);
           $periodo = new Periodo();
           $periodo->setId($data[$i]['periodo']);
           $entrada->setPeriodo($periodo);

          array_push($lista,$entrada);
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