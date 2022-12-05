<?php
require_once "../../connect.php";
$sql = "UPDATE `bells` SET `start_lesson` = :start_lesson, `end_lesson` = :end_lesson WHERE `id_bell` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":start_lesson", $_POST['start_lesson']);
$statement->bindValue(":end_lesson", $_POST['end_lesson']);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: edit_bells_front.php");
echo '<script>location.replace("edit_bells_front.php");</script>';
