<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>How to Import Excel Data into database in PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
            <?php
                if(isset($_SESSION['message']))
                {
                    echo "<h4>".$_SESSION['message']."</h4>";
                    unset($_SESSION['message']);
                }
            ?>

                <div class="card">
                    <div class="card-header">
                        <h4>Student Excel Data into database in PHP</h4>
                    </div>
                    <div class="card-body">

                        <form action="stu-code-dw.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="import_file" class="form-control" />
                            <br>
                            <label for="semester">Select Semester:</label>
                            <select name="semester" id="semester" class="form-control" required>
                                <option value="">Select Semester</option>
                                <?php
                                    for ($i = 1; $i <= 8; $i++) {
                                        echo "<option value='$i'>$i</option>";
                                    }
                                ?>
                            </select>
                            <br>
                            <label for="year">Enter Year:</label>
                            <input type="number" name="year" id="year" class="form-control" required>
                            <br>
                            <label for="type">Select Type:</label>
                            <select name="type" id="type" class="form-control" required>
                                <option value="Normal">Normal</option>
                                <option value="RR">RR</option>
                            </select>
                            <br>
                            <label for="div">Select Division:</label>
                            <select name="div" id="div" class="form-control" required>
                                <option value="A">A</option>
                                <option value="B">B</option>
                            </select>
                            <br>
                            <label for="dept">Select Department:</label>
                            <select name="dept" id="dept" class="form-control" required>
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
                            <br>
                            <button type="submit" name="save_excel_data" class="btn btn-primary mt-3">Import</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
