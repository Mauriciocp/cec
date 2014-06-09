SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


-- -----------------------------------------------------
-- Table `biblioteca`.`pais`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`pais` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `codigo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`autor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`autor` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `pais_id` INT NOT NULL,
  PRIMARY KEY (`id`, `pais_id`),
  INDEX `fk_autor_pais1_idx` (`pais_id` ASC),
  CONSTRAINT `fk_autor_pais1`
    FOREIGN KEY (`pais_id`)
    REFERENCES `biblioteca`.`pais` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `biblioteca`.`libro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `biblioteca`.`libro` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `anio` VARCHAR(4) NOT NULL,
  `editorial` VARCHAR(45) NOT NULL,
  `autor_id` INT NOT NULL,
  PRIMARY KEY (`id`, `autor_id`),
  INDEX `fk_libro_autor_idx` (`autor_id` ASC),
  CONSTRAINT `fk_libro_autor`
    FOREIGN KEY (`autor_id`)
    REFERENCES `biblioteca`.`autor` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
