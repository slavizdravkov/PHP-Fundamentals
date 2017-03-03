<form method="get">
    <div>
        <label>
                Enter tags:
        </label>
    </div>
    <input type="text" name="tags">
    <input type="submit" value="Submit" name="submit">
    <input type="submit" value="Clear" name="clear">

</form>

<?php if (count($tags->getTags()) > 0): ?>
    <?php foreach ($tagsByFrequency as $key => $value): ?>
        <div>
            <?php echo $key; ?> : <?php echo $value; ?> times
        </div>
    <?php endforeach; ?>
    <div>
        Most Frequent Tag is: <?php echo $mostFrequentTag?>
    </div>
<?php endif; ?>