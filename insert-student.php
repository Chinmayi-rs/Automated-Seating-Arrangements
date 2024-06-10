<!DOCTYPE html>
<html>
<head>
    <title>Student Enrollment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    
    <form method="get" action="insertstudent.php">
    <h2>Student Enrollment Form</h2>
        <label for="usn">USN:</label>
        <input type="text" id="usn" name="usn" required>
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" required>

        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required>

        <label for="year">Year:</label>
        <input type="text" id="year" name="year" required>
        
        <label for="dept_id">Department:</label>
        <select id="dept_id" name="dept_id">
            <!-- Department options will be dynamically populated here -->
        </select>

        <label for="sem">Semester:</label>
        <select id="sem" name="sem">
            <!-- Semester options will be dynamically populated here -->
        </select>

        <div id="course_container">
            <!-- Courses dropdown will be dynamically populated here -->
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        // Function to fetch and display courses based on department and semester selection
        function fetchCourses() {
            var dept_id = document.getElementById('dept_id').value;
            var sem_id = document.getElementById('sem').value;
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("course_container").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "fetch_courses.php?dept_id=" + dept_id + "&sem=" + sem_id, true);
            xhttp.send();
        }

        // Initial fetch of courses based on default department and semester selection
        fetchCourses();

        // Event listener for department and semester dropdown change
        document.getElementById('dept_id').addEventListener('change', fetchCourses);
        document.getElementById('sem').addEventListener('change', fetchCourses);
    </script>
</body>
</html>
