<?php
include 'conn.php';

$sid = $_GET["slot"];
$stime = $_GET["stime"];
$etime = $_GET["etime"];

if (empty($stime) || empty($etime)) {
    $sql_select = "SELECT `start_time`, `end_time` FROM `slot` WHERE `slot_no`='$sid'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (empty($stime)) {
            $stime = $row['start_time'];
        }
        if (empty($etime)) {
            $etime = $row['end_time'];
        }
    } else {
        echo "No slot found with ID: $sid";
        $conn->close();
    }
}

$sql = "UPDATE `slot` SET `start_time`='$stime', `end_time`='$etime' WHERE `slot_no`='$sid'";

if ($conn->query($sql)) {
    echo "Updated";
} else {
    echo "Failed to update";
}

$conn->close();
?>
