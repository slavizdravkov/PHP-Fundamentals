<?php


class InterestCalculator
{
    public function addParameters(int $money, $currency,
                                  $currencySign, int $interest,
                                  int $period)
    {
        $_SESSION["calculator"] = ["money" => $money, "currency" => $currency,
                                    "currencySign" => $currencySign, "interest" => $interest,
                                    "period" => $period,
                                    "calculatedInterest" => $this->calcInterest($money, $interest, $period)];
    }

    private function calcInterest( int $money, int $interest, int $period):float
    {
        $interestPerMonth = ($interest / 12 / 100) + 1;

        for ($i = 0; $i < $period; $i++) {
            $money *= $interestPerMonth;
        }

        return number_format($money, 2, ".", "");
    }

    public function isCalculated():bool
    {
        return isset($_SESSION["calculator"]["currencySign"], $_SESSION["calculator"]["calculatedInterest"]);
    }

    public function getCurrencySign()
    {
        return $calcParameters = $_SESSION["calculator"]["currencySign"];
    }

    public function gerResult()
    {
        return $calcParameters = $_SESSION["calculator"]["calculatedInterest"];
    }
}