SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `contactos`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contactos`.`pais` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `codigo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `contactos`.`contacto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `contactos`.`contacto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `direccion` VARCHAR(45) NOT NULL,
  `telefono` VARCHAR(45) NULL,
  `email` VARCHAR(45) NOT NULL,
  `pais_id` INT NOT NULL,
  `fechanacimiento` DATE NOT NULL,
  PRIMARY KEY (`id`, `pais_id`),
  INDEX `fk_contacto_pais_idx` (`pais_id` ASC),
  CONSTRAINT `fk_contacto_pais`
    FOREIGN KEY (`pais_id`)
    REFERENCES `contactos`.`pais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
