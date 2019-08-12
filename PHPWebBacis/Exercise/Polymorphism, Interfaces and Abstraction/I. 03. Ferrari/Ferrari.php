<?php

class Ferrari implements Car
{

    /**
     * @var string $model
     */
    private $model;
    /**
     * @var string $driver
     */
    private $driver;

    /**
     * Ferrari constructor.
     * @param string $model
     * @param string $driver
     */
    public function __construct(string $driver, string $model = "488-Spider")
    {
        $this->model = $model;
        $this->driver = $driver;
    }

    public function __toString()
    {
        return sprintf("%s/%s/%s/%s", $this->model, $this->UseBreaks(),$this->PushGas(), $this->driver);
    }


    public function Start()
    {
        print $this;
    }

    /**
     *
     */
    public function PushGas()
    {
        return "Zadu6avam sA!";
    }

    /**
     *
     */
    public function UseBreaks()
    {
        return "Brakes!";
    }

    /**
     * @return string
     */
    public function getDriver(): string
    {
        return $this->driver;
    }

    /**
     * @param string $driver
     */
    public function setDriver(string $driver): void
    {
        $this->driver = $driver;
    }
}