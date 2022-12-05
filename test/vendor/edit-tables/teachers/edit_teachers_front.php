<?php
require_once "../../connect.php";
$sql = "SELECT * FROM `teachers`";
$result = $connect->query($sql);
$teachers = $result->fetchAll();
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
            <th>ФИО</th>
            <th>Сохранить</th>
            <th>Удалить</th>
        </tr>
        <?php
        foreach ($teachers as $teacher) :
        ?>
            <tr>
                <form action="update_teachers_back.php" method="POST">
                    <input type="hidden" name="id" value="<?=$teacher['id_teacher']?>">
                    <td>  <?=$teacher['id_teacher'] ?>  </td>
                    <td><input type="text" name="full_name" value="<?=$teacher['full_name'] ?>"></td>
                    <td><input type="submit"value="Сохранить"></td>
                </form>
                <form action="delete_teachers_back.php" method="post">
                <input type="hidden" name="id" value="<?=$teacher['id_teacher']?>">
                <td><input type="submit" value="Удалить"></td>
                </form>
            </tr>
        <?php endforeach ?>
    </table>
    <form action="create_teachers_front.php" method="post">
        <input type="submit" class="add_obj" value="Добавить новую строку">
    </form>
</body>

</html>