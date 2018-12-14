<?php
/*
              -------Creado por-------
             \(x.x )/ Anarchy \( x.x)/
              ------------------------
 */

//    Trabajo individual singifica ganancia individual  \\

include_once realpath('../../dao/entities/AdministracionDao.php');
include_once realpath('../../dao/entities/ArchivoDao.php');
include_once realpath('../../dao/entities/IndicadorDao.php');
include_once realpath('../../dao/entities/PeriodoDao.php');
include_once realpath('../../dao/entities/RelacionDao.php');
include_once realpath('../../dao/entities/UsuarioDao.php');


interface IFactoryDao {
	
     /**
     * Devuelve una instancia de AdministracionDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de AdministracionDao
     */
     public function getAdministracionDao($dbName);
     /**
     * Devuelve una instancia de ArchivoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de ArchivoDao
     */
     public function getArchivoDao($dbName);
     /**
     * Devuelve una instancia de IndicadorDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de IndicadorDao
     */
     public function getIndicadorDao($dbName);
     /**
     * Devuelve una instancia de PeriodoDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de PeriodoDao
     */
     public function getPeriodoDao($dbName);
     /**
     * Devuelve una instancia de RelacionDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de RelacionDao
     */
     public function getRelacionDao($dbName);
     /**
     * Devuelve una instancia de UsuarioDao con una conexión que depende del gestor de base de datos
     * @param dbName Nombre o identificador de la base de datos a conectar
     * @return instancia de UsuarioDao
     */
     public function getUsuarioDao($dbName);

}
//That´s all folks!