<?php
require_once "../../connect.php";
$sql = "SELECT * FROM `groups`";
$result = $connect->query($sql);
$groups = $result->fetchAll();
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
            <th>Название группы</th>
            <th>Сохранить</th>
            <th>Удалить</th>
        </tr>
        <?php
        foreach ($groups as $group) :
        ?>
            <tr>
                <form action="update_groups_back.php" method="POST">
                    <input type="hidden" name="id" value="<?=$group['id_group']?>">
                    <td>  <?=$group['id_group'] ?>  </td>
                    <td><input type="text" name="name_group" value="<?=$group['name_group'] ?>"></td>
                    <td><input type="submit"value="Сохранить"></td>
                </form>
                <form action="delete_groups_back.php" method="post">
                <input type="hidden" name="id" value="<?=$group['id_group']?>">
                <td><input type="submit" value="Удалить"></td>
                </form>
            </tr>
        <?php endforeach ?>
    </table>
    <form action="create_groups_front.php" method="post">
        <input type="submit" class="add_obj" value="Добавить новую строку">
    </form>
</body>

</html>