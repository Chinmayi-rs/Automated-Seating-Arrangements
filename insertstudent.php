<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data
    $usn = $_GET['usn'];
    $name = $_GET['name'];
    $phone_number = $_GET['phone_number'];
    $dept_id = $_GET['dept_id'];
    $sem_id = $_GET['sem'];
    $type = $_GET['type'];
    $year = $_GET['year'];
    $courses = $_GET['courses'];

    // Connect to database
    include "conn.php";

    // Insert data into student table
    $sql_student = "INSERT INTO student (USN, name, phone_number,year, dept_id, sem, type) VALUES ('$usn', '$name', '$phone_number','$year', '$dept_id', '$sem_id', '$type')";
    if (mysqli_query($conn, $sql_student)) {
        echo "Student data inserted successfully<br>";
    } else {
        echo "Error: " . $sql_student . "<br>" . mysqli_error($conn);
    }

    // Insert data into stu_enroll table
    foreach ($courses as $course_id) {
        $sql_enroll = "INSERT INTO stu_enroll (usn, course_id) VALUES ('$usn', '$course_id')";
        if (mysqli_query($conn, $sql_enroll)) {
            echo "Enrollment for course ID $course_id successful<br>";
        } else {
            echo "Error: " . $sql_enroll . "<br>" . mysqli_error($conn);
        }
    }

    // Close connection
    mysqli_close($conn);
} else {
    echo "Form submission method not allowed";
}
?>
