<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" action="listing.php">
        <p align="center">

            <label>Academic year:</label>
            <input type="year" name="year">
            <br><br>


            <label>Department:</label>
            <select name="dept">
                <option>NONE</option>   
            <?php
            include "conn.php";

                $sql = "SELECT * FROM department";
                $res = $conn->query($sql);

            while( $row = $res->fetch_assoc() ){
                echo "<option>".$row["dept_name"]."</option>" ;
            }
            $conn->close();
            ?>
            </select>
            <br><br>


            <label>Semester:</label>
            <select name="sem">
                <option>NONE</option>
                    <?php
                    include "conn.php";

                        $sql = "SELECT DISTINCT sem FROM course";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            
                            while($row = $result->fetch_assoc()) {
                                echo "<option>".$row['sem']."</option>";
                            }
                        } else {
                            echo "No courses found";
                        }

                    $conn->close();
                    ?>
            </select>
            <br><br>


            <label>Course type:</label>
            <select name="coursetype">
                <option>NONE</option>
                <?php
                include "conn.php";

                    $sql = "SELECT DISTINCT type FROM course";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                            echo "<option>".$row['type']."</option>";
                        }
                    } else {
                        echo "No courses found";
                    }

                $conn->close();
                ?>
            </select>
            <br><br>


            <label>Course:</label>
            <select name="course">
            <option>NONE</option>
                <?php
                include "conn.php";

                    $sql = "SELECT * FROM course";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        
                        while($row = $result->fetch_assoc()) {
                            echo "<option>".$row['course_title']."</option>";
                        }
                    } else {
                        echo "No courses found";
                    }


                $conn->close();
                ?>
            </select>
            <br><br>


            <label>Exam type:</label>
            <select>
                <option>NONE</option>
                    <?php
                    include "conn.php";
                    session_start();

                        $sql = "SELECT DISTINCT exam_Type FROM exam";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            
                            while($row = $result->fetch_assoc()) {
                                echo "<option>".$row['exam_Type']."</option>";
                            }
                        } else {
                            echo "No courses found";
                        }

                    $conn->close();
                    ?>
            </select>
            <br><br>


            <label>Session:</label>
            <select>
                <option>NONE</option>
            </select><br><br>
            
            <button type="submit">Submit</button>
        </p>
    </form>
</body>
</html>