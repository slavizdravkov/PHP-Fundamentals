<?php
$money = 0;
$currency = "";
$period = 0;
$interest = 0;
$validCurrencies = ['USD' => '$', 'EUR' => '€', 'BGN' => 'лв.'];
$validPeriods = [6 => '6 Months', 12 => '1 Year', 24 => '2 Years', 60 => '5 Years'];

if (isset($_GET["Calculate"])){
    $money = filter_var($_GET["amount"], FILTER_VALIDATE_INT);

    $currency = $_GET["currency"];
    $sign = $validCurrencies[$currency];

    $interest = filter_var($_GET["interest"], FILTER_VALIDATE_INT);

    $period = filter_var($_GET["period"], FILTER_VALIDATE_INT);

    $interestPerMonth = ($interest / 12 / 100) + 1;

    for ($i = 0; $i < $period; $i++) {
        $money *= $interestPerMonth;
    }
    $result = number_format($money, 2, ".", "");
}

include_once 'FrontEnd.php';