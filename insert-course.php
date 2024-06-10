<!DOCTYPE html>
<html>
<head>
    <title>Course Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        form {
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Course Registration Form</h2>
        <form method="GET" action="insertcourse.php">
            <label for="cid">Enter Course ID:</label>
            <input type="text" name="cid" id="cid">
            <br><br>
            <label for="ctitle">Enter Course Title:</label>
            <input type="text" name="ctitle" id="ctitle">
            <br><br>
            <label for="scheme">Scheme:</label>
            <select name="scheme" id="scheme">
                <option value="">Select Scheme</option>
                <?php
                include "conn.php";
                $sql = "SELECT DISTINCT scheme FROM scheme_details";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['scheme'] . "'>" . $row['scheme'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="dept">Department:</label>
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
                    echo "<option value='" . $i . "'>" . $i . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="type">Enter Course Type:</label>
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
