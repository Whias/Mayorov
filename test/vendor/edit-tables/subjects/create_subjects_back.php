<?php
require_once "../../connect.php";
$sql = "INSERT INTO `subjects` (`name_subject`) VALUES (:name_subject)";
$statement = $connect->prepare($sql);
$statement->bindValue(":name_subject", $_POST['name_subject']);
$statement->execute();
// header("location: edit_subjects_front.php");
echo '<script>location.replace("edit_subjects_front.php");</script>';