<?php
include 'conn.php';

$did = $_GET["did"];
$dname = $_GET["deptname"];
$loc = $_GET["deptloc"];

if (empty($dname) || empty($loc)) {
    $sql_select = "SELECT `dept_name`, `location` FROM `department` WHERE `dept_id`='$did'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (empty($dname)) {
            $dname = $row['dept_name'];
        }
        if (empty($loc)) {
            $loc = $row['location'];
        }
    } else {
        echo "No department found with ID: $did";
        $conn->close();
        exit; 
    }
}

$sql = "UPDATE `department` SET `dept_name`='$dname', `location`='$loc' WHERE `dept_id`='$did'";

if ($conn->query($sql)) {
    echo "Updated";
} else {
    echo "Failed to update";
}

$conn->close();
?>
