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

INSERT INTO `minions`(`id`,`name`, `age`, `town_id`) VALUES(1,'Kevin', 22, 1);
INSERT INTO `minions`(`id`,`name`, `age`, `town_id`) VALUES(2,'Bob', 15, 3);
INSERT INTO `minions`(`id`,`name`, `age`, `town_id`) VALUES(3,'Steward', NULL, 1);

INSERT INTO `towns`(`id`,`name`) VALUES(1,'Sofia');
INSERT INTO `towns`(`id`,`name`) VALUES(2,'Plovdiv');
INSERT INTO `towns`(`id`,`name`) VALUES(3,'Varna');

TRUNCATE `minions`;