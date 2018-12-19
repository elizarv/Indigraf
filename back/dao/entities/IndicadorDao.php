<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡Oh! (°o° ) ¡es Fredy Arciniegas, el intelectualoide millonario!  \\

include_once realpath('../../dao/interfaz/IIndicadorDao.php');
include_once realpath('../../dto/Indicador.php');
include_once realpath('../../dto/Indicador.php');

class IndicadorDao implements IIndicadorDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Indicador en la base de datos.
     * @param indicador objeto a guardar
     * @return  Valor asignado a la llave primaria
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($indicador){
$nombre=$indicador->getNombre();
$descripcion=$indicador->getDescripcion();
$imagen=$indicador->getImagen();
$padre=$indicador->getPadre();
if($padre!=null){
  $padre=$padre->getId();
}
$esPadre=$indicador->getEsPadre();

$unidadMedida = $indicador->getUnidadMedida();
      try {
          $sql= "INSERT INTO `indicador`(`nombre`, `descripcion`, `imagen`, `padre`,`esPadre`,`unidadMedida`)"
          ."VALUES ('$nombre','$descripcion','$imagen','$padre','$esPadre','$unidadMedida')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Indicador en la base de datos.
     * @param indicador objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($indicador){
      $id=$indicador->getId();

      try {
          $sql= "SELECT `id`, `nombre`, `descripcion`, `imagen`, `padre`,`esPadre`,`unidadMedida`"
          ."FROM `indicador`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $indicador->setId($data[$i]['id']);
          $indicador->setNombre($data[$i]['nombre']);
          $indicador->setDescripcion($data[$i]['descripcion']);
          $indicador->setImagen($data[$i]['imagen']);
           $padre = new Indicador();
           $padre->setId($data[$i]['padre']);
           $indicador->setPadre($padre);
           $indicador->setEsPadre($data[$i]['esPadre']);
           $indicador->setUnidadMedida($data[$i]['unidadMedida']);
          }
      return $indicador;
    } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Indicador en la base de datos.
     * @param indicador objeto con la información a modificar
     * @return  Valor de la llave primaria
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($indicador){
      $id=$indicador->getId();
      $nombre=$indicador->getNombre();
      $descripcion=$indicador->getDescripcion();
      $imagen=$indicador->getImagen();
      $padre=$indicador->getPadre()->getId();
      $esPadre=$indicador->getEsPadre();

      try {
          $sql= "UPDATE `indicador` SET`id`='$id' ,`nombre`='$nombre' ,`descripcion`='$descripcion' ,`imagen`='$imagen' ,`unidadMedida`='$unidadMedida' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Indicador en la base de datos.
     * @param indicador objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($indicador){
      $id=$indicador->getId();
      try {
          $sql ="DELETE FROM `indicador` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Indicador en la base de datos.
     * @return ArrayList<Indicador> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `descripcion`, `imagen`, `padre`, `esPadre`,`unidadMedida`"
          ."FROM `indicador`"
          ."WHERE 1 AND id<>0";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $indicador= new Indicador();
          $indicador->setId($data[$i]['id']);
          $indicador->setNombre($data[$i]['nombre']);
          $indicador->setDescripcion($data[$i]['descripcion']);
          $indicador->setImagen($data[$i]['imagen']);
           $padre = new Indicador();
           $padre->setId($data[$i]['padre']);
           $indicador->setPadre($padre);
           $indicador->setEsPadre($data[$i]['esPadre']);
           $indicador->setUnidadMedida($data[$i]['unidadMedida']);
          array_push($lista,$indicador);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

  public function listAllByFather($padre){
      $lista = array();
      try {
          $sql ="SELECT `id`, `nombre`, `descripcion`, `imagen`, `padre`, `esPadre`,`unidadMedida` FROM `indicador` WHERE padre=$padre";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $indicador= new Indicador();
          $indicador->setId($data[$i]['id']);
          $indicador->setNombre($data[$i]['nombre']);
          $indicador->setDescripcion($data[$i]['descripcion']);
          $indicador->setImagen($data[$i]['imagen']);
           $padre = new Indicador();
           $padre->setId($data[$i]['padre']);
           $indicador->setPadre($padre);
           $indicador->setEsPadre($data[$i]['esPadre']);
           $indicador->setUnidadMedida($data[$i]['unidadMedida']);
          array_push($lista,$indicador);
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
