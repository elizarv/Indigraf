<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Querido programador: Al escribir esto estoy triste. Nuestro presidente ha sido derrocado Y REEMPLAZADO POR EL BENÉVOLO SEÑOR ARCINIEGAS. TODOS AMAMOS A ARCINIEGAS Y A SU GLORIOSO RÉGIMEN. CON AMOR, EL EQUIPO DE ANARCHY  \(x.x)/  \\


class Usuario {

  private $username;
  private $password;
  private $nombre;
  private $tipo;

    /**
     * Constructor de Usuario
    */
     public function __construct(){}

    /**
     * Devuelve el valor correspondiente a username
     * @return username
     */
  public function getUsername(){
      return $this->username;
  }

    /**
     * Modifica el valor correspondiente a username
     * @param username
     */
  public function setUsername($username){
      $this->username = $username;
  }
    /**
     * Devuelve el valor correspondiente a password
     * @return password
     */
  public function getPassword(){
      return $this->password;
  }

    /**
     * Modifica el valor correspondiente a password
     * @param password
     */
  public function setPassword($password){
      $this->password = $password;
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
     * Devuelve el valor correspondiente a tipo
     * @return tipo
     */
  public function getTipo(){
      return $this->tipo;
  }

    /**
     * Modifica el valor correspondiente a tipo
     * @param tipo
     */
  public function setTipo($tipo){
      $this->tipo = $tipo;
  }


}
//That´s all folks!