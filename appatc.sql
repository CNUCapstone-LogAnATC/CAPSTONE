-- MySQL Script generated by MySQL Workbench
-- 02/18/16 13:59:05
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`User`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`User` ;

CREATE TABLE IF NOT EXISTS `mydb`.`User` (
  `UserID` INT NOT NULL,
  `firstName` VARCHAR(45) NOT NULL,
  `lastName` VARCHAR(45) NOT NULL,
  `userStatus` VARCHAR(45) NOT NULL,
  `password` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE INDEX `UserID_UNIQUE` (`UserID` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`StudentAthlete`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`StudentAthlete` ;

CREATE TABLE IF NOT EXISTS `mydb`.`StudentAthlete` (
  `studentAthleteID` INT NOT NULL,
  `userID` VARCHAR(45) NOT NULL,
  `User_UserID` INT NOT NULL,
  PRIMARY KEY (`studentAthleteID`, `User_UserID`),
  UNIQUE INDEX `studentAthleteID_UNIQUE` (`studentAthleteID` ASC),
  UNIQUE INDEX `userID_UNIQUE` (`userID` ASC),
  INDEX `fk_StudentAthlete_User1_idx` (`User_UserID` ASC),
  CONSTRAINT `fk_StudentAthlete_User1`
    FOREIGN KEY (`User_UserID`)
    REFERENCES `mydb`.`User` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Trainer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Trainer` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Trainer` (
  `trainerID` INT NOT NULL,
  `User_UserID` INT NOT NULL,
  PRIMARY KEY (`trainerID`, `User_UserID`),
  UNIQUE INDEX `trainerID_UNIQUE` (`trainerID` ASC),
  INDEX `fk_Trainer_User1_idx` (`User_UserID` ASC),
  CONSTRAINT `fk_Trainer_User1`
    FOREIGN KEY (`User_UserID`)
    REFERENCES `mydb`.`User` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`SportTeam`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`SportTeam` ;

CREATE TABLE IF NOT EXISTS `mydb`.`SportTeam` (
  `sportTeamID` INT NOT NULL,
  `name` VARCHAR(45) NOT NULL,
  `Trainer_trainerID` INT NOT NULL,
  UNIQUE INDEX `sportTeamID_UNIQUE` (`sportTeamID` ASC),
  PRIMARY KEY (`sportTeamID`, `Trainer_trainerID`),
  INDEX `fk_SportTeam_Trainer1_idx` (`Trainer_trainerID` ASC),
  CONSTRAINT `fk_SportTeam_Trainer1`
    FOREIGN KEY (`Trainer_trainerID`)
    REFERENCES `mydb`.`Trainer` (`trainerID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Injury`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Injury` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Injury` (
  `injuryID` INT NOT NULL AUTO_INCREMENT,
  `description` TEXT(255) NOT NULL,
  `date` TIMESTAMP NOT NULL,
  `treatment` TEXT(255),
  `UserID` int not null,
 
  PRIMARY KEY (`injuryID`),
  UNIQUE INDEX `injuryID_UNIQUE` (`injuryID` ASC),
  CONSTRAINT `UserID`
   FOREIGN KEY (`UserID`)
    REFERENCES `mydb`.`User` (`UserID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
  
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Treatment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`Treatment` ;

CREATE TABLE IF NOT EXISTS `mydb`.`Treatment` (
  `treatmentID` INT NOT NULL,
  `Injury_injuryID` INT NOT NULL,
  PRIMARY KEY (`treatmentID`, `Injury_injuryID`),
  UNIQUE INDEX `treatmentID_UNIQUE` (`treatmentID` ASC),
  INDEX `fk_Treatment_Injury1_idx` (`Injury_injuryID` ASC),
  CONSTRAINT `fk_Treatment_Injury1`
    FOREIGN KEY (`Injury_injuryID`)
    REFERENCES `mydb`.`Injury` (`injuryID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`SportTeam_has_StudentAthlete`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mydb`.`SportTeam_has_StudentAthlete` ;

CREATE TABLE IF NOT EXISTS `mydb`.`SportTeam_has_StudentAthlete` (
  `SportTeam_sportTeamID` INT NOT NULL,
  `StudentAthlete_studentAthleteID` INT NOT NULL,
  PRIMARY KEY (`SportTeam_sportTeamID`, `StudentAthlete_studentAthleteID`),
  INDEX `fk_SportTeam_has_StudentAthlete_StudentAthlete1_idx` (`StudentAthlete_studentAthleteID` ASC),
  INDEX `fk_SportTeam_has_StudentAthlete_SportTeam1_idx` (`SportTeam_sportTeamID` ASC),
  CONSTRAINT `fk_SportTeam_has_StudentAthlete_SportTeam1`
    FOREIGN KEY (`SportTeam_sportTeamID`)
    REFERENCES `mydb`.`SportTeam` (`sportTeamID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SportTeam_has_StudentAthlete_StudentAthlete1`
    FOREIGN KEY (`StudentAthlete_studentAthleteID`)
    REFERENCES `mydb`.`StudentAthlete` (`studentAthleteID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `USER` values ('001','Ryan', 'Stutzman', 'Athlete', 'password');
INSERT INTO `USER` values ('002','Stevie', 'Boose', 'Trainer', 'password');
