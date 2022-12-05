<?php
require_once "connect.php";
include_once "functions.php";
$days = $connect->query("SELECT * FROM days");
$days = $days->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../styles/edit.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Расписание</title>
</head>

<body>
<table class="edit_tables">
                <tr>
                <th>Редактирование таблиц:</th>
                </tr>
                <tr>
                    <td><a href="edit-tables/bells/edit_bells_front.php">Звонки</a></td>
                </tr>
                <tr>
                    <td><a href="edit-tables\subjects\edit_subjects_front.php">Предметы</a></td>
                </tr>
                <tr>
                    <td><a href="edit-tables\teachers\edit_teachers_front.php">Преподаватели</a></td>
                </tr>
                <tr>
                    <td><a href="edit-tables\classrooms\edit_classrooms_front.php">Кабинеты</a></td>
                </tr>
                <tr>
                    <td><a href="edit-tables\groups\edit_groups_front.php">Группы</a></td>
                </tr>
                
            </table>
        <?php foreach ($days as $day) : ?>
    <table class="day_th">
            <tr>
                <th><?= $day['name_day'] ?></th>
            </tr>
    </table>
    <div class="main-table">
    <table class="main_table">
            <tr>
                <th>Перемещение</th>
                <th>Звонки</th>
                <th>Предмет</th>
                <th>Преподаватель</th>
                <th>Кабинет</th>
                <th>Группа</th>
                <th>Сохранить</th>
                <th>Удалить</th>
            </tr>
            <?php
            $id_day = $day['id_day'];
            $subjects = $connect->query("SELECT * FROM `schedule` WHERE `day_id` = '$id_day' ORDER BY `priority` ASC");
            $subjects = $subjects->fetchAll();
            foreach ($subjects as $subject) :
                $name_table = "bells";
                $attribute_name = "id_bell";
                $attribute_name_schedule = "bell_id";
                $bell = PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name);
                if(!($bell === null))
                {
                $bell['start_lesson'] = mb_substr($bell['start_lesson'],0, strlen($bell['start_lesson'])-3);
                $bell['end_lesson'] = mb_substr($bell['end_lesson'],0, strlen($bell['end_lesson'])-3);
            }
                $sql = "SELECT * FROM `$name_table`";
                $result = $connect->query($sql);
                $bells = $result->fetchAll();
                for($i = 0; $i < count($bells); $i++){
                $bells[$i]['start_lesson'] = mb_substr( $bells[$i]['start_lesson'],0, strlen( $bells[$i]['start_lesson'])-3);
                $bells[$i]['end_lesson'] = mb_substr( $bells[$i]['end_lesson'],0, strlen( $bells[$i]['end_lesson'])-3);
            }
                $name_table = "subjects";
                $attribute_name_schedule = "subject_id";
                $attribute_name = "id_subject";
                $subject1 = PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name);
                $sql = "SELECT * FROM `$name_table`";
                $result = $connect->query($sql);
                $subjects1 = $result->fetchAll();

                $name_table = "teachers";
                $attribute_name_schedule = "teacher_id";
                $attribute_name = "id_teacher";
                $teacher = PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name);
                $sql = "SELECT * FROM `$name_table`";
                $result = $connect->query($sql);
                $teachers = $result->fetchAll();
                
                $name_table = "classrooms";
                $attribute_name_schedule = "classroom_id";
                $attribute_name = "id_classroom";
                $classroom = PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name);
                $sql = "SELECT * FROM `$name_table`";
                $result = $connect->query($sql);
                $classrooms = $result->fetchAll();

                $name_table = "groups";
                $attribute_name_schedule = "group_id";
                $attribute_name = "id_group";
                $group = PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name);
                $sql = "SELECT * FROM `$name_table`";
                $result = $connect->query($sql);
                $groups = $result->fetchAll();
            ?>
            <form action="edit-tables/update_row_schedule.php" method="post" class="Update_row">
            <input type="hidden" name="id_schedule" value="<?= $subject['id'] ?>">
                <tr class="main_table">
                    <td>
                       <a href="edit-tables/change_priority.php/?id=<?=$subject['id']?>&id_day=<?=$id_day?>&where=1">↑          </a> 
                       <a href="edit-tables/change_priority.php/?id=<?=$subject['id']?>&id_day=<?=$id_day?>&where=0">↓          </a> 
                </td>
                <td>
                <select name="select_bell">
                    <?php if(is_null($bell)):?>
                        <option value="<?php null ?>" selected></option>
                        <?php endif?>
                        <?php if(!is_null($bell)):
                         foreach($bells as $_bell): ?>
                            
                            <option value="<?= $_bell['id_bell'] ?>" <?php  if ($_bell['id_bell'] == $bell['id_bell']) : ?>selected<?php endif ?>><?= $_bell['start_lesson'] . "-" . $_bell['end_lesson'] ?></option>
                    <?php endforeach?>
                    <?php else: ?>
                       <?php foreach($bells as $_bell): ?>
                            
                            <option value="<?= $_bell['id_bell'] ?>"><?= $_bell['start_lesson'] . "-" . $_bell['end_lesson'] ?></option>

                            <?php endforeach?>
                    <?php endif ?>
                    </select>
                </td>
                <td>
                    <select name="select_subject">
                    <?php if(is_null($subject1)):?>
                        <option value="<?php null ?>" selected></option>
                    <?php endif?>
                        <?php if(!is_null($subject1)):
                        foreach($subjects1 as $_subject): ?>
                            <option value="<?= $_subject['id_subject'] ?>" <?php if ($_subject['id_subject'] == $subject1['id_subject']) : ?> selected <?php endif ?>><?= $_subject['name_subject']?></option>
                    <?php endforeach?>
                    <?php else: ?>
                       <?php foreach($subjects1 as $_subject): ?>
                            
                            <option value="<?= $_subject['id_subject'] ?>"><?= $_subject['name_subject']?></option>

                            <?php endforeach?>
                    <?php endif ?>
                    </select>
                </td>
                <td>
                    <select name="select_teacher">
                    <?php if(is_null($teacher)):?>
                        <option value="<?php null ?>" selected></option>
                    <?php endif?>
                        <?php if(!is_null($teacher)):
                        foreach($teachers as $_teacher): ?>
                            <option value="<?= $_teacher['id_teacher'] ?>" <?php if ($_teacher['id_teacher'] == $teacher['id_teacher']) : ?> selected <?php endif ?>><?= $_teacher['full_name']?></option>
                    <?php endforeach?>
                    <?php else: ?>
                       <?php foreach($teachers as $_teacher): ?>
                            
                            <option value="<?= $_teacher['id_teacher'] ?>"><?= $_teacher['full_name']?></option>

                            <?php endforeach?>
                    <?php endif ?>
                    </select>
                </td>
                <td>
                    <select name="select_classroom">
                    <?php if(is_null($classroom)):?>
                        <option value="<?php null ?>" selected></option>
                    <?php endif?>
                        <?php if(!is_null($classroom)):
                         foreach($classrooms as $_classroom): ?>
                            <option value="<?= $_classroom['id_classroom'] ?>" <?php if ($_classroom['id_classroom'] == $classroom['id_classroom']) : ?> selected <?php endif ?>><?= $_classroom['num_room']?></option>
                    <?php endforeach?>
                    <?php else: ?>
                       <?php foreach($classrooms as $_classroom): ?>
                            
                            <option value="<?= $_classroom['id_classroom'] ?>"><?= $_classroom['num_room']?></option>

                            <?php endforeach?>
                    <?php endif ?>
                    </select>
                </td>
                <td>
                    <select name="select_group">
                    <?php if(is_null($group)):?>
                        <option value="<?php null ?>" selected></option>
                    <?php endif?>
                        <?php if(!is_null($classroom)):
                        foreach($groups as $_group): ?>
                            <option value="<?= $_group['id_group'] ?>" <?php if ($_group['id_group'] == $group['id_group']) : ?> selected <?php endif ?>><?= $_group['name_group']?></option>
                    <?php endforeach?>
                    <?php else: ?>
                       <?php foreach($groups as $_group): ?>
                            
                            <option value="<?= $_group['id_group'] ?>"><?= $_group['name_group']?></option>

                            <?php endforeach?>
                    <?php endif ?>
                    </select>
                </td>
                <td>
                    <input class="Update_row" type="submit" value="Сохранить">
                </td>
                </form>
                    <td>
                
                    <form action="edit-tables\delete_row_schedule.php" method="post" class="delete_cell">
                            <input type="hidden" name="id" value="<?= $subject['id'] ?>">
                            <input type="submit" value="Удалить">
                        </form>
                    </td>
                </tr>
                
            <?php  endforeach?>
            </table>
            <form action="edit-tables\new_row_schedule_front.php" method="post">
                <input type="hidden" name="id_day" value="<?= $day['id_day'] ?>">
                <input class="add_obj" type="submit" value="Добавить">
            </form>
            </div>
        <?php endforeach ?>
    

    <div class="edit-div">
        <form action="../index.php">
            <input type="submit" value="Закончить редактирование">
        </form>
    </div>
</body>

</html>