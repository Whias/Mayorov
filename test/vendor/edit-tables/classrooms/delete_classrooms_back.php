<?php
require_once "../../connect.php";
$sql = "DELETE FROM `classrooms` WHERE `id_classroom` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: edit_classrooms_front.php");
echo '<script>location.replace("edit_classrooms_front.php");</script>';
