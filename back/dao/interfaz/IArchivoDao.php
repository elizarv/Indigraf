<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    No hay de qué so no más de papa  \\


interface IArchivoDao {

    /**
     * Guarda un objeto Archivo en la base de datos.
     * @param archivo objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($archivo);
    /**
     * Modifica un objeto Archivo en la base de datos.
     * @param archivo objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($archivo);
    /**
     * Elimina un objeto Archivo en la base de datos.
     * @param archivo objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($archivo);
    /**
     * Busca un objeto Archivo en la base de datos.
     * @param archivo objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($archivo);
    /**
     * Lista todos los objetos Archivo en la base de datos.
     * @return Array<Archivo> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!