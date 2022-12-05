<?php
require_once "../../connect.php";
$sql = "UPDATE `subjects` SET `name_subject` = :name_subject WHERE `id_subject` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":name_subject", $_POST['name_subject']);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: edit_subjects_front.php");
echo '<script>location.replace("edit_subjects_front.php");</script>';
?>