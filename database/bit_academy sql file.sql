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
-- Table `bit_academy`.`colors`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`colors` (
    `color` VARCHAR(80) NOT NULL,
    PRIMARY KEY (`color`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`products` (
                                                        `product_id` INT NOT NULL AUTO_INCREMENT,
                                                        `product_type` VARCHAR(45) NOT NULL,
    `name` VARCHAR(45) NOT NULL,
    `description` VARCHAR(500) NOT NULL,
    `img_url` VARCHAR(500) NOT NULL,
    `color` VARCHAR(80) NOT NULL,
    `price` DECIMAL(10,2) NOT NULL,
    `in_stock` INT NOT NULL,
    PRIMARY KEY (`product_id`),
    INDEX `fk_products_product_types1_idx` (`product_type` ASC),
    INDEX `fk_products_colors1_idx` (`color` ASC),
    CONSTRAINT `fk_products_product_types1`
    FOREIGN KEY (`product_type`)
    REFERENCES `bit_academy`.`product_types` (`product_type`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_products_colors1`
    FOREIGN KEY (`color`)
    REFERENCES `bit_academy`.`colors` (`color`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`customers` (
                                                         `customer_id` INT NOT NULL AUTO_INCREMENT,
                                                         `first_name` VARCHAR(45) NOT NULL,
    `middle_initial` VARCHAR(45) NULL,
    `last_name` VARCHAR(45) NOT NULL,
    `address` VARCHAR(45) NOT NULL,
    `address_nr` VARCHAR(10) NOT NULL,
    `postal_code` VARCHAR(7) NOT NULL,
    `place_name` VARCHAR(80) NOT NULL,
    `telephone_nr` VARCHAR(25) NULL,
    `email` VARCHAR(150) NOT NULL,
    `password` VARCHAR(80) NOT NULL,
    PRIMARY KEY (`customer_id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`admins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`admins` (
                                                      `admin_id` INT NOT NULL AUTO_INCREMENT,
                                                      `name` VARCHAR(80) NOT NULL,
    `username` VARCHAR(150) NOT NULL,
    `password` VARCHAR(80) NOT NULL,
    PRIMARY KEY (`admin_id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`guests`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`guests` (
                                                      `guest_id` INT NOT NULL AUTO_INCREMENT,
                                                      `email` VARCHAR(150) NOT NULL,
    `telephone_nr` VARCHAR(25) NULL,
    `address` VARCHAR(45) NOT NULL,
    `address_nr` VARCHAR(10) NOT NULL,
    `postal_code` VARCHAR(7) NOT NULL,
    `place_name` VARCHAR(80) NOT NULL,
    PRIMARY KEY (`guest_id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`orders` (
                                                      `order_id` INT NOT NULL AUTO_INCREMENT,
                                                      `customer_id` INT NULL,
                                                      `guest_id` INT NULL,
                                                      `date` DATE NOT NULL,
                                                      `time` TIME NOT NULL,
                                                      PRIMARY KEY (`order_id`),
    INDEX `fk_orders_customers1_idx` (`customer_id` ASC),
    INDEX `fk_orders_guests1_idx` (`guest_id` ASC),
    CONSTRAINT `fk_orders_customers1`
    FOREIGN KEY (`customer_id`)
    REFERENCES `bit_academy`.`customers` (`customer_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_orders_guests1`
    FOREIGN KEY (`guest_id`)
    REFERENCES `bit_academy`.`guests` (`guest_id`)
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
                                                                  `size` VARCHAR(5) NULL,
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
                                                        `email` VARCHAR(150) NOT NULL,
    `telephone_nr` VARCHAR(25) NULL,
    `order_nr` INT NULL,
    `name` VARCHAR(80) NOT NULL,
    `subject` VARCHAR(50) NOT NULL,
    `text` VARCHAR(5000) NOT NULL,
    `read` VARCHAR(3) NOT NULL DEFAULT 'no',
    `handled` VARCHAR(3) NOT NULL DEFAULT 'no',
    PRIMARY KEY (`message_id`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`sizes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`sizes` (
    `size` VARCHAR(5) NOT NULL,
    PRIMARY KEY (`size`))
    ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bit_academy`.`product_has_sizes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`product_has_sizes` (
                                                                 `product_id` INT NOT NULL,
                                                                 `size` VARCHAR(5) NOT NULL,
    PRIMARY KEY (`product_id`, `size`),
    INDEX `fk_products_has_sizes_sizes1_idx` (`size` ASC),
    INDEX `fk_products_has_sizes_products1_idx` (`product_id` ASC),
    CONSTRAINT `fk_products_has_sizes_products1`
    FOREIGN KEY (`product_id`)
    REFERENCES `bit_academy`.`products` (`product_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_products_has_sizes_sizes1`
    FOREIGN KEY (`size`)
    REFERENCES `bit_academy`.`sizes` (`size`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
    ENGINE = InnoDB;

USE `bit_academy` ;

-- -----------------------------------------------------
-- Placeholder table for view `bit_academy`.`view1`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bit_academy`.`view1` (`id` INT);

-- -----------------------------------------------------
-- View `bit_academy`.`view1`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `bit_academy`.`view1`;
USE `bit_academy`;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `bit_academy`.`product_types`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`product_types` (`product_type`) VALUES ('Mask');
INSERT INTO `bit_academy`.`product_types` (`product_type`) VALUES ('T-shirt');
INSERT INTO `bit_academy`.`product_types` (`product_type`) VALUES ('Sweater');
INSERT INTO `bit_academy`.`product_types` (`product_type`) VALUES ('Sweatshirt');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`colors`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`colors` (`color`) VALUES ('Red');
INSERT INTO `bit_academy`.`colors` (`color`) VALUES ('White');
INSERT INTO `bit_academy`.`colors` (`color`) VALUES ('Blue');
INSERT INTO `bit_academy`.`colors` (`color`) VALUES ('Black');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`products`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `description`, `img_url`, `color`, `price`, `in_stock`) VALUES (DEFAULT, 'T-shirt', 'T-shirt bit blue', 'A product', 'img/', 'Blue', 12.30, 8);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `description`, `img_url`, `color`, `price`, `in_stock`) VALUES (DEFAULT, 'T-shirt', 'T-shirt bit white', 'A product', 'img/', 'White', 15.45, 5);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `description`, `img_url`, `color`, `price`, `in_stock`) VALUES (DEFAULT, 'Sweater', 'Sweater a20', 'A product', 'img/', 'Red', 5.00, 0);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `description`, `img_url`, `color`, `price`, `in_stock`) VALUES (DEFAULT, 'Sweater', 'Sweater 64 bit', 'A product', 'img/', 'Blue', 12.15, 1);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `description`, `img_url`, `color`, `price`, `in_stock`) VALUES (DEFAULT, 'Mask', 'Mask blue', 'A product', 'img/', 'Black', 1.25, 2);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `description`, `img_url`, `color`, `price`, `in_stock`) VALUES (DEFAULT, 'Sweatshirt', 'Sweatshirt a21', 'A product', 'img/', 'Red', 4.25, 20);
INSERT INTO `bit_academy`.`products` (`product_id`, `product_type`, `name`, `description`, `img_url`, `color`, `price`, `in_stock`) VALUES (DEFAULT, 'Mask', 'Mask white', 'A product', 'img/', 'White', 1.25, 0);

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`customers`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`customers` (`customer_id`, `first_name`, `middle_initial`, `last_name`, `address`, `address_nr`, `postal_code`, `place_name`, `telephone_nr`, `email`, `password`) VALUES (DEFAULT, 'jan', NULL, 'janjo', 'janstraat', '12', '2020 DS', 'Lelystad', NULL, 'jan@test.com', 'jan');
INSERT INTO `bit_academy`.`customers` (`customer_id`, `first_name`, `middle_initial`, `last_name`, `address`, `address_nr`, `postal_code`, `place_name`, `telephone_nr`, `email`, `password`) VALUES (DEFAULT, 'ben', NULL, 'vogel', 'merelstraat', 's-23', '1026 ES', 'Almere', '0645469001', 'ben@test.com', 'ben');
INSERT INTO `bit_academy`.`customers` (`customer_id`, `first_name`, `middle_initial`, `last_name`, `address`, `address_nr`, `postal_code`, `place_name`, `telephone_nr`, `email`, `password`) VALUES (DEFAULT, 'lisa', 'van de', 'berg', 'bergweg', '5a', '0231 BA', 'Zwolle', NULL, 'lisa@test.com', 'lisa');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`admins`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`admins` (`admin_id`, `name`, `username`, `password`) VALUES (DEFAULT, 'raul', 'raul123', 'raul');
INSERT INTO `bit_academy`.`admins` (`admin_id`, `name`, `username`, `password`) VALUES (DEFAULT, 'bob', 'bob01', 'bob');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`guests`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`guests` (`guest_id`, `email`, `telephone_nr`, `address`, `address_nr`, `postal_code`, `place_name`) VALUES (DEFAULT, 'hans@test.com', NULL, 'bosweg', '24', '9330 BW', 'Lelystad');
INSERT INTO `bit_academy`.`guests` (`guest_id`, `email`, `telephone_nr`, `address`, `address_nr`, `postal_code`, `place_name`) VALUES (DEFAULT, 'ernie@test.com', '06-02042797', 'dwergweg', 'c34', '6538 DW', 'Amsterdam');
INSERT INTO `bit_academy`.`guests` (`guest_id`, `email`, `telephone_nr`, `address`, `address_nr`, `postal_code`, `place_name`) VALUES (DEFAULT, 'larsvdberg@test.com', NULL, 'geluidstraat', 'a1', '1530 GS', 'Groningen');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`orders`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`orders` (`order_id`, `customer_id`, `guest_id`, `date`, `time`) VALUES (DEFAULT, 1, NULL, '2021-01-12', '11:40:22');
INSERT INTO `bit_academy`.`orders` (`order_id`, `customer_id`, `guest_id`, `date`, `time`) VALUES (DEFAULT, 2, NULL, '2021-03-02', '12:12:01');
INSERT INTO `bit_academy`.`orders` (`order_id`, `customer_id`, `guest_id`, `date`, `time`) VALUES (DEFAULT, 2, NULL, '2021-03-10', '03:10:53');
INSERT INTO `bit_academy`.`orders` (`order_id`, `customer_id`, `guest_id`, `date`, `time`) VALUES (DEFAULT, 3, NULL, '2021-04-15', '22:30:13');
INSERT INTO `bit_academy`.`orders` (`order_id`, `customer_id`, `guest_id`, `date`, `time`) VALUES (DEFAULT, 1, NULL, '2021-04-15', '22:31:19');
INSERT INTO `bit_academy`.`orders` (`order_id`, `customer_id`, `guest_id`, `date`, `time`) VALUES (DEFAULT, NULL, 1, '2021-04-16', '07:31:01');
INSERT INTO `bit_academy`.`orders` (`order_id`, `customer_id`, `guest_id`, `date`, `time`) VALUES (DEFAULT, NULL, 2, '2021-04-18', '12:45:34');
INSERT INTO `bit_academy`.`orders` (`order_id`, `customer_id`, `guest_id`, `date`, `time`) VALUES (DEFAULT, NULL, 3, '2021-04-21', '11:55:57');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`order_has_products`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (1, 2, 4, 'S');
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (1, 3, 2, 'XL');
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (2, 5, 1, NULL);
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (3, 1, 6, 'M');
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (4, 5, 1, NULL);
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (4, 1, 2, 'L');
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (5, 2, 5, 'M');
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (5, 3, 5, 'L');
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (5, 6, 5, NULL);
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (6, 3, 1, 'L');
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (7, 1, 2, 'M');
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (7, 2, 3, 'L');
INSERT INTO `bit_academy`.`order_has_products` (`order_id`, `product_id`, `amount`, `size`) VALUES (8, 5, 1, NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`messages`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`messages` (`message_id`, `email`, `telephone_nr`, `order_nr`, `name`, `subject`, `text`, `read`, `handled`) VALUES (DEFAULT, 'jaap@test.nl', NULL, 1, 'jaap', 'niet goed', 'Dit is een slecht product', DEFAULT, DEFAULT);
INSERT INTO `bit_academy`.`messages` (`message_id`, `email`, `telephone_nr`, `order_nr`, `name`, `subject`, `text`, `read`, `handled`) VALUES (DEFAULT, 'sadek@test.nl', '06-94958761', NULL, 'sadek', 'werkt niet', 'De website werkt niet', DEFAULT, DEFAULT);
INSERT INTO `bit_academy`.`messages` (`message_id`, `email`, `telephone_nr`, `order_nr`, `name`, `subject`, `text`, `read`, `handled`) VALUES (DEFAULT, 'ben@test.nl', NULL, 3, 'ben', 'mooie producten', 'deze producten zijn super', DEFAULT, DEFAULT);
INSERT INTO `bit_academy`.`messages` (`message_id`, `email`, `telephone_nr`, `order_nr`, `name`, `subject`, `text`, `read`, `handled`) VALUES (DEFAULT, 'anna@test.nl', '06 12330411', 2, 'anna', 'the cap is not green', 'the cap that i orderd is not green but dark green', DEFAULT, DEFAULT);

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`sizes`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`sizes` (`size`) VALUES ('S');
INSERT INTO `bit_academy`.`sizes` (`size`) VALUES ('M');
INSERT INTO `bit_academy`.`sizes` (`size`) VALUES ('L');
INSERT INTO `bit_academy`.`sizes` (`size`) VALUES ('XL');

COMMIT;


-- -----------------------------------------------------
-- Data for table `bit_academy`.`product_has_sizes`
-- -----------------------------------------------------
START TRANSACTION;
USE `bit_academy`;
INSERT INTO `bit_academy`.`product_has_sizes` (`product_id`, `size`) VALUES (1, 'M');
INSERT INTO `bit_academy`.`product_has_sizes` (`product_id`, `size`) VALUES (1, 'L');
INSERT INTO `bit_academy`.`product_has_sizes` (`product_id`, `size`) VALUES (2, 'S');
INSERT INTO `bit_academy`.`product_has_sizes` (`product_id`, `size`) VALUES (2, 'M');
INSERT INTO `bit_academy`.`product_has_sizes` (`product_id`, `size`) VALUES (2, 'L');
INSERT INTO `bit_academy`.`product_has_sizes` (`product_id`, `size`) VALUES (3, 'L');
INSERT INTO `bit_academy`.`product_has_sizes` (`product_id`, `size`) VALUES (3, 'XL');

COMMIT;

