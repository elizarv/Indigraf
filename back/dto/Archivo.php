<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No te olvides de quitar mis comentarios  \\


class Archivo {

  private $id;
  private $url;
  private $subidoPor;
  private $fechaSubida;
  private $descripcion;
  private $periodo;
  private $estado;

    /**
     * Constructor de Archivo
    */
     public function __construct(){}

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
     * Devuelve el valor correspondiente a url
     * @return url
     */
  public function getUrl(){
      return $this->url;
  }

    /**
     * Modifica el valor correspondiente a url
     * @param url
     */
  public function setUrl($url){
      $this->url = $url;
  }
    /**
     * Devuelve el valor correspondiente a subidoPor
     * @return subidoPor
     */
  public function getSubidoPor(){
      return $this->subidoPor;
  }

    /**
     * Modifica el valor correspondiente a subidoPor
     * @param subidoPor
     */
  public function setSubidoPor($subidoPor){
      $this->subidoPor = $subidoPor;
  }
    /**
     * Devuelve el valor correspondiente a fechaSubida
     * @return fechaSubida
     */
  public function getFechaSubida(){
      return $this->fechaSubida;
  }

    /**
     * Modifica el valor correspondiente a fechaSubida
     * @param fechaSubida
     */
  public function setFechaSubida($fechaSubida){
      $this->fechaSubida = $fechaSubida;
  }
    /**
     * Devuelve el valor correspondiente a descripcion
     * @return descripcion
     */
  public function getDescripcion(){
      return $this->descripcion;
  }

    /**
     * Modifica el valor correspondiente a descripcion
     * @param descripcion
     */
  public function setDescripcion($descripcion){
      $this->descripcion = $descripcion;
  }
    /**
     * Devuelve el valor correspondiente a periodo
     * @return periodo
     */
  public function getPeriodo(){
      return $this->periodo;
  }

    /**
     * Modifica el valor correspondiente a periodo
     * @param periodo
     */
  public function setPeriodo($periodo){
      $this->periodo = $periodo;
  }
  /**
   * Devuelve el valor correspondiente a estado
   * @return estado
   */
public function getEstado(){
    return $this->estado;
}

  /**
   * Modifica el valor correspondiente a estado
   * @param estado
   */
public function setEstado($estado){
    $this->estado = $estado;
}


}
//That´s all folks!
