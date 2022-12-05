<?php
require_once "../../connect.php";
$sql = "DELETE FROM `subjects` WHERE `id_subject` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: edit_subjects_front.php");
echo '<script>location.replace("edit_subjects_front.php");</script>';
