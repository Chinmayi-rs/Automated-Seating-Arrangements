<?php
include "conn.php";

$department = $_GET['dept_id'];
$semester = $_GET['sem'];

$sql = "SELECT * FROM course WHERE dept_id = '$department' AND semester_no = '$semester'";
$result = $conn->query($sql);

$options = "<option value=''>Select Course Title</option>";
while($row = $result->fetch_assoc()) {
    $options .= "<option value='" . $row['course_id'] . "'>" . $row['course_title'] . "</option>";
}

$conn->close();

echo $options;
?>