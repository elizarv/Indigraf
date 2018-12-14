<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    En lo que a mí respecta, señor Dix, lo imprevisto no existe  \\

include_once realpath('../../dao/conexion/Conexion.php');
include_once realpath('../../dao/interfaz/IFactoryDao.php');

class FactoryDao implements IFactoryDao{
	
     private $conn;
     public static $NULL_GESTOR = -1;
    public static $MYSQL_FACTORY = 0;
    public static $POSTGRESQL_FACTORY = 1;
    public static $ORACLE_FACTORY = 2;
    public static $DERBY_FACTORY = 3;

     public function __construct($gestor){
        $this->conn=new Conexion($gestor);
     }
     /**
     * Devuelve una instancia de AdministracionDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AdministracionDao
     */
     public function getAdministracionDao($dbName){
        return new AdministracionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de ArchivoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ArchivoDao
     */
     public function getArchivoDao($dbName){
        return new ArchivoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de IndicadorDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de IndicadorDao
     */
     public function getIndicadorDao($dbName){
        return new IndicadorDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de PeriodoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PeriodoDao
     */
     public function getPeriodoDao($dbName){
        return new PeriodoDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de RelacionDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de RelacionDao
     */
     public function getRelacionDao($dbName){
        return new RelacionDao($this->conn->obtener($dbName));
    }
     /**
     * Devuelve una instancia de UsuarioDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuarioDao
     */
     public function getUsuarioDao($dbName){
        return new UsuarioDao($this->conn->obtener($dbName));
    }

}
//That´s all folks!