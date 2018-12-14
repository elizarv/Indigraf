<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ¿Sabías que hay una vida afuera de tu cuarto?  \\


class Periodo {

  private $fecha_ini;
  private $fecha_fin;
  private $meta;
  private $indicador;
  private $id;
  private $cantidad;

    /**
     * Constructor de Periodo
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a fecha_ini
     * @return fecha_ini
     */
  public function getFecha_ini(){
      return $this->fecha_ini;
  }

    /**
     * Modifica el valor correspondiente a fecha_ini
     * @param fecha_ini
     */
  public function setFecha_ini($fecha_ini){
      $this->fecha_ini = $fecha_ini;
  }
    /**
     * Devuelve el valor correspondiente a fecha_fin
     * @return fecha_fin
     */
  public function getFecha_fin(){
      return $this->fecha_fin;
  }

    /**
     * Modifica el valor correspondiente a fecha_fin
     * @param fecha_fin
     */
  public function setFecha_fin($fecha_fin){
      $this->fecha_fin = $fecha_fin;
  }
    /**
     * Devuelve el valor correspondiente a meta
     * @return meta
     */
  public function getMeta(){
      return $this->meta;
  }

    /**
     * Modifica el valor correspondiente a meta
     * @param meta
     */
  public function setMeta($meta){
      $this->meta = $meta;
  }
    /**
     * Devuelve el valor correspondiente a indicador
     * @return indicador
     */
  public function getIndicador(){
      return $this->indicador;
  }

    /**
     * Modifica el valor correspondiente a indicador
     * @param indicador
     */
  public function setIndicador($indicador){
      $this->indicador = $indicador;
  }
    /**
     * Devuelve el valor correspondiente a id
     * @return id
     */
  public function getId(){
      return $this->id;
  }

    /**
     * Modifica el valor correspondiente a id
     * @param id
     */
  public function setId($id){
      $this->id = $id;
  }
    /**
     * Devuelve el valor correspondiente a cantidad
     * @return cantidad
     */
  public function getCantidad(){
      return $this->cantidad;
  }

    /**
     * Modifica el valor correspondiente a cantidad
     * @param cantidad
     */
  public function setCantidad($cantidad){
      $this->cantidad = $cantidad;
  }


}
//That´s all folks!