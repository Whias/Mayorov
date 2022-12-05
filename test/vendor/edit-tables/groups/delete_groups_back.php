<?php
require_once "../../connect.php";
$sql = "DELETE FROM `groups` WHERE `id_group` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: edit_groups_front.php");
echo '<script>location.replace("edit_groups_front.php");</script>';
