<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Allotment Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
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
        h2{
            font-size: 30px;
        }
        form {
            max-width: 500px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 100px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
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
        <a href="examtime.php">Time Table</a>
        <a href="dboption.html">Database</a>
        <a href="index.html">Home</a>
    </div>
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
        ?>


    <form method="get" action="displaydetails.php">
        <div align="center">
            <h2 style="margin-bottom: 20px;">Course Allotment Form</h2>
            <label for="academicYear">Academic Year:</label>
            <select name="academicYear" id="academicYear">
                <option value="">Select Academic Year</option>
                <?php
                include "conn.php";

                $sql = "SELECT DISTINCT year FROM scheme_details";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['year'] . "'>" . $row['year'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="department">Department:</label>
            <select name="department" id="department">
                <option value="">Select Department</option>
                <?php
                $sql = "SELECT * FROM department";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['dept_id'] . "'>" . $row['dept_name'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="semester">Semester:</label>
            <select name="semester" id="semester">
                <option value="">Select Semester</option>
                <?php
                $sql = "SELECT DISTINCT sem FROM course";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['sem'] . "'>" . $row['sem'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="courseType">Course Type:</label>
            <select name="courseType" id="courseType">
                <option value="">Select Course Type</option>
                <?php
                $sql = "SELECT DISTINCT type FROM course";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['type'] . "'>" . $row['type'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="courseTitle">Course Title:</label>
            <select name="courseTitle" id="courseTitle">
                <option value="">Select Course Title</option>
                <?php
                $sql = "SELECT DISTINCT course_title FROM course";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['course_title'] . "'>" . $row['course_title'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <button type="submit">Submit</button>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            function fetchCourseTitles() {
                var department = $('#department').val();
                var semester = $('#semester').val();
                var courseType = $('#courseType').val();

                $.ajax({
                    url: 'get_courses3.php',
                    type: 'GET',
                    data: {
                        department: department,
                        semester: semester,
                        courseType: courseType
                    },
                    success: function(response) {
                        $('#courseTitle').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#department, #semester, #courseType').change(function() {
                fetchCourseTitles();
            });
        });
    </script>
    <div class="footer">
        <p>&copy; 2024 SDMCET. All rights reserved.</p>
    </div>
</body>
</html>
