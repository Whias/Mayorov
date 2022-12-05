<?php
require_once "../../connect.php";
$sql = "INSERT INTO `bells` (`start_lesson`, `end_lesson`) VALUES (:start_lesson, :end_lesson)";
$statement = $connect->prepare($sql);
$statement->bindValue(":start_lesson", $_POST['start_lesson']);
$statement->bindValue(":end_lesson", $_POST['end_lesson']);
$statement->execute();
// header("location: edit_bells_front.php");
echo '<script>location.replace("edit_bells_front.php");</script>';