<?php
include 'conn.php';

$cid = $_GET["cid"];
$ctitle = $_GET["ctitle"];
$type = $_GET["type"];
$dept = $_GET["dept"];
$scheme = $_GET["scheme"];
$sem = $_GET["sem"];

if (empty($ctitle) || empty($type) || empty($dept) || empty($scheme) || empty($sem)) {
    $sql_select = "SELECT `course_title`, `type`, `dept_id`, `scheme`, `sem` FROM `course` WHERE `course_id`='$cid'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (empty($ctitle)) {
            $ctitle = $row['course_title'];
        }
        if (empty($type)) {
            $type = $row['type'];
        }
        if (empty($dept)) {
            $dept = $row['dept_id'];
        }
        if (empty($scheme)) {
            $scheme = $row['scheme'];
        }
        if (empty($sem)) {
            $sem = $row['sem'];
        }
    } else {
        echo "No course found with ID: $cid";
        $conn->close();
        exit; 
    }
}

$sql = "UPDATE `course` SET `course_title`='$ctitle', `type`='$type', `dept_id`='$dept', `scheme`='$scheme', `sem`='$sem' WHERE `course_id`='$cid'";

if ($conn->query($sql)) {
    echo "Updated";
} else {
    echo "Failed to update";
}

$conn->close();
?>
