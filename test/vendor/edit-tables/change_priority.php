<?php
require_once "../connect.php";
$id = $_GET['id'];
$up = (bool)$_GET['where'];
$id_day = $_GET['id_day'];
$possible = false;
$sql = "SELECT * FROM `schedule` WHERE `id` = $id";
$row = $connect->query($sql);
$row = $row->fetchAll();
$row = $row[0];

if (!$up) {
    $sql_all = "SELECT * FROM `schedule` WHERE `day_id` = '$id_day' AND `id` != '$id' ORDER BY `priority` ASC";
    $rows = $connect->query($sql_all);
    $rows = $rows->fetchAll();
    foreach ($rows as $_row) {
        if ($row['priority'] < $_row['priority']) {
            $id_update_row = $_row['id'];
            $possible = true;
            $one = $row['priority'];
        $two = $_row['priority'];
            break;
        }
        $one = $row['priority'];
        $two = $_row['priority'];
    }
    if ($possible) {
        $_new_priority = $row['priority'];
        $new_priority = $_row['priority'];
        $sql = "UPDATE `schedule` SET `priority` = '$new_priority' WHERE `id` = '$id'";
        $_sql = "UPDATE `schedule` SET `priority` = '$_new_priority' WHERE `id` = '$id_update_row'";
        $connect->exec($sql);
        $connect->exec($_sql);
    }
} else {
    $sql_all = "SELECT * FROM `schedule` WHERE `day_id` = '$id_day' AND `id` != '$id' ORDER BY `priority` DESC";
    $rows = $connect->query($sql_all);
    $rows = $rows->fetchAll();
    foreach ($rows as $_row) {
        if ($row['priority'] > $_row['priority']) {
            $id_update_row = $_row['id'];
            $new_priority = $_row['priority'];
            $possible = true;
            break;
        }
        $one = $row['priority'];
        $two = $_row['priority'];
    }
    if ($possible) {
        $_new_priority = $row['priority'];
        $sql = "UPDATE `schedule` SET `priority` = '$new_priority' WHERE `id` = '$id'";
        $_sql = "UPDATE `schedule` SET `priority` = '$_new_priority' WHERE `id` = '$id_update_row'";
        $connect->exec($sql);
        $connect->exec($_sql);
    }
}
// header("location: ../../edit.php");
echo '<script>location.replace("../../edit.php");</script>';
