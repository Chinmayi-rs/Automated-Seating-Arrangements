<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seat Allotment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0px;
        }
        .navbar {
            background-color: #ababab;
            overflow: hidden;
            margin-bottom: 40px;
        }
        .navbar a {
            float: right;
            display: block;
            color: #020202;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            margin-top: 30px;
            margin-bottom: 8px;
            margin-right: 10px;
            width: 120px;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar img {
            float: left;
            margin: 10px;
            height: 90px;
        }
        .footer {
            background-color: #ababab;
            color: #010101;
            text-align: center;
            padding: 5px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h1, h2 {
            text-align: center;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 80px;
        }
        .btn {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-right: 10px;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<div class="navbar">
        <img src="new-logo.png" alt="Logo">
        <a href="#">Contact Us</a>
        <a href="examtime.php">Time Table</a>
        <a href="dboption.html">Database</a>
        <a href="index.html">Home</a>
    </div>
    <h1>Seat Allotment Chart</h1>
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
    session_start();
    $courseId = $_SESSION["cid"];
    $departmentId = $_SESSION["deptid"];
    $sql = "SELECT course_title from course where course_id = '$courseId'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    echo "<h2>Course Code: ".$courseId."</h2>";
    echo "<h2>Course Title: ".$row['course_title']."</h2><br>";
    echo "<table>
        <tr>
            <th>USN</th>
            <th>Name</th>
            <th>Type</th>
            <th>Seat Number</th>
            <th>Classroom</th>
        </tr>";
    $sql = "SELECT s.usn, s.name, s.type FROM stu_enroll e INNER JOIN student s ON e.usn = s.usn WHERE e.course_id = '$courseId' ORDER BY `s`.`type`";
    $sql1 = "SELECT se.seat_number, se.class_num
    FROM department d
    INNER JOIN classroom c ON d.dept_id = c.dept_id
    INNER JOIN seat se ON se.class_num = c.class_num
    WHERE c.dept_id = $departmentId
    ORDER BY se.class_num,se.seat_number";
    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $row1 = $result1->fetch_assoc();
            echo "<tr>";
            echo "<td>" . $row['usn'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['type'] . "</td>";
            echo "<td>" . $row1['seat_number'] . "</td>";
            echo "<td>" . $row1['class_num'] . "</td>";
            echo "</tr>";
            $sql12 = "INSERT INTO `allot_stu_class`(`USN`, `Name`, `type`, `seat_number`, `class_num`) VALUES ('".$row['usn']."','".$row['name']."','" . $row['type'] . "','" . $row1['seat_number'] . "','" . $row1['class_num'] . "')";
            $insert = $conn->query($sql12);
        }
    } else {
        echo "<tr><td colspan='5'>No students enrolled for this course.</td></tr>";
    }
    $conn->close();
    ?>
    </table>
    <div class="btn-container">
        <button class="btn" onclick="window.location.href = 'generatepdf.php'">Generate Pdf</button>
        <button class="btn" onclick="window.location.href = 'generatecsv.php'">Generate CSV</button>
        <button class="btn" onclick="window.location.href = 'newallotment.php'">New Allotment</button>
    </div>
    <div class="footer">
        <p>&copy; 2024 SDMCET. All rights reserved.</p>
    </div>
</body>
</html>
