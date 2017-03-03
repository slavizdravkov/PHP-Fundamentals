<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CV</title>
</head>
<body>
    <form method="get">

        <fieldset>
            <legend>Personal Innformation</legend>
            <input type="text" name="firstName" placeholder="First Name"><br/>
            <input type="text" name="lastName" placeholder="Last Name"><br/>
            <input type="text" name="email" placeholder="Email"><br/>
            <input type="text" name="phoneNumber" placeholder="Phone Number"><br/>
            Female <input type="radio" name="gender" value="female">
            Male <input type="radio" name="gender" value="male"><br/>
            <label>Birth Date</label><br/>
            <input type="text" name="birthDate" placeholder="dd/mm/yyyy"><br/>
            <label>Nationality</label><br/>
            <select name="nationality">
                <option name="bulgarian">Bulgarian</option>
            </select>
        </fieldset>

        <fieldset>
            <legend>Last Work Position</legend>
            <label>Company Name</label>
            <input type="text" name="companyName"><br/>
            <label>From</label>
            <input type="text" name="fromDate" placeholder="dd/mm/yyyy"><br/>
            <label>To</label>
            <input type="text" name="toDate" placeholder="dd/mm/yyyy"><br/>
        </fieldset>

        <fieldset>
            <legend>Computer Skills</legend>
            <label>Programming Languages</label><br/>
            <input type="text" name="programmingLang[]">
            <select name="langSkill[]">
                <option value="beginner">Beginner</option>
                <option value="advanced">Advanced</option>
                <option value="programmer">Programmer</option>
            </select><br/>
            <input type="text" name="programmingLang[]">
            <select name="langSkill[]">
                <option value="beginner">Beginner</option>
                <option value="advanced">Advanced</option>
                <option value="programmer">Programmer</option>
            </select><br/>
        </fieldset>

        <fieldset>
            <legend>Other Skills</legend>
            <label>Languages</label><br/>
            <input type="text" name="lang[]">
            <select name="langComprehension[]">
                <option value="comprehension">-Comprehension-</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
            <select name="langReading[]">
                <option value="reading">-Reading-</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
            <select name="langWriting[]">
                <option value="writing">-Writing-</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select><br/>

            <input type="text" name="lang[]">
            <select name="langComprehension[]">
                <option value="comprehension">-Comprehension-</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
            <select name="langReading[]">
                <option value="reading">-Reading-</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
            <select name="langWriting[]">
                <option value="writing">-Writing-</option>
                <option value="beginner">Beginner</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select><br/>
            <label>Driver's License</label><br/>
            B <input type="checkbox" name="driversCategory[]" value="B">
            A <input type="checkbox" name="driversCategory[]" value="A">
            C <input type="checkbox" name="driversCategory[]" value="C"><br/>
        </fieldset>
        <input type="submit" name="submit" value="Generate CV">
    </form>
</body>
</html>