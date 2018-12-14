<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\


class Relacion {

  private $predecesor;
  private $sucesor;

    /**
     * Constructor de Relacion
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a predecesor
     * @return predecesor
     */
  public function getPredecesor(){
      return $this->predecesor;
  }

    /**
     * Modifica el valor correspondiente a predecesor
     * @param predecesor
     */
  public function setPredecesor($predecesor){
      $this->predecesor = $predecesor;
  }
    /**
     * Devuelve el valor correspondiente a sucesor
     * @return sucesor
     */
  public function getSucesor(){
      return $this->sucesor;
  }

    /**
     * Modifica el valor correspondiente a sucesor
     * @param sucesor
     */
  public function setSucesor($sucesor){
      $this->sucesor = $sucesor;
  }


}
//That´s all folks!