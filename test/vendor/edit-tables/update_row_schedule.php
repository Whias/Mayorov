<?php
require_once "../connect.php";
$select_bell = $_POST['select_bell'];

$select_classroom  = $_POST['select_classroom'];

$select_group = $_POST['select_group'];

$select_subject = $_POST['select_subject'];

$select_teacher = $_POST['select_teacher'];
$id_schedule =  $_POST['id_schedule'];
if(!((strlen($select_subject) === 0) || (strlen($select_bell) === 0) || (strlen($select_classroom) === 0) || (strlen($select_group) === 0) || (strlen($select_teacher) === 0) || (strlen($id_schedule) === 0)))
{

$sql = "UPDATE `schedule` SET `bell_id` = :bell, `subject_id` = :subject,`teacher_id` = :teacher, `classroom_id` = :classroom, `group_id` = :group WHERE `id` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":bell", $select_bell);
$statement->bindValue(":subject", $select_subject);
$statement->bindValue(":classroom", $select_classroom);
$statement->bindValue(":group", $select_group);
$statement->bindValue(":id", $id_schedule);
$statement->bindValue(":teacher", $select_teacher);
$statement->execute();
// header("location: ../edit.php");
}
echo '<script>location.replace("../edit.php");</script>';

