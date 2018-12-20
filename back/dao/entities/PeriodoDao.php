<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Yo tengo un sueño. El sueño de que mis hijos vivan en un mundo con un único lenguaje de programación.  \\

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
$verde=$periodo->getVerde();
$amarillo=$periodo->getAmarillo();
$rojo=$periodo->getRojo();
$indicador=$periodo->getIndicador()->getId();
$id=$periodo->getId();
$cantidad=$periodo->getCantidad();

      try {
          $sql= "INSERT INTO `periodo`( `fecha_ini`, `fecha_fin`, `verde`, `amarillo`, `rojo`, `indicador`, `id`, `cantidad`)"
          ."VALUES ('$fecha_ini','$fecha_fin','$verde','$amarillo','$rojo','$indicador','$id','$cantidad')";
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
     public function selectFirst($periodo){
       $p=$periodo->getIndicador();
         try {
             $sql= "SELECT `indicador`, `id`,`amarillo`,`verde`,`rojo`,`fecha_ini`,`fecha_fin`,`cantidad`"
             ."FROM `periodo`"
             ."WHERE `indicador`='$p' ORDER BY id ASC";
             $data = $this->ejecutarConsulta($sql);
             for ($i=0; $i < count($data) ; $i++) {
             $periodo->setId($data[$i]['id']);
             $periodo->setAmarillo($data[$i]['amarillo']);
             $periodo->setVerde($data[$i]['verde']);
             $periodo->setRojo($data[$i]['rojo']);
             $periodo->setFecha_ini($data[$i]['fecha_ini']);
             $periodo->setFecha_fin($data[$i]['fecha_fin']);
             $periodo->setCantidad($data[$i]['cantidad']);
             }
         return $periodo;
       } catch (SQLException $e) {
             throw new Exception('Primary key is null');
         return null;
         }
     }



  public function select($periodo){
      $id=$periodo->getId();
      try {
          $sql= "SELECT `fecha_ini`, `fecha_fin`, `verde`, `amarillo`, `rojo`, `indicador`, `id`, `cantidad`"
          ."FROM `periodo`"
          ."WHERE `id`='$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $periodo->setFecha_ini($data[$i]['fecha_ini']);
          $periodo->setFecha_fin($data[$i]['fecha_fin']);
          $periodo->setVerde($data[$i]['verde']);
          $periodo->setAmarillo($data[$i]['amarillo']);
          $periodo->setRojo($data[$i]['rojo']);
           $indicador = new Indicador();
           $indicador->setId($data[$i]['indicador']);
           $periodo->setIndicador($indicador);
          $periodo->setId($data[$i]['id']);
          $periodo->setCantidad($data[$i]['cantidad']);

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
$verde=$periodo->getVerde();
$amarillo=$periodo->getAmarillo();
$rojo=$periodo->getRojo();
$id=$periodo->getId();
$cantidad=$periodo->getCantidad();

      try {
          $sql= "UPDATE `periodo` SET `verde`=$verde, `amarillo`=$amarillo, `rojo`=$rojo ,`cantidad`='$cantidad' WHERE `id`='$id' ";
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
          $sql ="SELECT `fecha_ini`, `fecha_fin`, `verde`, `amarillo`, `rojo`, `indicador`, `id`, `cantidad`"
          ."FROM `periodo`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $periodo= new Periodo();
          $periodo->setFecha_ini($data[$i]['fecha_ini']);
          $periodo->setFecha_fin($data[$i]['fecha_fin']);
          $periodo->setVerde($data[$i]['verde']);
          $periodo->setAmarillo($data[$i]['amarillo']);
          $periodo->setRojo($data[$i]['rojo']);
           $indicador = new Indicador();
           $indicador->setId($data[$i]['indicador']);
           $periodo->setIndicador($indicador);
          $periodo->setId($data[$i]['id']);
          $periodo->setCantidad($data[$i]['cantidad']);

          array_push($lista,$periodo);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

  public function listByIndicador($indicador){
    $id=$indicador->getId();
      $lista = array();
      try {
          $sql ="SELECT `fecha_ini`, `fecha_fin`, `verde`, `amarillo`, `rojo`, `indicador`, `id`, `cantidad`"
          ."FROM `periodo`"
          ."WHERE `indicador` = '$id'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $periodo= new Periodo();
          $periodo->setFecha_ini($data[$i]['fecha_ini']);
          $periodo->setFecha_fin($data[$i]['fecha_fin']);
          $periodo->setVerde($data[$i]['verde']);
          $periodo->setAmarillo($data[$i]['amarillo']);
          $periodo->setRojo($data[$i]['rojo']);
           $indicador = new Indicador();
           $indicador->setId($data[$i]['indicador']);
           $periodo->setIndicador($indicador);
          $periodo->setId($data[$i]['id']);
          $periodo->setCantidad($data[$i]['cantidad']);

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
