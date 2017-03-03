<form method="get">
    <div>
        <label for="tags">
                Enter tags:
        </label>
    </div>
    <input id="tags" type="text" name="tags">
    <input type="submit" value="Submit" name="submit">

</form>

<?php if (isset($tags)): ?>
    <?php foreach ($tags as $i => $tag): ?>
        <div>
            <?php echo $i; ?> : <?php echo $tag; ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>