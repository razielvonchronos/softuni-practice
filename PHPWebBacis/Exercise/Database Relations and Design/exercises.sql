
-- 01. Records’ Count 
SELECT 
	COUNT(*) as `count` 
FROM 
	`wizzard_deposits`;

-- 02. Longest Magic Wand 
SELECT 
	MAX(`magic_wand_size`) as `longest_magic_wand` 
FROM 
	`wizzard_deposits`;

-- 03. Longest Magic Wand per Deposit Groups 
SELECT 
	`deposit_group`, MAX(`magic_wand_size`) as `longest_magic_wand`
FROM 
	`wizzard_deposits` 
GROUP BY 
	`deposit_group`
ORDER BY 
	`longest_magic_wand` ASC, `deposit_group` ASC;
	
-- 04. Smallest Deposit Group per Magic Wand Size 
-- Variant 1
SELECT 
	deposit_group
FROM 
	`wizzard_deposits`
ORDER BY 
	`magic_wand_size` DESC
LIMIT 1;

-- 05. Deposits Sum 
SELECT 
	`deposit_group`, SUM(`deposit_amount`) as total_sum 
FROM 
	`wizzard_deposits` 
GROUP BY 
	`deposit_group`
ORDER BY 
	`total_sum` ASC;

-- 06. Appetizers Count 
SELECT 
	COUNT(`category_id`)
FROM 
	`products` 
WHERE
	category_id = 2 and price > 8;
	
-- 07. Menu Prices 
SELECT 
	category_id, ROUND(AVG(`price`),2) as "Average Price",
	ROUND(MIN(`price`), 2) as "Cheapest Product",
	ROUND(MAX(`price`), 2) as "Most Expensive Product"
FROM 
	`products` 
GROUP BY 
	`category_id`;
	
-- 08. Employee Address 

-- Variant 1
SELECT 
	`employee_id`, 
	`job_title`, 
	`address_id`, 
	(SELECT `address_text` FROM `addresses` WHERE a.`address_id` = `address_id`) as `address_text`
FROM 
	`employees` as a
ORDER BY 
	`address_id` ASC
LIMIT 5;

-- Variant 2
SELECT 
	em.`employee_id`, 
	em.`job_title`, 
	em.`address_id`, 
	ad.`address_text`
FROM 
	`employees` as em
INNER JOIN 
	`addresses` as ad
ON 
	ad.`address_id` = em.`address_id`
ORDER BY 
	`address_id` ASC
LIMIT 5;

-- 09. Employee Departments 
SELECT 
	em.`employee_id`, 
	em.`first_name`, 
	em.`salary`, 
	de.`name`
FROM 
	`employees` as em
INNER JOIN 
	`departments` as de
ON 
	de.`department_id` = em.`department_id` and em.`salary` > 15000
ORDER BY 
	em.`department_id` DESC
LIMIT 5;

-- 10. Employees Without Project 
SELECT 
	em.`employee_id`, 
	em.`first_name`
FROM 
	`employees` as em
WHERE em.`employee_id` NOT IN (SELECT employee_id FROM employees_projects)
ORDER BY 
	em.`employee_id` DESC
LIMIT 3;
	
-- 11. Employee 24 

SELECT 
	ep.`employee_id`, 
	e.`first_name`, 
	IF(YEAR(p.start_date) >= 2005, p.start_date = NULL, p.`name`) as project_name
FROM 
	`employees_projects` as ep
JOIN `employees` as e
	ON	ep.employee_id  = e.`employee_id`
JOIN `projects` as p
	ON	ep.project_id  = p.project_id
WHERE 
	ep.employee_id  = '24'
ORDER BY 
	`project_name` ASC;
	
-- 12. Employee Manager 

SELECT 
	e.`employee_id`, 
	e.`first_name`, 
	m.`employee_id` as `manager_id`, 
	m.`first_name` as `manager_name`
FROM 
	`employees` as e
JOIN `employees` as m
	ON	e.manager_id  = m.`employee_id`
WHERE 
	m.employee_id  = '3' OR m.employee_id  = '7' 
ORDER BY 
	e.`first_name` ASC;
	
-- 13. Employee Summary 

SELECT 
	e.`employee_id`, 
	CONCAT(e.`first_name`, ' ', e.`last_name`) as employee_name, 
	CONCAT(m.`first_name`, ' ', m.`last_name`) as `manager_name`,
	d.`name` as `department_name`
FROM 
	`employees` as e
JOIN `employees` as m
	ON	e.manager_id  = m.`employee_id`
JOIN `departments` as d
	ON	e.department_id  = d.department_id
ORDER BY 
	e.`employee_id` ASC LIMIT 5;
	

	
	


