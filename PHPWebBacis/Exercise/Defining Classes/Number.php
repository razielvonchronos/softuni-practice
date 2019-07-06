<?php

class Number
{
    /**
     * @var int[] $number
     */
    private $number;
    /**
     * @var array $dictionary
     */
    private $dictionary = ['zero', 'one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'];

    /**
     * @var array $digits
     */
    private $digits = [];

    /**
     * Number constructor.
     * @param int $number
     */
    public function __construct(int $number)
    {
        $this->number = $number;
    }

    /**
     * @param int $i
     * @return int
     */
    public function IntToString()
    {
        $number = end($this->digits);
        return $this->dictionary[$number];
    }

    /**
     * @return $this
     */
    public function ExplodeNumber()
    {
        $this->digits = str_split($this->number);
        return $this;
    }
}

$input = intval(readline());
$number = new Number($input);
printf('%s', $number->ExplodeNumber()->IntToString());
