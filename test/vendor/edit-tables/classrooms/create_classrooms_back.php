<?php
require_once "../../connect.php";
$sql = "INSERT INTO `classrooms` (`num_room`) VALUES (:num_room)";
$statement = $connect->prepare($sql);
$statement->bindValue(":num_room", $_POST['num_room']);
$statement->execute();
// header("location: edit_classrooms_front.php");
echo '<script>location.replace("edit_classrooms_front.php");</script>';