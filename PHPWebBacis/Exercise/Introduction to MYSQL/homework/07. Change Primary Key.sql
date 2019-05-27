ALTER TABLE `users`
ALTER `id` DROP DEFAULT; 
ALTER TABLE `users`
CHANGE COLUMN `id` `id` INT(11) not null first;
ALTER TABLE `users`
	DROP PRIMARY KEY;
	
ALTER TABLE `users`
ADD CONSTRAINT pk_users PRIMARY KEY (`id`,`username`); 