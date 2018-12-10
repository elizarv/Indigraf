<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Puedes sugerirnos frases nuevas, se nos están acabando ( u.u)  \\


class Indicador {

  private $id;
  private $nombre;
  private $descripción;
  private $imagen;
  private $padre;

    /**
     * Constructor de Indicador
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
     * Devuelve el valor correspondiente a nombre
     * @return nombre
     */
  public function getNombre(){
      return $this->nombre;
  }

    /**
     * Modifica el valor correspondiente a nombre
     * @param nombre
     */
  public function setNombre($nombre){
      $this->nombre = $nombre;
  }
    /**
     * Devuelve el valor correspondiente a descripción
     * @return descripción
     */
  public function getDescripción(){
      return $this->descripción;
  }

    /**
     * Modifica el valor correspondiente a descripción
     * @param descripción
     */
  public function setDescripción($descripción){
      $this->descripción = $descripción;
  }
    /**
     * Devuelve el valor correspondiente a imagen
     * @return imagen
     */
  public function getImagen(){
      return $this->imagen;
  }

    /**
     * Modifica el valor correspondiente a imagen
     * @param imagen
     */
  public function setImagen($imagen){
      $this->imagen = $imagen;
  }
    /**
     * Devuelve el valor correspondiente a padre
     * @return padre
     */
  public function getPadre(){
      return $this->padre;
  }

    /**
     * Modifica el valor correspondiente a padre
     * @param padre
     */
  public function setPadre($padre){
      $this->padre = $padre;
  }


}
//That´s all folks!