<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/14/2018
 * Time: 01:32 AM
 */


class Student
{

    private $id;
    private $name;
    private $grade;
    public $studentData;

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setGrade(string $grade): void
    {
        $this->grade = doubleval($grade);
    }

    public function setStudentData(array $studentData): void
    {
        $this->studentData = $studentData;
    }

    public function addToStudentData(): void
    {
        $this->studentData[$this->id]['name'] = $this->name;
        if($this->grade >= 2 && $this->grade <= 6)
            $this->studentData[$this->id]['grades'][] = $this->grade;
    }

    private function calculateAvgGrade(array $data): float
    {
        return round(array_sum($data) / count($data),2);
    }

    public function displayStudentData(): void
    {
        asort($this->studentData);
        uasort($this->studentData, function ($a, $b) {
            $grade_a = $this->calculateAvgGrade($a['grades']);
            $grade_b = $this->calculateAvgGrade($b['grades']);
            if ($a['name'] == ['name']) {
                if ($grade_a == $grade_b) {
                    return 0;
                } else {
                    return $grade_a > $grade_b ? -1 : 1;
                }
            }else{
                return 0;
            }
        });

        foreach ($this->studentData as $key => $data) {
            $averageGrade = $this->calculateAvgGrade($data['grades']);
            if ($averageGrade >= 5.00) {
                printf('%s -> %.02f' . PHP_EOL, $data['name'], $averageGrade);
            }
        }
    }

}

$student = new Student;

$rows = intval(readline());


$student->setStudentData(array());

for ($i = 0; $i < $rows; $i++) {
    $input = explode(' ', readline());

    $student->setId($i);
    foreach ($input as $key => $data) {
        if ($key == 0) {
            $student->setName($data);
        } else {
            $student->setGrade($data);
            $student->addToStudentData();
        }
    }

}

$student->displayStudentData();

//var_dump($student->studentData);