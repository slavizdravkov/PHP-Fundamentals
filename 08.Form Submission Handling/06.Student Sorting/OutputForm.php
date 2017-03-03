<?php if (!isset($students)): ?>
    <?php header("Location: BackEnd.php"); ?>
    <?php exit; ?>
<?php endif; ?>

<div style="width: 50%; margin: auto">
    <table border="1px" cellpadding="3px" cellspacing="1px">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Score</th>
        </tr>
        <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $student->getFirstName();?></td>
                <td><?= $student->getLastName();?></td>
                <td><?= $student->getEmail();?></td>
                <td align="right"><?= $student->getExamScore();?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><b>Average Score:</b></td>
            <td align="right"><b><?= $averageScore?></b></td>
        </tr>
    </table>
</div>
