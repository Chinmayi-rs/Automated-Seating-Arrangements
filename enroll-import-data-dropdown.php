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
                    <h4>How to Import Excel Data into database in PHP</h4>
                </div>
                <div class="card-body">
                    <form action="enroll-code-dw.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="import_file" class="form-label">Select Excel File:</label>
                            <input type="file" name="import_file" id="import_file" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="department" class="form-label">Department:</label>
                            <select name="department" id="department" class="form-select">
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
                        </div>

                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester:</label>
                            <select name="semester" id="semester" class="form-select">
                            <option value="">Select Semester</option>
                <?php
                $sql = "SELECT DISTINCT sem FROM course";
                $result = $conn->query($sql);

                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['sem'] . "'>" . $row['sem'] . "</option>";
                }
                ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="course_type" class="form-label">Course Type:</label>
                            <select name="course_type" id="course_type" class="form-select">
                                <option value="">Select Course Type</option>
                                <option value="core">Core</option>
                                <option value="elective">Elective</option>
                                <option value="audit">Audit</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="course_title" class="form-label">Course Title:</label>
                            <select name="course_title" id="course_title" class="form-select">
                                <option value="">Select Course Title</option>
                            </select>
                        </div>

                        <button type="submit" name="save_excel_data" class="btn btn-primary">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
$(document).ready(function() {
    function fetchCourseTitles() {
        var department = $('#department').val();
        var semester = $('#semester').val();
        var courseType = $('#course_type').val();

        $.ajax({
            url: 'get_courses3.php',
            type: 'GET',
            data: {
                department: department,
                semester: semester,
                courseType: courseType
            },
            success: function(response) {
                $('#course_title').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    $('#department, #semester, #course_type').change(function() {
        fetchCourseTitles();
    });
});
</script>

</body>
</html>
