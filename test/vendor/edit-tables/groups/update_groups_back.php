<?php
require_once "../../connect.php";
$sql = "UPDATE `groups` SET `name_group` = :name_group WHERE `id_group` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":name_group", $_POST['name_group']);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: edit_groups_front.php");
echo '<script>location.replace("edit_groups_front.php");</script>';
?>