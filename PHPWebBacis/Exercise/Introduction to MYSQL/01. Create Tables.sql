
DROP TABLE IF EXISTS `minions`;
CREATE TABLE `minions`(
`id` INT AUTO_INCREMENT,
`name` VARCHAR(255),
`age` INT(11),
`town_id` INT(11),
PRIMARY KEY(`id`)
);

DROP TABLE IF EXISTS `towns`;
CREATE TABLE `towns`(
`id` INT AUTO_INCREMENT,
`name` VARCHAR(255),
PRIMARY KEY (`id`)
);
