-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema arqui
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Table `Indicador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Indicador` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripción` MEDIUMTEXT NULL,
  `imagen` VARCHAR(45) NULL,
  `padre` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Indicador_Indicador_idx` (`padre` ASC),
  CONSTRAINT `fk_Indicador_Indicador`
    FOREIGN KEY (`padre`)
    REFERENCES `Indicador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Periodo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Periodo` (
  `fecha_ini` DATETIME NOT NULL,
  `fecha_fin` DATETIME NOT NULL,
  `meta` DOUBLE NOT NULL,
  `indicador` INT NOT NULL,
  `id` INT NOT NULL AUTO_INCREMENT,
  `cantidad` INT NULL,
  INDEX `fk_Periodo_Indicador1_idx` (`indicador` ASC),
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_Periodo_Indicador1`
    FOREIGN KEY (`indicador`)
    REFERENCES `Indicador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Relacion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Relacion` (
  `predecesor` INT NOT NULL,
  `sucesor` INT NOT NULL,
  PRIMARY KEY (`predecesor`, `sucesor`),
  INDEX `fk_Relacion_Indicador2_idx` (`predecesor` ASC),
  INDEX `fk_Relacion_Indicador1_idx` (`sucesor` ASC),
  CONSTRAINT `fk_Relacion_Indicador2`
    FOREIGN KEY (`predecesor`)
    REFERENCES `Indicador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Relacion_Indicador1`
    FOREIGN KEY (`sucesor`)
    REFERENCES `Indicador` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Usuario` (
  `username` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `tipo` INT NULL,
  PRIMARY KEY (`username`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Archivo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Archivo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(45) NOT NULL,
  `subidoPor` VARCHAR(45) NOT NULL,
  `fechaSubida` DATETIME NOT NULL,
  `descripcion` VARCHAR(45) NULL,
  `periodo` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Archivo_Usuario1_idx` (`subidoPor` ASC),
  INDEX `fk_Archivo_Periodo1_idx` (`periodo` ASC),
  CONSTRAINT `fk_Archivo_Usuario1`
    FOREIGN KEY (`subidoPor`)
    REFERENCES `Usuario` (`username`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Archivo_Periodo1`
    FOREIGN KEY (`periodo`)
    REFERENCES `Periodo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Administracion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Administracion` (
  `id` INT NOT NULL,
  `colorP` VARCHAR(45) NOT NULL,
  `colorS` VARCHAR(45) NOT NULL,
  `logo` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
