<?php
if ($_SERVER["REQUEST_METHOD"] =="GET") {

    $classroom_number = $_GET['classroom_number'];
    $capacity = $_GET['capacity'];
    $department = $_GET['department'];
    
    include "conn.php";
    
    $sql = "INSERT INTO classroom (class_num, capacity, dept_id) VALUES ('$classroom_number', '$capacity', '$department')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

