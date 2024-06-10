<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Data</title>
</head>
<body>
    <h2>Update Student Data</h2>
    <form action="updatestudent.php" method="get">
        <label for="usn">USN:</label>
        <select id="usn" name="usn" required>
            <option value="">Select Student</option>
            <?php
            include "conn.php";

            $sql = "SELECT USN FROM student";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['USN']."'>".$row['USN']."</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" ><br><br>

        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" ><br><br>

        <label for="dept_id">Department:</label>
        <select id="dept_id" name="dept_id" >
            <option value="">Select Department</option>
            <?php
            include "conn.php";

            $sql = "SELECT dept_id, dept_name FROM department";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['dept_id']."'>".$row['dept_name']."</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="year">Year:</label>
        <select id="year" name="year">
            <option value="">Select Academic Year</option>
            <?php
            include "conn.php";

            $sql = "SELECT `year` FROM scheme_details";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['year']."'>".$row['year']."</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="semester_no">Semester No:</label>
        <select id="sem" name="sem"><br><br>
        
            <option value="">Select Semester</option>
            <?php
           include "conn.php";

            $sql = "SELECT sem FROM semester";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['sem']."'>".$row['sem']."</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <label for="type">Type:</label>
        <select id="type" name="type">
            <option value="">Select type</option>
            <?php
            include "conn.php";

            $sql = "SELECT distinct `type` FROM student";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['type']."'>".$row['type']."</option>";
                }
            }
            $conn->close();
            ?>
        </select><br><br>

        <input type="submit">
    </form>
</body>
</html>
