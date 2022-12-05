<?php
function PrintDataBase($subject, $name_table, $attribute_name_schedule, $attribute_name){
    include "connect.php";
    $id = $subject[$attribute_name_schedule];
    if(!isset($id))
        return null;
    $sql_bells = "SELECT * FROM `$name_table` WHERE `$attribute_name` = '$id'";
    $result = $connect->query($sql_bells);
    $end = $result->fetchAll();
    $end = $end[0];
    return $end;
} 
function AddSelect($name_table){
    include "connect.php";
    $sql = "SELECT * FROM `$name_table`";
    $result = $connect->query($sql);
    $end = $result->fetchAll();
    return $end;
}
function MaxPriority($rows){
    $max = 1;
    foreach($rows as $row){
        if($row['priority'] > $max)
        $max = $row['priority'];
    }
    return $max + 1;
}