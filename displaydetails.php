<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            justify-content: center;
            align-items: center;
        }
        .navbar {
          background-color: #ababab;
          overflow: hidden;
          margin-bottom: 40px;
          width: 100%;
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
        form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 500px;
            height: 210px;
            margin: auto;
            margin-top: 100px;
        }
        p {
            text-align: center;
            margin-bottom: 20px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 15px;
            margin-bottom: 10px;
        }
        button:hover {
            background-color: #45a049;
        }
        .details {
            margin-bottom: 10px;
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

    <form method="get" action="listdisplay.php">
        <p class="details">
            <?php
                include "conn.php";

                $sql = "DELETE from allot_stu_class WHERE 1";

                $res = $conn->query($sql);

                session_start();
                $courseId = $_GET['courseTitle'];
                $_SESSION["cid"] = $courseId;
                $sql = "SELECT 
                            COUNT(*) AS total_students,
                            SUM(CASE WHEN s.type = 'NORMAL' THEN 1 ELSE 0 END) AS normal_students,
                            SUM(CASE WHEN s.type = 'RR' THEN 1 ELSE 0 END) AS rr_students,
                            SUM(CASE WHEN s.type = 'backlog' THEN 1 ELSE 0 END) AS backlog_students
                        FROM 
                            stu_enroll e
                        INNER JOIN 
                            student s ON e.usn = s.usn
                        WHERE 
                            e.course_id = '$courseId'";

                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalStudents = $row['total_students'];
                    $normalStudents = $row['normal_students'];
                    $rrStudents = $row['rr_students'];
                    $backlogStudents = $row['backlog_students'];

                    echo "Total number of students registered for the course: " . $totalStudents . "<br>";
                    echo "Regular students: " . $normalStudents . "<br>";
                    echo "RR students: " . $rrStudents . "<br>";
                    echo "Backlog students: " . $backlogStudents;
                } else {
                    echo "No students registered for the course.";
                }

                $departmentId = $_GET['department'];
                $_SESSION["deptid"] = $departmentId;

                $sql = "SELECT COUNT(*) AS total_classrooms FROM classroom WHERE dept_id = '$departmentId'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalClassrooms = $row['total_classrooms'];
                    echo "<br><br>Total number of classrooms belonging to the department: " . $totalClassrooms;
                } else {
                    echo "<br><br>No classrooms found for the department.";
                }
                $departmentId = $_GET['department'];

                $sql = "SELECT * FROM classroom WHERE dept_id = '$departmentId'";
                $result = $conn->query($sql);

                $totalCapacity = 0;

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $totalCapacity += $row['capacity'];
                    }
                    echo "<br><br>Total capacity of classrooms belonging to the department: " . $totalCapacity;
                } else {
                    echo "<br><br>No classrooms found for the department.";
                }

                $conn->close();
            ?>
        </p>
        <center><button type="submit">ALLOT</button></center>
    </form>
    <div class="footer">
        <p>&copy; 2024 SDMCET. All rights reserved.</p>
    </div>
</body>
</html>
