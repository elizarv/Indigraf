<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Esta es una frase no referenciada  \\


class Administracion {

  private $id;
  private $colorP;
  private $colorS;
  private $logo;
  private $nombre;

    /**
     * Constructor de Administracion
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
     * Devuelve el valor correspondiente a colorP
     * @return colorP
     */
  public function getColorP(){
      return $this->colorP;
  }

    /**
     * Modifica el valor correspondiente a colorP
     * @param colorP
     */
  public function setColorP($colorP){
      $this->colorP = $colorP;
  }
    /**
     * Devuelve el valor correspondiente a colorS
     * @return colorS
     */
  public function getColorS(){
      return $this->colorS;
  }

    /**
     * Modifica el valor correspondiente a colorS
     * @param colorS
     */
  public function setColorS($colorS){
      $this->colorS = $colorS;
  }
    /**
     * Devuelve el valor correspondiente a logo
     * @return logo
     */
  public function getLogo(){
      return $this->logo;
  }

    /**
     * Modifica el valor correspondiente a logo
     * @param logo
     */
  public function setLogo($logo){
      $this->logo = $logo;
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


}
//That´s all folks!