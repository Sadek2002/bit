-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bit_academy
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bit_academy
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bit_academy` DEFAULT CHARACTER SET utf8 ;
USE `bit_academy` ;

-- -----------------------------------------------------
-- Table `bit_academy`.`product_types`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`product_types` (
    `product_type` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`product_type`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`products` (
                                                        `product_id` INT NOT NULL AUTO_INCREMENT,
                                                        `product_type` VARCHAR(45) NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    `Description` VARCHAR(500) NOT NULL,
    `img_url` VARCHAR(100) NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (`product_id`),
    INDEX `fk_products_product_types1_idx` (`product_type` ASC),
    CONSTRAINT `fk_products_product_types1`
    FOREIGN KEY (`product_type`)
    REFERENCES `bit_academy`.`product_types` (`product_type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`customers` (
                                                         `customer_id` INT NOT NULL AUTO_INCREMENT,
                                                         `first_name` VARCHAR(45) NOT NULL,
    `inserts` VARCHAR(10) NULL,
    `last_name` VARCHAR(45) NOT NULL,
    `adress` VARCHAR(45) NOT NULL,
    `address_nr` VARCHAR(10) NOT NULL,
    `postal_code` VARCHAR(7) NOT NULL,
    `place_name` VARCHAR(45) NOT NULL,
    `email` VARCHAR(80) NOT NULL,
    `passwoord` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`customer_id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`admins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`admins` (
                                                      `admin_id` INT NOT NULL AUTO_INCREMENT,
                                                      `name` VARCHAR(45) NOT NULL,
    `username` VARCHAR(45) NOT NULL,
    `passwoord` VARCHAR(45) NOT NULL,
    PRIMARY KEY (`admin_id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`orders` (
                                                      `order_id` INT NOT NULL AUTO_INCREMENT,
                                                      `customer_id` INT NOT NULL,
                                                      `datum` DATE NOT NULL,
                                                      `time` TIME NOT NULL,
                                                      PRIMARY KEY (`order_id`),
    INDEX `fk_orders_customers1_idx` (`customer_id` ASC),
    CONSTRAINT `fk_orders_customers1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `bit_academy`.`customers` (`customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`order_has_products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`order_has_products` (
                                                                  `order_id` INT NOT NULL,
                                                                  `product_id` INT NOT NULL,
                                                                  `amount` INT NOT NULL,
                                                                  PRIMARY KEY (`order_id`, `product_id`),
    INDEX `fk_orders_has_products_products1_idx` (`product_id` ASC),
    INDEX `fk_orders_has_products_orders_idx` (`order_id` ASC),
    CONSTRAINT `fk_orders_has_products_orders`
    FOREIGN KEY (`order_id`)
    REFERENCES `bit_academy`.`orders` (`order_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_orders_has_products_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `bit_academy`.`products` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`messages`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`messages` (
                                                        `message_id` INT NOT NULL AUTO_INCREMENT,
                                                        `customer_id` INT NOT NULL,
                                                        `text` VARCHAR(1000) NOT NULL,
    `read` VARCHAR(3) NOT NULL DEFAULT 'no',
    PRIMARY KEY (`message_id`),
    INDEX `fk_messages_customers1_idx` (`customer_id` ASC),
    CONSTRAINT `fk_messages_customers1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `bit_academy`.`customers` (`customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bit_academy`.`product_types`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`product_types` (`product_type`) VALUES ('mouth mask');
INSERT INTO `bit_academy`.`product_types` (`product_type`) VALUES ('t-shirt');
INSERT INTO `bit_academy`.`product_types` (`product_type`) VALUES ('cap');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`products`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `Description`, `img_url`, `price`) VALUES (DEFAULT, 't-shirt', 't-shirt bit blue', 'A product', '0', 12.30);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `Description`, `img_url`, `price`) VALUES (DEFAULT, 't-shirt', 't-shirt bit white', 'A product', '1', 15.45);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `Description`, `img_url`, `price`) VALUES (DEFAULT, 'cap', 'cap a20', 'A product', '2', 5.00);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `Description`, `img_url`, `price`) VALUES (DEFAULT, 't-shirt', 't-shirt 64 bit', 'A product', '3', 30.15);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `Description`, `img_url`, `price`) VALUES (DEFAULT, 'mouth mask', 'mouth mask blue', 'A product', '4', 1.25);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `Description`, `img_url`, `price`) VALUES (DEFAULT, 'cap', 'cap a21', 'A product', '5', 4.25);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `Description`, `img_url`, `price`) VALUES (DEFAULT, 'mouth mask', 'mouth mask white', 'A product', '6', 1.25);

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`customers`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`customers` (`customer_id`, `first_name`, `inserts`, `last_name`, `adress`, `address_nr`, `postal_code`, `place_name`, `email`, `passwoord`) VALUES (DEFAULT, 'jan', NULL, 'janjo', 'janstraat', '12', '2020 DS', 'Lelystad', 'jan@test.com', 'jan');
INSERT INTO `bit_academy`.`customers` (`customer_id`, `first_name`, `inserts`, `last_name`, `adress`, `address_nr`, `postal_code`, `place_name`, `email`, `passwoord`) VALUES (DEFAULT, 'ben', NULL, 'vogel', 'merelstraat', 's-23', '1026 ES', 'Almere', 'ben@test.com', 'ben');
INSERT INTO `bit_academy`.`customers` (`customer_id`, `first_name`, `inserts`, `last_name`, `adress`, `address_nr`, `postal_code`, `place_name`, `email`, `passwoord`) VALUES (DEFAULT, 'lisa', NULL, 'berg', 'bergweg', '5a', '0231 BA', 'Zwolle', 'lisa@test.com', 'lisa');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`admins`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`admins` (`admin_id`, `name`, `username`, `passwoord`) VALUES (DEFAULT, 'hans', 'hans123', 'hans');
INSERT INTO `bit_academy`.`admins` (`admin_id`, `name`, `username`, `passwoord`) VALUES (DEFAULT, 'bert', 'bert01', 'bert');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`messages`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`messages` (`message_id`, `customer_id`, `text`, `read`) VALUES (DEFAULT, 2, 'Dit is een slecht product', DEFAULT);
INSERT INTO `bit_academy`.`messages` (`message_id`, `customer_id`, `text`, `read`) VALUES (DEFAULT, 1, 'test test', DEFAULT);
INSERT INTO `bit_academy`.`messages` (`message_id`, `customer_id`, `text`, `read`) VALUES (DEFAULT, 2, 'De website werkt niet', DEFAULT);

COMMIT;

