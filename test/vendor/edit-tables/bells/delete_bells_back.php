<?php
require_once "../../connect.php";
$sql = "DELETE FROM `bells` WHERE `id_bell` = :id";
$statement = $connect->prepare($sql);
$statement->bindValue(":id", $_POST['id']);
$statement->execute();
// header("location: edit_bells_front.php");
echo '<script>location.replace("edit_bells_front.php");</script>';
