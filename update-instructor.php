<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Instructor Details</title>
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
        h1 {
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
        input[type="text"], select {
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
        <h1>Update Instructor Details</h1>
        <form action="updateinstructor.php" method="get">
            <label for="empid">Empid:</label>
            <input type="text" name="empid" required>
            <br><br>
            <label for="first_name">Name:</label>
            <input type="text" name="first_name">
            <br><br>
            <label for="phone_number">Phone Number:</label>
            <input type="text" name="phone_number">
            <br><br>
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
            <br><br>
            <label for="courseTitle">Course Title:</label>
            <select name="courseTitle" id="courseTitle">
                <option value="">Select Course Title</option>
            </select>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function fetchCourseTitles() {
                var department = $('#department').val();

                $.ajax({
                    url: 'get_courses1.php',
                    type: 'GET',
                    data: {
                        department: department,
                    },
                    success: function(response) {
                        $('#courseTitle').html(response);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }

            $('#department').change(function() {
                fetchCourseTitles();
            });
        });
    </script>
</body>
</html>
