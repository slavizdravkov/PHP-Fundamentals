<?php
class DecimalNumber
{
    private $number;

    /**
     * DecimalNumber constructor.
     * @param $number
     */
    public function __construct($number)
    {
        $this->number = $number;
    }

    public function revNumber()
    {
        return strrev($this->number);
    }
}

$input = trim(fgets(STDIN));
$decimNumber = new DecimalNumber($input);
echo $decimNumber->revNumber();