<?php

class Employee
{
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var float $salary
     */
    private $salary;
    /**
     * @var string
     */
    private $position;
    /**
     * @var string $department
     */
    private $department;
    /**
     * @var string $email
     */
    private $email;
    /**
     * @var int $age
     */
    private $age;

    /**
     * Employee constructor.
     * @param string $name
     * @param float $salary
     * @param string $position
     * @param string $department
     * @param string|null $email
     * @param int|null $age
     */
    public function __construct(string $name, float $salary, string $position, string $department, ?string $email = null, ?int $age = null)
    {
        $this->name = $name;
        $this->salary = $salary;
        $this->position = $position;
        $this->department = $department;
        $this->email = $email ? $email : "n/a";
        $this->age = $age ? $age : -1;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getSalary(): float
    {
        return $this->salary;
    }

    /**
     * @param float $salary
     */
    public function setSalary(float $salary): void
    {
        $this->salary = $salary;
    }

    /**
     * @return string
     */
    public function getPosition(): string
    {
        return $this->position;
    }

    /**
     * @param string $position
     */
    public function setPosition(string $position): void
    {
        $this->position = $position;
    }

    /**
     * @return string
     */
    public function getDepartment(): string
    {
        return $this->department;
    }

    /**
     * @param string $department
     */
    public function setDepartment(string $department): void
    {
        $this->department = $department;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }
}

$n = intval(readline());

$employees = [];

for ($i = 0; $i < $n; $i++) {
    $input = explode(' ', readline());
    list($name, $salary, $position, $department) = $input;

    /** @var Employee[] $employees [$department] */
    $employees[$department][$name] = new Employee($name, $salary, $position, $department);
    if (isset($input[4]))
        !preg_match('/[@]+/mu', $input[4]) ? $employees[$department][$name]->setAge($input[4]) : $employees[$department][$name]->setEmail($input[4]);
    if (isset($input[5]))
        $employees[$department][$name]->setAge($input[5]);
}
function BestDepartment(array &$employees)
{
    $best = null;
    $avg = null;
    foreach ($employees as $department => $data) {
        $sum = 0;
        foreach ($data as $name => $employee) {
            $sum += $employee->getSalary();
        }
        $best = $avg >= $sum / count($data) ? $best : $department;
        $avg = $avg >= $sum / count($data) ? $avg : $sum / count($data);
    }
    return $best;

}

printf('Highest Average Salary: %s' . PHP_EOL, BestDepartment($employees));

foreach ($employees as $department => $data) {
    if ($department != BestDepartment($employees))
        continue;

    uasort($data, function (Employee $a, Employee $b) use ($employees) {
        $person_a = $a->getSalary();
        $person_b = $b->getSalary();
        return $person_b <=> $person_a;
    });

    foreach ($data as $name => $employee) {
        printf('%s %0.2f %s %d' . PHP_EOL,
            $employee->getName(),
            $employee->getSalary(),
            $employee->getEmail(),
            $employee->getAge()
        );
    }
}