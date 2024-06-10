<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        form {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
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
    
    <form method="get" action="insertexam.php">
    <h2>Exam Registration Form</h2>
        <label for="eid">Enter Exam ID:</label>
        <input type="text" name="eid" id="eid">
        <br><br>
        <label for="edate">Exam Date:</label>
        <input type="date" name="edate" id="edate">
        <br><br>
        <label for="etype">Exam Type:</label>
        <select name="etype" id="etype">
            <option value="">Select Exam Type</option>
            <option value="IA1">IA 1</option>
            <option value="IA2">IA 2</option>
            <option value="IA3">IA 3</option>
            <option value="SEE">SEE</option>
            <option value="MakeUp">MakeUp</option>
        </select>
        <br><br>
        <label for="slot">Slot:</label>
        <select name="slot" id="slot">
            <option value="">Select Exam Start Time</option>
            <?php
            include "conn.php";
            $sql = "SELECT * FROM slot";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['slot_no'] . "'>" . $row['start_time'] . "</option>";
            }
            ?>
        </select>
        <br><br>
        <label for="cid">Course Title:</label>
        <select name="cid" id="cid">
            <option value="">Select Course Title</option>
            <?php
            include "conn.php";
            $sql = "SELECT * FROM course";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['course_id']."'>".$row['course_title']."</option>";
                }
            } else {
                echo "<option value=''>No courses found</option>";
            }
            $conn->close();
            ?>
        </select>
        <br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
