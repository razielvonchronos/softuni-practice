DROP TABLE IF EXISTS `people`;
CREATE TABLE `people`(
`id` INT AUTO_INCREMENT,
`name` VARCHAR(200) NOT NULL,
`picture` VARBINARY(2),
`height` DECIMAL(5,2),
`weight` DECIMAL(5,2),
`gender` CHAR(1) NOT NULL CHECK(`gender`='m' OR `gender` ='f'),
`birthdate` DATE NOT NULL,
`biography` TEXT,
UNIQUE(`id`)
);

TRUNCATE `people`;
INSERT INTO `people` (`name`, `picture`, `height`, `weight`, `gender`, `birthdate`, `biography`) VALUES
('Spasimir', NULL, 1.69, 75, 'm', '1989-10-15', 'PHP Rookie'),
('Spasimir', NULL, 1.69, 75, 'm', '1989-10-15', 'PHP Rookie'),
('Spasimir', NULL, 1.69, 75, 'm', '1989-10-15', 'PHP Rookie'),
('Spasimir', NULL, 1.69, 75, 'm', '1989-10-15', 'PHP Rookie'),
('Spasimir', NULL, 1.69, 75, 'm', '1989-10-15', 'PHP Rookie');
