<?php

spl_autoload_register();

class Main
{
    /**
     * @var Citizen $data
     */
    private $data;
    public function run()
    {
        return $this;
    }

    public function ReadData()
    {
        $name = readline();
        $age = intval(readline());
        $id = readline();
        $birthdate = readline();
        $this->data = new Citizen($name, $age, $id, $birthdate);
        return $this;
    }

    public function PrintData()
    {
        print $this->data;
    }
}

$main = new Main();

$main->run()->ReadData()->PrintData();

