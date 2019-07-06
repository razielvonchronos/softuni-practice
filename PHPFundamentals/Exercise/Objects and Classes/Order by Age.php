<?php
/**
 * Created by PhpStorm.
 * User: RazielVonChronos
 * Date: 11/13/2018
 * Time: 22:59 PM
 */

$person = new UserLIST();


class UserLIST
{

    public $userData = [];
    public $name;
    public $id;
    public $age;

    /**
     * @param mixed $name
     */

    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = intval($age);
    }

    function addUserToDB(): void
    {
        if (!array_key_exists($this->age, $this->userData)) {
            $this->userData[$this->id][] = $this->name;
            $this->userData[$this->id][] = $this->age;
        }
    }

    public function displayUsers(): void
    {
        uasort($this->userData, function ($a, $b) {

//            var_dump($a[1].' < = > '.$b[1]);
            if ($a[1] == $b[1]) {
                return 0;
            } else {
                return $a[1] < $b[1] ? -1 : 1;
            }
        });
        foreach ($this->userData as $id => $data) {
            printf('%s with ID: %s is %d years old.' . PHP_EOL, $data[0], $id, $data[1]);
//            var_dump($user.' -> '.$data[0].' -> '.$data[1]);
        }
    }
}

while (true) {
    $input = readline();
    if ($input == 'End') {
        break;
    }
    list($name, $id, $age) = explode(' ', $input);

    $person->setName($name);
    $person->setId($id);
    $person->setAge($age);

    $person->addUserToDB();

}

$person->displayUsers();