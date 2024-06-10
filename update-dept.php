<!DOCTYPE html>
<html>
    <body>
        <form method="GET" action="updatedept.php">
            
                <label for="dept">Department ID:</label>
                <select name="did" id="dept" required>
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
                
                <label for="dept"> New Department name:</label>
                <input type="text" name="deptname">
                <br><br>

                <label for="dept">New Department Location:</label>
                <input type="text" name="deptloc">
                <br><br>

                <input type="submit">
                <br><br>
            
        </form>
    </body>
</html>