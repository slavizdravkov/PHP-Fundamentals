<table border="1" cellpadding="3">
    <thead>
        <tr>
            <th>Number</th>
            <th>Square</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i <= 100; $i++){ ?>
            <tr align="right">
                <?php if ($i % 2 == 0){ ?>
                    <td><?= $i; ?></td>
                    <td><?= round(sqrt($i), 2); ?></td>
                <?php } ?>
            </tr>
        <?php }; ?>
        <tr>
            <td><b>Total:</b></td>
            <td><?= $sum; ?></td>
        </tr>
    </tbody>
</table>
