<?php
session_start();

include_once "InterestCalculator.php";
$calc = new InterestCalculator();

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

    $calc->addParameters($money, $currency, $sign, $interest, $period);
}

include_once 'FrontEnd.php';