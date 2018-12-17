<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Proletarios del mundo ¡Uníos!  \\

include_once realpath('../../dao/interfaz/IArchivoDao.php');
include_once realpath('../../dto/Archivo.php');
include_once realpath('../../dto/Usuario.php');
include_once realpath('../../dto/Periodo.php');

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
$subidoPor=$archivo->getSubidoPor()->getUsername();
$fechaSubida=$archivo->getFechaSubida();
$descripcion=$archivo->getDescripcion();
$periodo=$archivo->getPeriodo()->getId();
$estado=$archivo->getEstado();

      try {
          $sql= "INSERT INTO `archivo`( `id`, `url`, `subidoPor`, `fechaSubida`, `descripcion`, `periodo`, `estado`)"
          ."VALUES ('$id','$url','$subidoPor','$fechaSubida','$descripcion','$periodo','$estado')";
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
          $sql= "SELECT `id`, `url`, `subidoPor`, `fechaSubida`, `descripcion`, `periodo`, `estado`"
          ."FROM `archivo`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $archivo->setId($data[$i]['id']);
          $archivo->setUrl($data[$i]['url']);
           $usuario = new Usuario();
           $usuario->setUsername($data[$i]['subidoPor']);
           $archivo->setSubidoPor($usuario);
          $archivo->setFechaSubida($data[$i]['fechaSubida']);
          $archivo->setDescripcion($data[$i]['descripcion']);
           $periodo = new Periodo();
           $periodo->setId($data[$i]['periodo']);
           $archivo->setPeriodo($periodo);
           $archivo->setEstado($data[$i]['estado']);

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
$subidoPor=$archivo->getSubidoPor()->getUsername();
$fechaSubida=$archivo->getFechaSubida();
$descripcion=$archivo->getDescripcion();
$periodo=$archivo->getPeriodo()->getId();
$estado=$archivo->getEstado();

      try {
          $sql= "UPDATE `archivo` SET`id`='$id' ,`url`='$url' ,`subidoPor`='$subidoPor' ,`fechaSubida`='$fechaSubida' ,`descripcion`='$descripcion' ,`periodo`='$periodo',`estado`='$estado' WHERE `id`='$id' ";
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
          $sql ="SELECT `id`, `url`, `subidoPor`, `fechaSubida`, `descripcion`, `periodo`, `estado`"
          ."FROM `archivo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $archivo= new Archivo();
          $archivo->setId($data[$i]['id']);
          $archivo->setUrl($data[$i]['url']);
           $usuario = new Usuario();
           $usuario->setUsername($data[$i]['subidoPor']);
           $archivo->setSubidoPor($usuario);
          $archivo->setFechaSubida($data[$i]['fechaSubida']);
          $archivo->setDescripcion($data[$i]['descripcion']);
           $periodo = new Periodo();
           $periodo->setId($data[$i]['periodo']);
           $archivo->setPeriodo($periodo);
           $archivo->setEstado($data[$id]['estado']);

          array_push($lista,$archivo);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

  public function listByIn(){
    $lista = array();
    $indicadores = array();
    try {
        $sql ="SELECT COUNT(*) , indicador FROM `archivo`, periodo WHERE archivo.estado = '1' and archivo.periodo = periodo.id group by indicador ";
        $data = $this->ejecutarConsulta($sql);
        for ($i=0; $i < count($data) ; $i++) {
            array_push($indicadores,$data[$i]['COUNT(*)']);
            array_push($indicadores,$data[$i]['indicador']);
            array_push($lista,$indicadores);
            unset($indicadores);
            $indicadores = array();
        }
        
        return $lista;
    } catch (SQLException $e) {
        throw new Exception('Primary key is null');
    return null;
    }
}

public function listIn($id){
    $lista = array();
    try {
        $sql ="SELECT archivo.* FROM `archivo`, periodo WHERE archivo.estado = '1' and archivo.periodo = periodo.id and indicador = '$id' ";
        $data = $this->ejecutarConsulta($sql);
        for ($i=0; $i < count($data) ; $i++) {
            $archivo= new Archivo();
        $archivo->setId($data[$i]['id']);
        $archivo->setUrl($data[$i]['url']);
         $usuario = new Usuario();
         $usuario->setUsername($data[$i]['subidoPor']);
         $archivo->setSubidoPor($usuario);
        $archivo->setFechaSubida($data[$i]['fechaSubida']);
        $archivo->setDescripcion($data[$i]['descripcion']);
         $periodo = new Periodo();
         $periodo->setId($data[$i]['periodo']);
         $archivo->setPeriodo($periodo);
        array_push($lista,$archivo);
        }
    return $lista;
    } catch (SQLException $e) {
        throw new Exception('Primary key is null');
    return null;
    }
}

public function aprove($archivo){
    $id=$archivo->getId();

    try {
        $sql ="UPDATE `archivo` SET `estado` = 0 WHERE id = '$id'";
        return $this->insertarConsulta($sql);
    } catch (SQLException $e) {
        throw new Exception('Primary key is null');
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
