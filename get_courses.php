<?php
include "conn.php";

$department = $_GET['department'];
$semester = $_GET['semester'];
$courseType = $_GET['courseType'];

$sql = "SELECT * FROM course WHERE dept_id = '$department' AND sem = '$semester' AND type = '$courseType'";
$result = $conn->query($sql);

$options = "<option value=''>Select Course Title</option>";
while($row = $result->fetch_assoc()) {
    $options .= "<option value='" . $row['course_id'] . "'>" . $row['course_title'] . "</option>";
}

$conn->close();

echo $options;
?>