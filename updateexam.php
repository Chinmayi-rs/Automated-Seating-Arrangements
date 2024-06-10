<?php
include 'conn.php';

$cid = $_GET["cid"];
$eid = $_GET["eid"];
$slot = $_GET["slot"];
$etype = $_GET["etype"];
$edate = $_GET["edate"];

if (empty($edate) || empty($etype) || empty($slot) || empty($cid)) {
    $sql_select = "SELECT `exam_date`, `exam_Type`, `slot_no`, `course_id` FROM `exam` WHERE `exam_no`='$eid'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (empty($edate)) {
            $edate = $row['exam_date'];
        }
        if (empty($etype)) {
            $etype = $row['exam_Type'];
        }
        if (empty($slot)) {
            $slot = $row['slot_no'];
        }
        if (empty($cid)) {
            $cid = $row['course_id'];
        }
    } else {
        echo "No exam found with ID: $eid";
        $conn->close();
        exit; 
    }
}

$sql = "UPDATE `exam` SET `exam_date`='$edate', `exam_Type`='$etype', `slot_no`='$slot', `course_id`='$cid' WHERE `exam_no`='$eid'";

if ($conn->query($sql)) {
    echo "Updated";
} else {
    echo "Failed to update";
}

$conn->close();
?>
