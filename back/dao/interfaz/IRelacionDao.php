<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    ...y esta no es la única frase que encontrarás...  \\


interface IRelacionDao {

    /**
     * Guarda un objeto Relacion en la base de datos.
     * @param relacion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($relacion);
    /**
     * Modifica un objeto Relacion en la base de datos.
     * @param relacion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($relacion);
    /**
     * Elimina un objeto Relacion en la base de datos.
     * @param relacion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($relacion);
    /**
     * Busca un objeto Relacion en la base de datos.
     * @param relacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($relacion);
    /**
     * Lista todos los objetos Relacion en la base de datos.
     * @return Array<Relacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Lista todos los objetos Relacion en la base de datos que coincidan con la llave primaria.
     * @param relacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return Array<Relacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listByPredecesor($relacion);
    /**
     * Lista todos los objetos Relacion en la base de datos que coincidan con la llave primaria.
     * @param relacion objeto con la(s) llave(s) primaria(s) para consultar
     * @return Array<Relacion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listBySucesor($relacion);
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!