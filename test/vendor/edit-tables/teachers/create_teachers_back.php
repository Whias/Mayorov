<?php
require_once "../../connect.php";
$sql = "INSERT INTO `teachers` (`full_name`) VALUES (:full_name)";
$statement = $connect->prepare($sql);
$statement->bindValue(":full_name", $_POST['full_name']);
$statement->execute();
// header("location: edit_teachers_front.php");
echo '<script>location.replace("edit_teachers_front.php");</script>';