<?php
require_once "../../connect.php";
$sql = "DELETE FROM `teachers` WHERE `id_teacher` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: edit_teachers_front.php");
echo '<script>location.replace("edit_teachers_front.php");</script>';
