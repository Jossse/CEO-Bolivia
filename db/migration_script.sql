-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: sisrecocoap
-- Source Schemata: sisrecocoap
-- Created: Wed Sep 22 23:37:57 2021
-- Workbench Version: 8.0.26
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema sisrecocoap
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `sisrecocoap` ;
CREATE SCHEMA IF NOT EXISTS `sisrecocoap` ;

-- ----------------------------------------------------------------------------
-- Table sisrecocoap.sysdiagrams
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisrecocoap`.`sysdiagrams` (
  `name` VARCHAR(160) NOT NULL,
  `principal_id` INT NOT NULL,
  `diagram_id` INT NOT NULL,
  `version` INT NULL,
  `definition` LONGBLOB NULL,
  PRIMARY KEY (`diagram_id`),
  UNIQUE INDEX `UK_principal_name` (`principal_id` ASC, `name` ASC) VISIBLE);

-- ----------------------------------------------------------------------------
-- Table sisrecocoap.Empleados
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisrecocoap`.`Empleados` (
  `CI` CHAR(15) CHARACTER SET 'utf8mb4' NOT NULL,
  `Apellidos_Nombres` VARCHAR(50) CHARACTER SET 'utf8mb4' NULL,
  `Direccion` VARCHAR(200) CHARACTER SET 'utf8mb4' NULL,
  `Celular` VARCHAR(50) CHARACTER SET 'utf8mb4' NULL,
  `Cargo` VARCHAR(50) CHARACTER SET 'utf8mb4' NULL,
  `Clave` VARCHAR(50) CHARACTER SET 'utf8mb4' NULL,
  `FechaRegistro` DATETIME NULL,
  `Activo` TINYINT(1) NULL,
  PRIMARY KEY (`CI`));

-- ----------------------------------------------------------------------------
-- Table sisrecocoap.Periodos
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisrecocoap`.`Periodos` (
  `IdPeriodo` VARCHAR(5) CHARACTER SET 'utf8mb4' NOT NULL,
  `FechaInicio` DATETIME NULL,
  `FechaFinal` DATETIME NULL,
  `Tarifa` DOUBLE NULL,
  PRIMARY KEY (`IdPeriodo`));

-- ----------------------------------------------------------------------------
-- Table sisrecocoap.Consumos
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisrecocoap`.`Consumos` (
  `IdConsumo` INT NOT NULL,
  `Cuenta` INT NULL,
  `IdPeriodo` VARCHAR(5) CHARACTER SET 'utf8mb4' NULL,
  `Cancelado` TINYINT(1) NULL,
  `FechaPago` DATETIME NULL,
  `CIEmpleado` CHAR(15) CHARACTER SET 'utf8mb4' NULL,
  PRIMARY KEY (`IdConsumo`),
  CONSTRAINT `FK_Consumos_Empleados`
    FOREIGN KEY (`CIEmpleado`)
    REFERENCES `sisrecocoap`.`Empleados` (`CI`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Consumos_Periodos`
    FOREIGN KEY (`IdPeriodo`)
    REFERENCES `sisrecocoap`.`Periodos` (`IdPeriodo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_Consumos_Socios`
    FOREIGN KEY (`Cuenta`)
    REFERENCES `sisrecocoap`.`Socios` (`Cuenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- ----------------------------------------------------------------------------
-- Table sisrecocoap.Socios
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `sisrecocoap`.`Socios` (
  `Cuenta` INT NOT NULL,
  `ApellidosNombres` CHAR(70) CHARACTER SET 'utf8mb4' NULL,
  `CI` CHAR(15) CHARACTER SET 'utf8mb4' NULL,
  `Direccion` CHAR(200) CHARACTER SET 'utf8mb4' NULL,
  `Celular` CHAR(8) CHARACTER SET 'utf8mb4' NULL,
  `FechaRegistro` DATETIME NULL,
  `Activo` TINYINT(1) NULL,
  PRIMARY KEY (`Cuenta`));
SET FOREIGN_KEY_CHECKS = 1;
