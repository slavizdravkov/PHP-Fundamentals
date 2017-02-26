<form method="get">
    <div>
        Enter cars:
        <input type="text" name="cars" size="100px">
        <input type="submit" name="result" value="Show result">
    </div>
</form>
<?php if (isset($carsArray)){ ?>
    <table border="1" cellpadding="3">
        <thead>
        <tr>
            <th>Car</th>
            <th>Color</th>
            <th>Count</th>
        </tr>
        </thead>
        <tbody>
        <?php for ($i = 0; $i < count($carsArray); $i++){ ?>
            <tr>
                <td><?= $carsArray[$i]; ?></td>
                <td><?= $colorsOfCars[random_int(0, 4)]; ?></td>
                <td><?= random_int(1, 5); ?></td>
            </tr>
        <?php }; ?>
        </tbody>
    </table>
<?php } ?>