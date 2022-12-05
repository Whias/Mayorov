<?php
require_once "../../connect.php";
$sql = "UPDATE `classrooms` SET `num_room` = :num_room WHERE `id_classroom` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":num_room", $_POST['num_room']);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: edit_classrooms_front.php");
echo '<script>location.replace("edit_classrooms_front.php");</script>';
?>