<form method="get">
    <div>
        Enter number of years:
        <input type="text" name="years">
        <input type="submit" name="costs" value="Show costs">
    </div>
</form>
<?php if (isset($years)){ ?>
    <table border="1" cellpadding="3">
        <thead>
        <tr>
            <th><b>Year</b></th>
            <th><b>January</b></th>
            <th><b>February</b></th>
            <th><b>March</b></th>
            <th><b>April</b></th>
            <th><b>May</b></th>
            <th><b>June</b></th>
            <th><b>July</b></th>
            <th><b>August</b></th>
            <th><b>September</b></th>
            <th><b>October</b></th>
            <th><b>November</b></th>
            <th><b>December</b></th>
            <th><b>Total:</b></th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < $years; $i++){ ?>
            <tr>
            <?php for ($j = 0; $j < 14; $j++){ ?>
                <td align="right"><?= $expenses[$i][$j]; ?></td>
            <?php }; ?>
            </tr>
        <?php }; ?>
        </tbody>
    </table>
<?php } ?>
