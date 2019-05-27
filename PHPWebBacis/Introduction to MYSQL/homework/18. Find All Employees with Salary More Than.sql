SET @MIN_SALARY := 50000;
SELECT `first_name`, `last_name`, `salary` FROM `employees` WHERE `salary` > @MIN_SALARY ORDER BY `salary` DESC;