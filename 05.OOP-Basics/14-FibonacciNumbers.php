<?php

class Fibonacci
{
    private $fibonNumbers = [];

    public function addNumber($number)
    {
        $this->fibonNumbers[] = $number;
    }

    public function calculateFibonNumbers(int $start, int $end)
    {
        for ($i = 0; $i < $end; $i++) {
            if ($i == 0){
                $this->addNumber($i);
            }elseif ($i == 1){
                $this->addNumber($i);
            }else{
                $number1 = $this->fibonNumbers[$i - 2];
                $number2 = $this->fibonNumbers[$i - 1];
                $this->addNumber($number1 + $number2);
            }
        }

        $outputArray = array_slice($this->fibonNumbers, $start, $end - $start);

        return implode(', ', $outputArray);
    }
}

$startNumber = intval(trim(fgets(STDIN)));
$endNumber = intval(trim(fgets(STDIN)));
$fibonacciNumbers = new Fibonacci();
echo $fibonacciNumbers->calculateFibonNumbers($startNumber, $endNumber);