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
  private $verde;
  private $indicador;
  private $id;
  private $cantidad;
  private $amarillo;
  private $rojo;

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
     * Devuelve el valor correspondiente a verde
     * @return verde
     */
  public function getVerde(){
      return $this->verde;
  }

    /**
     * Modifica el valor correspondiente a Verde
     * @param Verde
     */
  public function setVerde($verde){
      $this->verde = $verde;
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
  /**
   * Devuelve el valor correspondiente a amarillo
   * @return amarillo
   */
public function getAmarillo(){
    return $this->amarillo;
}

  /**
   * Modifica el valor correspondiente a amarillo
   * @param amarillo
   */
  public function setAmarillo($amarillo){
      $this->amarillo = $amarillo;
  }

  /**
   * Devuelve el valor correspondiente a rojo
   * @return rojo
   */
  public function getRojo(){
      return $this->rojo;
  }

  /**
   * Modifica el valor correspondiente a rojo
   * @param rojo
   */
  public function setRojo($rojo){
      $this->rojo = $rojo;
  }

}
//That´s all folks!
