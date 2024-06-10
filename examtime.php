<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Time Table</title>
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
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        .btn-container {
            text-align: center;
            margin-top: 20px;
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
    </style>
</head>
<body>
<div class="navbar">
        <img src="new-logo.png" alt="Logo">
        <a href="#">Contact Us</a>
        <a href="allotform.php">Allotment</a>
        <a href="dboption.html">Database</a>
        <a href="index.html">Home</a>
    </div>
    <h2>Exam Details</h2>
    <table>
        <tr>
            <th>Exam Date</th>
            <th>Course Code</th>
            <th>Course Title</th>
            <th>Exam Type</th>
            <th>Start Time</th>
            <th>End Time</th>
        </tr>
        <?php
        include "conn.php"; 

        $sql = "SELECT e.exam_date, e.course_id,c.course_title,e.exam_Type, s.start_time,s.end_time
        FROM exam e 
        INNER JOIN slot s ON e.slot_no = s.slot_no
        INNER JOIN course c ON e.course_id = c.course_id"; 
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['exam_date'] . "</td>";
                echo "<td>" . $row['course_id'] . "</td>";
                echo "<td>" . $row['course_title'] . "</td>";
                echo "<td>" . $row['exam_Type'] . "</td>";
                echo "<td>" . $row['start_time'] . "</td>";
                echo "<td>" . $row['end_time'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No exams found.</td></tr>";
        }

        $conn->close();
        ?>
    </table>
    <div class="btn-container">
        <button class="btn" onclick="window.location.href = 'index.html'">Go Back</button>
    </div>
    <div class="footer">
        <p>&copy; 2024 SDMCET. All rights reserved.</p>
    </div>
</body>
</html>
