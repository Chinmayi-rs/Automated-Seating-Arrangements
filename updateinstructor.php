<?php
include 'conn.php';

$empid = $_GET['empid'];
$first_name = $_GET['first_name'];
$phone_number = $_GET['phone_number'];
$dept_id = $_GET['department'];
$course_id = $_GET['courseTitle'];

if (empty($first_name) || empty($phone_number) || empty($dept_id) || empty($course_id)) {
    $sql_select = "SELECT `first_name`, `phone_number`, `dept_id`, `course_id` FROM `instructor` WHERE empid='$empid'";
    $result = $conn->query($sql_select);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (empty($first_name)) {
            $first_name = $row['first_name'];
        }
        if (empty($phone_number)) {
            $phone_number = $row['phone_number'];
        }
        if (empty($dept_id)) {
            $dept_id = $row['dept_id'];
        }
        if (empty($course_id)) {
            $course_id = $row['course_id'];
        }
    } else {
        echo "No instructor found with ID: $empid";
        $conn->close();
        exit;
    }
}

$sql = "UPDATE `instructor` SET `first_name`='$first_name', `phone_number`='$phone_number', `dept_id`='$dept_id', `course_id`='$course_id' WHERE empid='$empid'";

if ($conn->query($sql) === TRUE) {
    echo "Records updated: ";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
