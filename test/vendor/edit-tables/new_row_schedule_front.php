<?php 
require_once "../connect.php"; 
include_once "../functions.php";
$id_day = $_POST['id_day'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles/new_row.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $sql = "SELECT * FROM `days` WHERE `id_day` = '$id_day'";
    $result_day = $connect->query($sql);
    $day = $result_day->fetchAll();
    $day = $day[0];
    ?>
Вы добавляете в: <?= $day['name_day']?>
<form method="post" action="new_row_schedule_back.php">
    <input type="hidden" name="select_day" value="<?=$day['id_day']?>">
    <select name="select_bell">
        <?php
        $name_table = "bells";
        $bells = AddSelect($name_table);
        foreach ($bells as $bell) :
        ?>
            <option value="<?= $bell['id_bell'] ?>"><?=mb_substr( $bell['start_lesson'],0, strlen( $bell['start_lesson'])-3) . "-" . mb_substr( $bell['end_lesson'],0, strlen( $bell['end_lesson'])-3)?></option>
        <?php endforeach ?>
    </select>
        <select name="select_classroom">
        <?php 
        $name_table = "classrooms";
        $classrooms = AddSelect($name_table);
        foreach($classrooms as $classroom):
        ?>
        <option value="<?=$classroom['id_classroom']?>"><?=$classroom['num_room']?></option>
        <?php endforeach?>
        </select>
        <select name="select_group">
        <?php 
        $name_table = "groups";
        $groups = AddSelect($name_table);
        foreach($groups as $group):
        ?>
        <option value="<?=$group['id_group']?>"><?=$group['name_group']?></option>
        <?php endforeach?>
        </select>
        <select name="select_subject">
        <?php 
        $name_table = "subjects";
        $subjects = AddSelect($name_table);
        foreach($subjects as $subject):
        ?>
        <option value="<?=$subject['id_subject']?>"><?=$subject['name_subject']?></option>
        <?php endforeach?>
        </select>
        <select name="select_teacher">
        <?php 
        $name_table = "teachers";
        $teachers = AddSelect($name_table);
        foreach($teachers as $teacher):
        ?>
        <option value="<?=$teacher['id_teacher']?>"><?=$teacher['full_name']?></option>
        <?php endforeach?>
        </select>
    <input type="submit" value="Добавить">
</form>
</body>
</html>