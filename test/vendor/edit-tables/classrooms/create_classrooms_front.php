﻿<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/edit-tables.css">
    <title>Document</title>
</head>

<body>
    <table>
        <tr>
            <th>Номер кабинета</th>
            <th>Добавить</th>
        </tr>
        <tr>
            <form action="create_classrooms_back.php" method="POST">
                <td><input type="number" name="num_room"></td>
                <td><input type="submit" value="Добавить"></td>
        </tr>
        </form>
    </table>
</body>

</html>