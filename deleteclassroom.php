<?php
    $classroom_number = $_GET['classroom_number'];

    include "conn.php";

    $sql = "DELETE FROM classroom WHERE class_num = '$classroom_number'";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>


