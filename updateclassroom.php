<?php
$classroom_number = $_GET['classroom_number'];
$new_capacity = $_GET['new_capacity'];
$deptid = $_GET['deptid'];

include "conn.php";

if (empty($new_capacity) || empty($deptid)) {
    $sql_select = "SELECT `capacity`, `dept_id` FROM `classroom` WHERE `class_num`='$classroom_number'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (empty($new_capacity)) {
            $new_capacity = $row['capacity'];
        }
        if (empty($deptid)) {
            $deptid = $row['dept_id'];
        }
    } else {
        echo "No classroom found with number: $classroom_number";
        $conn->close();
        exit; 
    }
}

$sql = "UPDATE classroom SET capacity = '$new_capacity' , dept_id = '$deptid' WHERE class_num = '$classroom_number'";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
