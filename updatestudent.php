<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $usn = $_GET['usn'];
    $name = $_GET['name'];
    $phone_number = $_GET['phone_number'];
    $dept_id = $_GET['dept_id'];
    $year = $_GET['year'];
    $semester_no = $_GET['sem'];
    $type = $_GET['type'];

    include "conn.php";

    // Check if input values are empty, if so, fetch the existing values from the database
    if (empty($name) || empty($phone_number) || empty($dept_id) || empty($year) || empty($semester_no) || empty($type)) {
        $sql_select = "SELECT `name`, `phone_number`, `dept_id`, `year`, `sem`, `type` FROM `student` WHERE usn='$usn'";
        $result = $conn->query($sql_select);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (empty($name)) {
                $name = $row['name'];
            }
            if (empty($phone_number)) {
                $phone_number = $row['phone_number'];
            }
            if (empty($dept_id)) {
                $dept_id = $row['dept_id'];
            }
            if (empty($year)) {
                $year = $row['year'];
            }
            if (empty($semester_no)) {
                $semester_no = $row['sem'];
            }
            if (empty($type)) {
                $type = $row['type'];
            }
        } else {
            echo "No student found with USN: $usn";
            $conn->close();
            exit; // Exit the script if no student found
        }
    }

    // Update the student with provided or existing values
    $sql = "UPDATE student SET name = '$name', phone_number = '$phone_number', dept_id = '$dept_id', year = '$year', sem = '$semester_no', type = '$type' WHERE usn = '$usn'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
