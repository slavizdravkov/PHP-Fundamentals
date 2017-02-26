<?php
class Number
{
    private $integerNumber;

    /**
     * Number constructor.
     * @param $integerNumber
     */
    public function __construct(int $integerNumber)
    {
        $this->integerNumber = $integerNumber;
    }

    public function nameOfLastDigit()
    {
        $lastDigit = $this->integerNumber % 10;
        $nameOfDigit = '';
        switch ($lastDigit){
            case 0:
                $nameOfDigit = 'zero';
                break;
            case 1:
                $nameOfDigit = 'one';
                break;
            case 2:
                $nameOfDigit = 'two';
                break;
            case 3:
                $nameOfDigit = 'three';
                break;
            case 4:
                $nameOfDigit = 'four';
                break;
            case 5:
                $nameOfDigit = 'five';
                break;
            case 6:
                $nameOfDigit = 'six';
                break;
            case 7:
                $nameOfDigit = 'seven';
                break;
            case 8:
                $nameOfDigit = 'eight';
                break;
            case 9:
                $nameOfDigit = 'nine';
                break;
        }
        return $nameOfDigit;
    }
}

$input = intval(trim(fgets(STDIN)));
$number = new Number($input);
echo $number->nameOfLastDigit();