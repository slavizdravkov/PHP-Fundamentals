<?php if (!isset($personalInformation) || !isset($lastWorkPosition) || !isset($formData)): ?>
    <?php header("Location: BackEnd.php"); ?>
    <?php exit; ?>
<?php endif; ?>

<div>
    <table border="1px" cellpadding="3px" cellspacing="1px">
        <tr>
            <th colspan="2">Personal Information</th>
        </tr>
        <?php foreach ($personalInformation as $key => $value): ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <table border="1px" cellpadding="3px" cellspacing="1px">
        <tr>
            <th colspan="2">Last Work Position</th>
        </tr>
        <?php foreach ($lastWorkPosition as $key => $value): ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>

    <table border="1px" cellpadding="3px" cellspacing="1px">
        <tr>
            <th colspan="2">Computer Skills</th>
        </tr>
        <tr>
            <td>Programming Languages</td>
            <td>
                <table border="1px" cellpadding="3px" cellspacing="1px">
                    <tr>
                        <th>Language</th>
                        <th>Skill Level</th>
                    </tr>
                    <?php foreach ($formData["languages"] as $language => $skill): ?>
                        <tr>
                            <td><?= $language ?></td>
                            <td><?= $skill ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <table border="1px" cellpadding="3px" cellspacing="1px">
        <tr>
            <th colspan="2">Other Skills</th>
        </tr>
        <tr>
            <td>Languages</td>
            <td>
                <table border="1px" cellpadding="3px" cellspacing="1px">
                    <tr>
                        <th>Language</th>
                        <th>Comprehension</th>
                        <th>Reading</th>
                        <th>Writing</th>
                    </tr>
                    <?php foreach ($formData["speakingLanguages"] as $speakingLanguage => $data): ?>
                        <tr>
                            <td><?= $speakingLanguage ?></td>
                            <td><?= $data["langComprehension"] ?></td>
                            <td><?= $data["reading"] ?></td>
                            <td><?= $data["writing"] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </td>
        </tr>
        <tr>
            <td>Driver's License</td>
            <td><?= implode(", ", $formData["drivingLicense"])?></td>
        </tr>
    </table>
</div>