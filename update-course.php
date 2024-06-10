<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }
        select, input[type="text"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Update Course Data</h2>
        <form method="GET" action="updatecourse.php">
            <label for="cid">Enter Course ID:</label>
            <select name="cid" id="cid" required>
                <option value="">Select Course ID</option>
                <?php
                include "conn.php";
                $sql = "SELECT DISTINCT course_id FROM course";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['course_id'] . "'>" . $row['course_id'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="ctitle">Enter Course Title:</label>
            <input type="text" name="ctitle" id="ctitle">
            <br><br>
            <label for="scheme">Select Scheme:</label>
            <select name="scheme" id="scheme">
                <option value="">Select Scheme</option>
                <?php
                $sql = "SELECT DISTINCT scheme FROM scheme_details";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['scheme'] . "'>" . $row['scheme'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="dept">Select Department:</label>
            <select name="dept" id="dept">
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
            <label for="sem">Enter the Semester:</label>
            <select name="sem" id="sem">
                <option value="">Select Semester</option>
                <?php
                for ($i = 1; $i <= 8; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="type">Enter Course type:</label>
            <select name="type" id="type">
                <option value="">Select Course Type</option>
                <option value="core">Core</option>
                <option value="audit">Audit</option>
                <option value="elective">Elective</option>
            </select>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
