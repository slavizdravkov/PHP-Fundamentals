<?php if(isset($sign, $result)): ?>
    <h4><?= $sign; ?> <?= $result; ?></h4>
<?php endif; ?>

<form method="get">
    <div>
        <label for="money">Enter Amount:</label>
        <input type="text" name="amount" placeholder="Amount" id="money">
    </div>
    <div>
        <?php /** @var $validCurrencies[] */ ?>
        <?php foreach ($validCurrencies as $currencyKey => $currencySign): ?>
            <input id="<?=$currencyKey;?>" type="radio" name="currency" value="<?=$currencyKey;?>"/> <?=$currencyKey?>
        <?php endforeach; ?>
    </div>
    <div>
        <label for="interest">Compound Interest Amount:</label>
        <input id="interest" type="text" name="interest" placeholder="Interest">
    </div>
    <div>
        <select name="period">
            <?php /** @var $validPeriods[] */ ?>
            <?php foreach ($validPeriods as $periodKey => $periodText): ?>
                <option value="<?=$periodKey?>"><?=$periodText?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" name="Calculate" value="Calculate">
    </div>
</form>