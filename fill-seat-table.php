<?php
include "conn.php";

$sql = "DELETE from allot_stu_class WHERE 1";

$res = $conn->query($sql);

$sql = "DELETE from seat WHERE 1";

$res = $conn->query($sql);

$sql = "SELECT class_num, capacity FROM classroom";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $class_num = $row["class_num"];
        $capacity = $row["capacity"];
        
        for ($i = 1; $i <= $capacity; $i++) {
            $sql_insert = "INSERT INTO seat (seat_number, status, class_num) VALUES ($i, 'UO', $class_num)";
            if ($conn->query($sql_insert) === TRUE) {
            } else {
                echo "Error inserting record: " . $conn->error;
            }
        }
    }
} else {
    echo "0 results found";
}

$conn->close();

?>
