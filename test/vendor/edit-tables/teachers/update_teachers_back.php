<?php
require_once "../../connect.php";
$sql = "UPDATE `teachers` SET `full_name` = :full_name WHERE `id_teacher` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":full_name", $_POST['full_name']);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: edit_teachers_front.php");
echo '<script>location.replace("edit_teachers_front.php");</script>';
?>