-- MySQL Script generated by MySQL Workbench
-- 04/26/16 15:05:18
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema SafwaVoyageBD
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema SafwaVoyageBD
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `SafwaVoyageBD` ;
USE `SafwaVoyageBD` ;

-- -----------------------------------------------------
-- Table `SafwaVoyageBD`.`Voyage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SafwaVoyageBD`.`Voyage` (
  `id_voy` INT NOT NULL AUTO_INCREMENT,
  `titre_voy` VARCHAR(45) NULL,
  `s_titre_voy` VARCHAR(45) NULL,
  `prix_voy` INT NULL,
  `id_media_voy` INT NULL,
  `text_voy` VARCHAR(255) NULL,
  `date_voy` VARCHAR(45) NULL,
  `duree_voy` INT NULL,
  `id_dest_voy` INT NULL,
  `id_cat_voy` VARCHAR(45) NULL,
  PRIMARY KEY (`id_voy`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SafwaVoyageBD`.`Cat_Voyage`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SafwaVoyageBD`.`Cat_Voyage` (
  `id_cat_voy` INT NOT NULL AUTO_INCREMENT,
  `nom_cat_voy` VARCHAR(45) NULL,
  `desc_cat_voy` VARCHAR(255) NULL,
  PRIMARY KEY (`id_cat_voy`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SafwaVoyageBD`.`Media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SafwaVoyageBD`.`Media` (
  `id_media` INT NOT NULL AUTO_INCREMENT,
  `nom_media` VARCHAR(45) NULL,
  `desc_media` VARCHAR(45) NULL,
  `source_media` VARCHAR(45) NULL,
  `id_type_media` INT NULL,
  `slider_media` INT NULL,
  PRIMARY KEY (`id_media`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SafwaVoyageBD`.`Type_Media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SafwaVoyageBD`.`Type_Media` (
  `id_type_media` INT NOT NULL,
  `nom_type_media` VARCHAR(45) NULL,
  `ext_type_media` VARCHAR(45) NULL,
  PRIMARY KEY (`id_type_media`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SafwaVoyageBD`.`Billet`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SafwaVoyageBD`.`Billet` (
  `id_Billet` INT NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_Billet`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SafwaVoyageBD`.`Hotel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SafwaVoyageBD`.`Hotel` (
  `id_hotel` INT NOT NULL AUTO_INCREMENT,
  `nom_hotel` VARCHAR(45) NULL,
  `ville_hotel` VARCHAR(45) NULL,
  `id_dest_hotel` VARCHAR(45) NULL,
  PRIMARY KEY (`id_hotel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SafwaVoyageBD`.`Reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SafwaVoyageBD`.`Reservation` (
  `id_reservation` INT NOT NULL AUTO_INCREMENT,
  `ref_reservation` VARCHAR(45) NULL,
  `id_client_reservation` VARCHAR(45) NULL,
  `date_reservation` VARCHAR(45) NULL,
  `id_type_reservation` VARCHAR(45) NULL,
  PRIMARY KEY (`id_reservation`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SafwaVoyageBD`.`Dest`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SafwaVoyageBD`.`Dest` (
  `id_dest` INT NOT NULL AUTO_INCREMENT,
  `nom_dest` VARCHAR(45) NULL,
  `id_media_dest` VARCHAR(45) NULL,
  `cont_dest` VARCHAR(45) NULL,
  `description_dest` VARCHAR(45) NULL,
  PRIMARY KEY (`id_dest`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `SafwaVoyageBD`.`Type_Reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `SafwaVoyageBD`.`Type_Reservation` (
  `id_type_reservation` INT NOT NULL AUTO_INCREMENT,
  `Type_Reservationcol` VARCHAR(45) NULL,
  PRIMARY KEY (`id_type_reservation`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;