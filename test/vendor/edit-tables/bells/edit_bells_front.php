<?php
require_once "../../connect.php";
$sql = "SELECT * FROM `bells`";
$result = $connect->query($sql);
$bells = $result->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../../styles/edit-tables.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a class="back" href="../../edit.php">Назад</a>
    <table>
        <tr>
            <th>id</th>
            <th>Начало занятия</th>
            <th>Конец занятия</th>
            <th>Сохранить</th>
            <th>Удалить</th>
        </tr>
        <?php
        foreach ($bells as $bell) :
        ?>
            <tr>
                <form action="update_bells_back.php" method="POST">
                    <input type="hidden" name="id" value="<?=$bell['id_bell'] ?>">
                    <td>  <?=$bell['id_bell'] ?>  </td>
                    <td><input type="time" name="start_lesson" value="<?=$bell['start_lesson'] ?>"></td>
                    <td><input type="time" name="end_lesson" value="<?=$bell['end_lesson'] ?>"></td>
                    <td><input type="submit"value="Сохранить"></td>
                </form>
                <form action="delete_bells_back.php" method="post">
                <input type="hidden" name="id" value="<?=$bell['id_bell'] ?>">
                <td><input type="submit" value="Удалить"></td>
                </form>
            </tr>
        <?php endforeach ?>
    </table>
    <form action="create_bells_front.php" method="post">
        <input type="submit" class="add_obj" value="Добавить новую строку">
    </form>
</body>

</html>