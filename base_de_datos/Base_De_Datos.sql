
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema restaurantes
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema restaurantes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `restaurantes` DEFAULT CHARACTER SET utf8 ;
USE `restaurantes` ;

-- -----------------------------------------------------
-- Table `restaurantes`.`restaurante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurantes`.`restaurante` (
  `RestauranteId` INT(11) NOT NULL AUTO_INCREMENT,
  `RestauranteNombre` VARCHAR(45) NULL DEFAULT NULL,
  `RestauranteLogo` VARCHAR(200) NULL DEFAULT NULL,
  `RestauranteRating` INT(11) NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  `RestauranteUbicacion` VARCHAR(200) NULL DEFAULT NULL,
  `RestauranteLongitud` VARCHAR(45) NULL DEFAULT NULL,
  `RestauranteLatitud` VARCHAR(45) NULL DEFAULT NULL,
  `RestauranteDescripcion` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`RestauranteId`))
ENGINE = InnoDB
AUTO_INCREMENT = 9
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `restaurantes`.`restaurante_fotos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `restaurantes`.`restaurante_fotos` (
  `FotoId` INT(11) NOT NULL AUTO_INCREMENT,
  `RestauranteId` INT(11) NULL DEFAULT NULL,
  `Foto` VARCHAR(200) NULL DEFAULT NULL,
  `Estado` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`FotoId`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = latin1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
