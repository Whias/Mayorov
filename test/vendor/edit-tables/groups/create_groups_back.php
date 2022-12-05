<?php
require_once "../../connect.php";
$sql = "INSERT INTO `groups` (`name_group`) VALUES (:name_group)";
$statement = $connect->prepare($sql);
$statement->bindValue(":name_group", $_POST['name_group']);
$statement->execute();
// header("location: edit_groups_front.php");
echo '<script>location.replace("edit_groups_front.php");</script>';