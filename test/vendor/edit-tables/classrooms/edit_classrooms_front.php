<?php
require_once "../../connect.php";
$sql = "SELECT * FROM `classrooms`";
$result = $connect->query($sql);
$classrooms = $result->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../styles/edit-tables.css">
    <title>Document</title>
</head>

<body>
    <a class="back" href="../../edit.php">Назад</a>
    <table>
        <tr>
            <th>id</th>
            <th>Номер кабинета</th>
            <th>Сохранить</th>
            <th>Удалить</th>
        </tr>
        <?php
        foreach ($classrooms as $classroom) :
        ?>
            <tr>
                <form action="update_classrooms_back.php" method="POST">
                    <input type="hidden" name="id" value="<?=$classroom['id_classroom']?>">
                    <td>  <?=$classroom['id_classroom'] ?>  </td>
                    <td><input type="number" name="num_room" value="<?=$classroom['num_room'] ?>"></td>
                    <td><input type="submit"value="Сохранить"></td>
                </form>
                <form action="delete_classrooms_back.php" method="post">
                <input type="hidden" name="id" value="<?=$classroom['id_classroom']?>">
                <td><input type="submit" value="Удалить"></td>
                </form>
            </tr>
        <?php endforeach ?>
    </table>
    <form action="create_classrooms_front.php" method="post">
        <input type="submit" class="add_obj" value="Добавить новую строку">
    </form>
</body>

</html>