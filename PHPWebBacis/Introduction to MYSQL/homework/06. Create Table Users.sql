DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`(
`id` INT AUTO_INCREMENT,
`username` VARCHAR(30) NOT NULL,
`password` VARCHAR(26) NOT NULL,
`profile_picture` VARBINARY(2),
`last_login_time` DATETIME,
`is_deleted` BOOLEAN, UNIQUE (`username`), PRIMARY KEY(`id`)
);
TRUNCATE `users`;
INSERT INTO `users` (`username`, `password` , `profile_picture`, `last_login_time`, `is_deleted`) VALUES
('razielvonchronos', 'bloodyhell', NULL, NOW(), false),
('pesho', 'bloodyhell', NULL, '2019-05-27 13:00:55', false),
('kiro', 'bloodyhell', NULL, '2019-05-27 01:55:13', false),
('chushkata', 'bloodyhell', NULL, '2019-05-27 18:30:20', true),
('malkatajulka', 'bloodyhell', NULL, '2019-05-27 20:04:34', true);