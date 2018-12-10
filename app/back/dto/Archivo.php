<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase no referenciada  \\


class Archivo {

  private $id;
  private $url;
  private $entrada;
  private $subidoPor;
  private $fechaSubida;
  private $descripcion;

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
     * Devuelve el valor correspondiente a entrada
     * @return entrada
     */
  public function getEntrada(){
      return $this->entrada;
  }

    /**
     * Modifica el valor correspondiente a entrada
     * @param entrada
     */
  public function setEntrada($entrada){
      $this->entrada = $entrada;
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


}
//That´s all folks!