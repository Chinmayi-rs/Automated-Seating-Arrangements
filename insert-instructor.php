<!DOCTYPE html>
<html>
<head>
    <title>Add Instructor Details</title>
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
        h1 {
            text-align: center;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        select {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        select {
            width: 100%;
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
    
    <form action="insertinstructor.php" method="get">
    <h1>Add Instructor Details</h1>
        <label for="empid">Employee ID:</label>
        <input type="text" name="empid" id="empid">

        <label for="first_name">Name:</label>
        <input type="text" name="first_name" id="first_name">

        <label for="phone_number">Phone Number:</label>
        <input type="text" name="phone_number" id="phone_number">

        <label for="department">Department:</label>
        <select name="department" id="department">
            <option value="">Select Department</option>
            <?php
            include 'conn.php';
            $sql = "SELECT * FROM department";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['dept_id'] . "'>" . $row['dept_name'] . "</option>";
            }
            ?>
        </select>

        <label for="courseTitle">Course Title:</label>
        <select name="courseTitle" id="courseTitle">
            <option value="">Select Course Title</option>
        </select>

        <br><br>
        <input type="submit" name="submit">
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#department').change(function() {
                var department = $(this).val();
                $.ajax({
                    url: 'get_courses1.php',
                    type: 'GET',
                    data: { department: department },
                    success: function(response) {
                        $('#courseTitle').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
