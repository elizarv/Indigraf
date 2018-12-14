<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¡¡Bienvenido al mundo del mañana!!  \\

include_once realpath('../../dao/interfaz/IRelacionDao.php');
include_once realpath('../../dto/Relacion.php');
include_once realpath('../../dto/Indicador.php');
include_once realpath('../../dto/Indicador.php');

class RelacionDao implements IRelacionDao{

private $cn;

    /**
     * Inicializa una única conexión a la base de datos, que se usará para cada consulta.
     */
    function __construct($conexion) {
            $this->cn =$conexion;
    }

    /**
     * Guarda un objeto Relacion en la base de datos.
     * @param relacion objeto a guardar
     * @return  Valor asignado a la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($relacion){
      $predecesor=$relacion->getPredecesor()->getId();
$sucesor=$relacion->getSucesor()->getId();

      try {
          $sql= "INSERT INTO `relacion`( `predecesor`, `sucesor`)"
          ."VALUES ('$predecesor','$sucesor')";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Relacion en la base de datos.
     * @param relacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($relacion){
      $predecesor=$relacion->getPredecesor()->getId();
$sucesor=$relacion->getSucesor()->getId();

      try {
          $sql= "SELECT `predecesor`, `sucesor`"
          ."FROM `relacion`"
          ."WHERE `predecesor`='$predecesor' AND`sucesor`='$sucesor'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
           $indicador = new Indicador();
           $indicador->setId($data[$i]['predecesor']);
           $relacion->setPredecesor($indicador);
           $indicador = new Indicador();
           $indicador->setId($data[$i]['sucesor']);
           $relacion->setSucesor($indicador);

          }
      return $relacion;      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Modifica un objeto Relacion en la base de datos.
     * @param relacion objeto con la información a modificar
     * @return  Valor de la llave primaria 
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($relacion){
      $predecesor=$relacion->getPredecesor()->getId();
$sucesor=$relacion->getSucesor()->getId();

      try {
          $sql= "UPDATE `relacion` SET`predecesor`='$predecesor' ,`sucesor`='$sucesor' WHERE `predecesor`='$predecesor' AND `sucesor`='$sucesor' ";
         return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Elimina un objeto Relacion en la base de datos.
     * @param relacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return  Valor de la llave primaria eliminada
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($relacion){
      $predecesor=$relacion->getPredecesor()->getId();
$sucesor=$relacion->getSucesor()->getId();

      try {
          $sql ="DELETE FROM `relacion` WHERE `predecesor`='$predecesor' AND`sucesor`='$sucesor'";
          return $this->insertarConsulta($sql);
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      }
  }

    /**
     * Busca un objeto Relacion en la base de datos.
     * @return ArrayList<Relacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll(){
      $lista = array();
      try {
          $sql ="SELECT `predecesor`, `sucesor`"
          ."FROM `relacion`"
          ."WHERE 1";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
              $relacion= new Relacion();
           $indicador = new Indicador();
           $indicador->setId($data[$i]['predecesor']);
           $relacion->setPredecesor($indicador);
           $indicador = new Indicador();
           $indicador->setId($data[$i]['sucesor']);
           $relacion->setSucesor($indicador);

          array_push($lista,$relacion);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Relacion en la base de datos.
     * @param relacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Relacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByPredecesor($relacion){
      $lista = array();
      $predecesor=$relacion->getPredecesor()->getId();

      try {
          $sql ="SELECT `predecesor`, `sucesor`"
          ."FROM `relacion`"
          ."WHERE `predecesor`='$predecesor'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $relacion = new Relacion();
           $indicador = new Indicador();
           $indicador->setId($data[$i]['predecesor']);
           $relacion->setPredecesor($indicador);
           $indicador = new Indicador();
           $indicador->setId($data[$i]['sucesor']);
           $relacion->setSucesor($indicador);

          array_push($lista,$relacion);
          }
      return $lista;
      } catch (SQLException $e) {
          throw new Exception('Primary key is null');
      return null;
      }
  }

    /**
     * Busca un objeto Relacion en la base de datos.
     * @param relacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return ArrayList<Relacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listBySucesor($relacion){
      $lista = array();
      $sucesor=$relacion->getSucesor()->getId();

      try {
          $sql ="SELECT `predecesor`, `sucesor`"
          ."FROM `relacion`"
          ."WHERE `sucesor`='$sucesor'";
          $data = $this->ejecutarConsulta($sql);
          for ($i=0; $i < count($data) ; $i++) {
          $relacion = new Relacion();
           $indicador = new Indicador();
           $indicador->setId($data[$i]['predecesor']);
           $relacion->setPredecesor($indicador);
           $indicador = new Indicador();
           $indicador->setId($data[$i]['sucesor']);
           $relacion->setSucesor($indicador);

          array_push($lista,$relacion);
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