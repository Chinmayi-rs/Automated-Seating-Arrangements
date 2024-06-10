<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Exam</title>
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
        form {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        select, input[type="date"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
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
       
        <form method="get" action="updateexam.php">
        <h2>Update Exam Data</h2>
            <label for="eid">Enter Exam ID:</label><br>
            <select name="eid" id="eid" required>
                <option value="">Select Exam ID</option>
                <?php
                include "conn.php";
                $sql = "SELECT * FROM exam";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['exam_no'] . "'>" . $row['exam_no'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="edate">New Exam Date:</label><br>
            <input type="date" name="edate" id="edate">
            <br><br>
            <label for="etype">New Exam Type:</label><br>
            <select name="etype" id="etype">
                <option value="">Exam type</option>
                <option value="IA1">IA 1</option>
                <option value="IA2">IA 2</option>
                <option value="IA3">IA 3</option>
                <option value="SEE">SEE</option>
                <option value="MakeUp">MakeUp</option>
            </select>
            <br><br>
            <label for="slot">New Slot:</label><br>
            <select name="slot" id="slot">
                <option value="">Select Exam Start Time</option>
                <?php
                $sql = "SELECT * FROM slot";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['slot_no'] . "'>" . $row['start_time'] . "</option>";
                }
                ?>
            </select>
            <br><br>
            <label for="cid">New Course Title:</label><br>
            <select name="cid">
                <option value="">Course Title</option>
                <?php
                $sql = "SELECT * FROM course";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value=".$row['course_id'].">".$row['course_title']."</option>";
                    }
                } else {
                    echo "No courses found";
                }
                $conn->close();
                ?>
            </select>
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
