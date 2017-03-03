<form method="get">
    <div>
        <label>Enter HTML tags:</label>
    </div>
    <div>
        <input type="text" name="tags">
        <input type="submit" name="submit" value="Submit">
    </div>
</form>

<?php if (isset($tag)): ?>
    <h2><?=$output?></h2>
    <h2>Score: <?=$counter?></h2>
<?php endif; ?>
