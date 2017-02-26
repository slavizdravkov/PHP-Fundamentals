<?php
if (isset($_GET['costs'])){
    $years = intval($_GET['years']);
    $currentYear = date('Y');
    $expenses = array(array());
    $sumOfExpenses = 0;
    for ($i = 0; $i < $years; $i++){
        $expenses[$i][0] = $currentYear - $i;
        for ($j = 1; $j < 13; $j++){
            $expenses[$i][$j] = random_int(0, 999);
            $sumOfExpenses += $expenses[$i][$j];
        }
        $expenses[$i][13] = $sumOfExpenses;
        $sumOfExpenses = 0;
    }
}

include 'Loops-3-ShowAnnualExpensesHTML.php';