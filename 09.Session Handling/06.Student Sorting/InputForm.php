<form  method="get">
    <div style="width: 50%; margin: auto">

        <table border="1px" cellpadding="3px" cellspacing="1px">
            <tr>
                <th>First name:</th>
                <th>Last name:</th>
                <th>Email:</th>
                <th>Exam score:</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="firstName[]" placeholder="First Name">
                </td>
                <td>
                    <input type="text" name="lastName[]" placeholder="Last Name">
                </td>
                <td>
                    <input type="text" name="email[]" placeholder="Email">
                </td>
                <td>
                    <input type="text" name="examScore[]" placeholder="Exam Score">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="firstName[]" placeholder="First Name">
                </td>
                <td>
                    <input type="text" name="lastName[]" placeholder="Last Name">
                </td>
                <td>
                    <input type="text" name="email[]" placeholder="Email">
                </td>
                <td>
                    <input type="text" name="examScore[]" placeholder="Exam Score">
                </td>
            </tr>

            <tr>
                <td>
                    <input type="text" name="firstName[]" placeholder="First Name">
                </td>
                <td>
                    <input type="text" name="lastName[]" placeholder="Last Name">
                </td>
                <td>
                    <input type="text" name="email[]" placeholder="Email">
                </td>
                <td>
                    <input type="text" name="examScore[]" placeholder="Exam Score">
                </td>
            </tr>
        </table>

        <div>
            <label>Sort by:</label>
            <select name="sortBy">
                <option value="firstName">First Name</option>
                <option value="lastName">Last Name</option>
                <option value="email">Email</option>
                <option value="examScore">Exam Score</option>
            </select>
            <label>Order:</label>
            <select name="order">
                <option value="ascending">Ascending</option>
                <option value="descending">Descending </option>
            </select>
            <input type="submit" value="Submit" name="submit">
        </div>
    </div>

</form>