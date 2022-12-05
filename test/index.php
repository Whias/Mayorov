<?php
require_once "vendor/connect.php";
include_once "vendor/functions.php";
$groups = $connect->query("SELECT * FROM `groups`");
$groups = $groups->fetchAll();
$teachers = $connect->query("SELECT * FROM `teachers`");
$teachers = $teachers->fetchAll();
if(isset($_POST['_id_group']))
$_id_group = $_POST['_id_group'];
else if(isset($_POST['_id_teacher']))
$_id_teacher = $_POST['_id_teacher'];
else
$_id_group = $groups[0]['id_group'];
$days = $connect->query("SELECT * FROM `days`");
$days = $days->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="styles/main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Расписание</title>
</head>

<body>

    <div class="change-group">
        <form action="index.php" method="POST">
            <select name="_id_group" class="select_group">
                <?php 
                foreach ($groups as $_group) : ?>
                <?php if($_id_group):?>
                    <option value="<?= $_group['id_group'] ?>"<?php if($_group['id_group'] == $_id_group):?>selected <?php endif ?>><?= $_group['name_group'] ?></option>
                        <?php else: ?>
                            <option value="<?= $_group['id_group'] ?>"><?= $_group['name_group'] ?></option>
                            <?php endif ?>
                <?php endforeach ?>
            </select>

            <input type="submit" value="Выбрать">
        </form>
    </div>
    <div class="change-teacher">
        <form action="index.php" method="POST">
            <input type="hidden" name="choose_teacher" value="1">
            <select name="_id_teacher" class="select_teacher">
                <?php
                 foreach ($teachers as $_teacher) : ?>
                 <?php if($_id_teacher):?>
                    <option value="<?= $_teacher['id_teacher'] ?>"<?php if($_teacher['id_teacher'] == $_id_teacher):?>selected <?php endif ?>><?= $_teacher['full_name']?></option>
                        <?php else: ?>
                            <option value="<?= $_teacher['id_teacher'] ?>"><?= $_teacher['full_name']?></option>        
                            <?php endif ?>
                <?php endforeach ?>
            </select>

            <input type="submit" value="Выбрать">
        </form>
    </div>
    <?php foreach ($days as $day) : ?>
        <table class="day_th">
            <tr>
                <th><?= $day['name_day'] ?></th>
            </tr>
        </table>
        <div class="main-table">
            <table class="main_table">
                <tr>
                    <th>Звонки</th>
                    <th>Предмет</th>
                    <th>Преподаватель</th>
                    <th>Кабинет</th>
                    <th>Группа</th>
                </tr>
                <?php
                $id_day = $day['id_day'];
                if(isset($_id_teacher))
                $subjects = $connect->query("SELECT * FROM `schedule` WHERE `day_id` = '$id_day' and `teacher_id` = '$_id_teacher' ORDER BY `priority` ASC;");
                else
                $subjects = $connect->query("SELECT * FROM `schedule` WHERE `day_id` = '$id_day' and `group_id` = '$_id_group' ORDER BY `priority` ASC;");
                    

                $subjects = $subjects->fetchAll();
                foreach ($subjects as $subject) :
                    $name_table = "bells";
                    $attribute_name = "id_bell";
                    $attribute_name_schedule = "bell_id";
                    $bell = PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name);
                    $bell['start_lesson'] = mb_substr($bell['start_lesson'], 0, strlen($bell['start_lesson']) - 3);
                    $bell['end_lesson'] = mb_substr($bell['end_lesson'], 0, strlen($bell['end_lesson']) - 3);

                    $name_table = "subjects";
                    $attribute_name_schedule = "subject_id";
                    $attribute_name = "id_subject";
                    $subject1 = PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name);

                    $name_table = "teachers";
                    $attribute_name_schedule = "teacher_id";
                    $attribute_name = "id_teacher";
                    $teacher = PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name);

                    $name_table = "classrooms";
                    $attribute_name_schedule = "classroom_id";
                    $attribute_name = "id_classroom";
                    $classroom = PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name);

                    $name_table = "groups";
                    $attribute_name_schedule = "group_id";
                    $attribute_name = "id_group";
                    $group = PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name);
                ?>
                    <tr class="main_table">
                        <td><?= $bell['start_lesson'] . "-" . $bell['end_lesson'] ?></td>
                        <td><?= $subject1['name_subject'] ?></td>
                        <td><?= $teacher['full_name'] ?></td>
                        <td><?= $classroom['num_room'] ?></td>
                        <td><?= $group['name_group'] ?></td>
                    </tr>

                <?php endforeach ?>
            </table>
        </div>
    <?php endforeach ?>

    <div class="edit-div">
        <form action="vendor/edit.php">
            <input type="submit" value="Редактировать">
        </form>
    </div>
</body>

</html>
<?php 
$teacher_bool = false;
$group_bool = false;
?>