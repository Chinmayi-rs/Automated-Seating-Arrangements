<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Classroom Data</title>
</head>
<body>
    <h2>Update Classroom Data</h2>
    <form action="updateclassroom.php" method="GET">
        <label for="classroom_number">Classroom Number to Update:</label>
        <select type="text" id="classroom_number" name="classroom_number" required>
                <option value="">Select Classroom Number</option>
                <?php
                include "conn.php";
                $sql = "SELECT * FROM classroom";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['class_num'] . "'>" . $row['class_num'] . "</option>";
                }
                ?>
                </select>
                <br><br>

        <label for="new_capacity">New Capacity:</label>
        <input type="number" id="new_capacity" name="new_capacity"><br><br>

        <label for="dept">Department:</label>
                <select name="deptid" id="deptid">
                <option value="">Select Department</option>
                <?php
                include "conn.php";
                $sql = "SELECT * FROM department";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['dept_id'] . "'>" . $row['dept_name'] . "</option>";
                }
                ?>
                </select>
                <br><br>

        <input type="submit" value="Update">
    </form>
</body>
</html>