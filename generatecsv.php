<?php
include 'conn.php';
session_start();

$courseId = $_SESSION["cid"];
$departmentId = $_SESSION["deptid"];

$sql = "SELECT course_title from course where course_id = '$courseId'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$ct = $row['course_title'];

$query = $conn->query("SELECT * FROM allot_stu_class ORDER BY class_num, seat_number");

if ($query->num_rows > 0) {
    $delimiter = ",";
    $filename = "$ct  $courseId " . date('Y-m-d') . ".csv";

    $f = fopen('php://memory', 'w');

    $fields = array('USN', 'Name', 'Type', 'Seat No', 'Class No');
    fputcsv($f, $fields, $delimiter);

    while ($row = $query->fetch_assoc()) {
        $lineData = array($row['USN'], $row['Name'], $row['type'], $row['seat_number'], $row['class_num']);
        fputcsv($f, $lineData, $delimiter);
    }

    fseek($f, 0);

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    fpassthru($f);
}

exit;
?>
