<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Hecho en sólo 6 días  \\

include_once realpath('../../dao/interfaz/IArchivoDao.php');
include_once realpath('../../dto/Archivo.php');
include_once realpath('../../dto/Entrada.php');
include_once realpath('../../dto/Usuario.php');

class ArchivoDao implements IArchivoDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Archivo en la base de datos.
     * @param archivo objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($archivo){
      $id=$archivo->getId();
$url=$archivo->getUrl();
$entrada=$archivo->getEntrada()->getId();
$subidoPor=$archivo->getSubidoPor()->getUsername();
$fechaSubida=$archivo->getFechaSubida();
$descripcion=$archivo->getDescripcion();

      try {
          $sql= "INSERT INTO `archivo`( `id`, `url`, `entrada`, `subidoPor`, `fechaSubida`, `descripcion`)"
          ."VALUES ('$id','$url','$entrada','$subidoPor','$fechaSubida','$descripcion')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Archivo en la base de datos.
     * @param archivo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($archivo){
      $id=$archivo->getId();

      try {
          $sql= "SELECT `id`, `url`, `entrada`, `subidoPor`, `fechaSubida`, `descripcion`"
          ."FROM `archivo`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $archivo->setId($data[$i]['id']);
          $archivo->setUrl($data[$i]['url']);
           $entrada = new Entrada();
           $entrada->setId($data[$i]['entrada']);
           $archivo->setEntrada($entrada);
           $usuario = new Usuario();
           $usuario->setUsername($data[$i]['subidoPor']);
           $archivo->setSubidoPor($usuario);
          $archivo->setFechaSubida($data[$i]['fechaSubida']);
          $archivo->setDescripcion($data[$i]['descripcion']);

          }
      return $archivo;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Archivo en la base de datos.
     * @param archivo objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($archivo){
      $id=$archivo->getId();
$url=$archivo->getUrl();
$entrada=$archivo->getEntrada()->getId();
$subidoPor=$archivo->getSubidoPor()->getUsername();
$fechaSubida=$archivo->getFechaSubida();
$descripcion=$archivo->getDescripcion();

      try {
          $sql= "UPDATE `archivo` SET`id`='$id' ,`url`='$url' ,`entrada`='$entrada' ,`subidoPor`='$subidoPor' ,`fechaSubida`='$fechaSubida' ,`descripcion`='$descripcion' WHERE `id`='$id' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Archivo en la base de datos.
     * @param archivo objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($archivo){
      $id=$archivo->getId();

      try {
          $sql ="DELETE FROM `archivo` WHERE `id`='$id'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Archivo en la base de datos.
     * @return ArrayList<Archivo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `id`, `url`, `entrada`, `subidoPor`, `fechaSubida`, `descripcion`"
          ."FROM `archivo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $archivo= new Archivo();
          $archivo->setId($data[$i]['id']);
          $archivo->setUrl($data[$i]['url']);
           $entrada = new Entrada();
           $entrada->setId($data[$i]['entrada']);
           $archivo->setEntrada($entrada);
           $usuario = new Usuario();
           $usuario->setUsername($data[$i]['subidoPor']);
           $archivo->setSubidoPor($usuario);
          $archivo->setFechaSubida($data[$i]['fechaSubida']);
          $archivo->setDescripcion($data[$i]['descripcion']);

          array_push($lista,$archivo);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

  public function listByEntrada($entrada){
      $lista = array();
      $entradaID=$entrada->getId();
      try {
          $sql ="SELECT `id`, `url`, `entrada`, `subidoPor`, `fechaSubida`, `descripcion`"
          ."FROM `archivo`"
          ."WHERE `entrada` = $entradaID";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $archivo= new Archivo();
          $archivo->setId($data[$i]['id']);
          $archivo->setUrl($data[$i]['url']);
           $entrada = new Entrada();
           $entrada->setId($data[$i]['entrada']);
           $archivo->setEntrada($entrada);
           $usuario = new Usuario();
           $usuario->setUsername($data[$i]['subidoPor']);
           $archivo->setSubidoPor($usuario);
          $archivo->setFechaSubida($data[$i]['fechaSubida']);
          $archivo->setDescripcion($data[$i]['descripcion']);

          array_push($lista,$archivo);
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