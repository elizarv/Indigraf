<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Era más fácil crear un framework que aprender a usar uno existente  \\


interface IAdministracionDao {

    /**
     * Guarda un objeto Administracion en la base de datos.
     * @param administracion objeto a guardar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function insert($administracion);
    /**
     * Modifica un objeto Administracion en la base de datos.
     * @param administracion objeto con la información a modificar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function update($administracion);
    /**
     * Elimina un objeto Administracion en la base de datos.
     * @param administracion objeto con la(s) llave(s) primaria(s) para consultar
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function delete($administracion);
    /**
     * Busca un objeto Administracion en la base de datos.
     * @param administracion objeto con la(s) llave(s) primaria(s) para consultar
     * @return El objeto consultado o null
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function select($administracion);
    /**
     * Lista todos los objetos Administracion en la base de datos.
     * @return Array<Administracion> Puede contener los objetos consultados o estar vacío
     * @throws NullPointerException Si los objetos correspondientes a las llaves foraneas son null
     */
  public function listAll();
    /**
     * Cierra la conexión actual a la base de datos
     */
  public function close();
}
//That´s all folks!