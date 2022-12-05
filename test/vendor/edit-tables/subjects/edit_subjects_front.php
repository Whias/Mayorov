<?php
require_once "../../connect.php";
$sql = "SELECT * FROM `subjects`";
$result = $connect->query($sql);
$subjects = $result->fetchAll();
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
    <table style="margin-bottom: 30px;">
        <tr>
            <th>id</th>
            <th>Название предмета</th>
            <th>Сохранить</th>
            <th>Удалить</th>
        </tr>
        <?php
        foreach ($subjects as $subject) :
        ?>
            <tr>
                <form action="update_subjects_back.php" method="POST">
                    <input type="hidden" name="id" value="<?=$subject['id_subject']?>">
                    <td>  <?=$subject['id_subject'] ?>  </td>
                    <td><input type="text" name="name_subject" value="<?=$subject['name_subject'] ?>"></td>
                    <td><input type="submit"value="Сохранить"></td>
                </form>
                <form action="delete_subjects_back.php" method="post">
                <input type="hidden" name="id" value="<?=$subject['id_subject']?>">
                <td><input type="submit" value="Удалить"></td>
                </form>
            </tr>
        <?php endforeach ?>
    </table>
    <form action="create_subjects_front.php" method="post">
        <input type="submit" class="add_obj" value="Добавить новую строку">
    </form>
</body>

</html>