<?php
require_once "../connect.php";
$id = $_POST['id'];
$sql = "DELETE FROM `schedule` WHERE `id` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: ../edit.php");
echo '<script>location.replace("../edit.php");</script>';