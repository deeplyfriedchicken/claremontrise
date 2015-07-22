-- MySQL Script generated by MySQL Workbench
-- Tue Jul 21 15:37:05 2015
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- DATABASE claremont_rise
-- -----------------------------------------------------
USE `db584027681` ;

-- -----------------------------------------------------
-- Table `extras`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `extras` ;

CREATE TABLE IF NOT EXISTS `extras` (
  `extra_id` INT NOT NULL AUTO_INCREMENT ,
  `user_id` INT NOT NULL ,
  `article_id` INT NOT NULL ,
  `description` VARCHAR(1000) NOT NULL ,
  `img` BLOB NULL ,
  `college` VARCHAR(50) NOT NULL ,
  `club_or_organization` VARCHAR(100) NOT NULL ,
  `start_notify` INT NOT NULL DEFAULT 2 ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`extra_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `users` ;

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(100) NOT NULL ,
  `college` VARCHAR(50) NOT NULL ,
  `username` VARCHAR(100) NOT NULL ,
  `email` VARCHAR(150) NOT NULL ,
  `password` VARCHAR(200) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  `remember_token` VARCHAR(100) NULL ,
  PRIMARY KEY (`user_id`)  );


-- -----------------------------------------------------
-- Table `events`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `events` ;

CREATE TABLE IF NOT EXISTS `events` (
  `event_id` INT NOT NULL AUTO_INCREMENT ,
  `article_id` INT NOT NULL ,
  `location` VARCHAR(200) NOT NULL DEFAULT 'N/A' ,
  `time1` DATETIME NOT NULL ,
  `time2` DATETIME NULL ,
  `title` VARCHAR(200) NOT NULL ,
  `imgUrl` VARCHAR(500) NOT NULL DEFAULT 'N/A' ,
  `url` VARCHAR(1000) NOT NULL ,
  `type` VARCHAR(100) NOT NULL ,
  `start_notify` INT NOT NULL DEFAULT 3 ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`event_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ath`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ath` ;

CREATE TABLE IF NOT EXISTS `ath` (
  `ath_id` INT NOT NULL AUTO_INCREMENT ,
  `article_id` INT NOT NULL ,
  `speaker` VARCHAR(100) NOT NULL ,
  `description` VARCHAR(300) NOT NULL ,
  `event_time` VARCHAR(45) NOT NULL ,
  `start_notify` INT NOT NULL DEFAULT 3 ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`ath_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `flex_hours`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `flex_hours` ;

CREATE TABLE IF NOT EXISTS `flex_hours` (
  `flex_id` INT NOT NULL AUTO_INCREMENT ,
  `store_name` VARCHAR(45) NOT NULL ,
  `wk_m_o` VARCHAR(45) NOT NULL ,
  `wk_m_c` VARCHAR(45) NOT NULL ,
  `wk_l_o` VARCHAR(45) NOT NULL ,
  `wk_l_c` VARCHAR(45) NOT NULL ,
  `wk_d_o` VARCHAR(45) NOT NULL ,
  `wk_d_c` VARCHAR(45) NOT NULL ,
  `wkn_m_o` VARCHAR(45) NOT NULL ,
  `wkn_m_c` VARCHAR(45) NOT NULL ,
  `wkn_l_o` VARCHAR(45) NOT NULL ,
  `wkn_l_c` VARCHAR(45) NOT NULL ,
  `wkn_d_o` VARCHAR(45) NOT NULL ,
  `wkn_d_c` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`flex_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dining_hall_hours`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `dining_hall_hours` ;

CREATE TABLE IF NOT EXISTS `dining_hall_hours` (
  `dhall_id` INT NOT NULL AUTO_INCREMENT ,
  `dining_hall_name` VARCHAR(45) NOT NULL ,
  `dining_hall_real` VARCHAR(45) NOT NULL ,
  `wk_b_o` VARCHAR(45) NOT NULL ,
  `wk_b_c` VARCHAR(45) NOT NULL ,
  `wk_l_o` VARCHAR(45) NOT NULL ,
  `wk_l_c` VARCHAR(45) NOT NULL ,
  `wk_d_o` VARCHAR(45) NOT NULL ,
  `wk_d_c` VARCHAR(45) NOT NULL ,
  `wk_br_o` VARCHAR(45) NOT NULL ,
  `wk_br_c` VARCHAR(45) NOT NULL ,
  `wk_wd_o` VARCHAR(45) NOT NULL ,
  `wk_wd_c` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`dhall_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `snack`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `snack` ;

CREATE TABLE IF NOT EXISTS `snack` (
  `snack_id` INT NOT NULL AUTO_INCREMENT ,
  `article_id` INT NOT NULL ,
  `foodname` VARCHAR(100) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`snack_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sports`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sports` ;

CREATE TABLE IF NOT EXISTS `sports` (
  `sports_id` INT NOT NULL AUTO_INCREMENT ,
  `article_id` INT NOT NULL ,
  `college` VARCHAR(50) NOT NULL ,
  `team` VARCHAR(100) NOT NULL ,
  `opponent` VARCHAR(100) NOT NULL ,
  `location` VARCHAR(100) NOT NULL DEFAULT 'N/A' ,
  `livestream` VARCHAR(500) NOT NULL DEFAULT 'N/A' ,
  `time_start` VARCHAR(50) NOT NULL ,
  `start_notify` INT NOT NULL DEFAULT 1 ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`sports_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `subscribers`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `subscribers` ;

CREATE TABLE IF NOT EXISTS `subscribers` (
  `subscriber_id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(150) NOT NULL ,
  `college` VARCHAR(50) NOT NULL ,
  `notify` TINYINT(1) NOT NULL DEFAULT 1 ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`subscriber_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `email_articles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `email_articles` ;

CREATE TABLE IF NOT EXISTS `email_articles` (
  `article_id` INT NOT NULL AUTO_INCREMENT ,
  `post_date` DATE NOT NULL ,
  `file_directory` VARCHAR(500) NOT NULL DEFAULT 'not set' ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`article_id`)  ,
  UNIQUE INDEX `post_date_UNIQUE` (`post_date` ASC)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `weather`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `weather` ;

CREATE TABLE IF NOT EXISTS `weather` (
  `weather_id` INT NOT NULL AUTO_INCREMENT ,
  `article_id` INT NOT NULL ,
  `icon` VARCHAR(25) NOT NULL ,
  `current_temp` INT(10) NOT NULL ,
  `max` INT(10) NOT NULL ,
  `min` INT(10) NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`weather_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `api_keys`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `api_keys` ;

CREATE TABLE IF NOT EXISTS `api_keys` (
  `api_id` INT NOT NULL ,
  `name` VARCHAR(100) NOT NULL ,
  `key` VARCHAR(200) NOT NULL ,
  PRIMARY KEY (`api_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `posts`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `posts` ;

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` INT NOT NULL AUTO_INCREMENT ,
  `article_id` INT NOT NULL ,
  `author` VARCHAR(100) NOT NULL DEFAULT 'N/A' ,
  `title` VARCHAR(100) NOT NULL ,
  `description` VARCHAR(500) NOT NULL DEFAULT 'N/A' ,
  `imgUrl` VARCHAR(300) NOT NULL DEFAULT 'N/A' ,
  `url` VARCHAR(500) NOT NULL ,
  `source` VARCHAR(50) NOT NULL ,
  `start_notify` INT NOT NULL DEFAULT 0 ,
  `created_at` DATETIME NOT NULL ,
  `updated_at` DATETIME NOT NULL ,
  PRIMARY KEY (`post_id`)  )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `athfood`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `athfood` ;

CREATE TABLE IF NOT EXISTS `athfood` (
  `athfood_id` INT NOT NULL AUTO_INCREMENT ,
  `article_id` INT NOT NULL ,
  `speaker_id` INT NOT NULL ,
  `food` VARCHAR(45) NOT NULL ,
  `start_notify` INT NOT NULL DEFAULT 5 ,
  `updated_at` DATETIME NOT NULL ,
  `created_at` DATETIME NOT NULL ,
  PRIMARY KEY (`athfood_id`)  )
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
