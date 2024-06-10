<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .navbar {
            background-color: #ababab;
            overflow: hidden;
            margin-bottom: 50px;
        }
        .navbar a {
            float: right;
            display: block;
            color: #020202;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
            margin-top: 30px;
            margin-bottom: 8px;
            margin-right: 10px;
            width: 120px;
        }
        .navbar a:hover {
            background-color: #ddd;
            color: black;
        }
        .navbar img {
            float: left;
            margin: 10px;
            height: 90px;
        }
        h2{
            font-size: 40px;
            text-align: center;
            margin-bottom: 100px;
        }
        button {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 15px 30px;
            font-size: 14px;
            margin: 10px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: 20px;
        }
        button:hover {
            background-color: #45a049;
        }
        .footer {
            background-color: #ababab;
            color: #010101;
            text-align: center;
            padding: 5px;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<div class="navbar">
        <img src="new-logo.png" alt="Logo">
        <a href="#">Contact Us</a>
        <a href="examtime.php">Time Table</a>
        <a href="allotform.php">Allotment</a>
        <a href="index.html">Home</a>
    </div>
    <h2>Import Page</h2>
    <button onclick="window.location.href = 'stu-import-data.php';">Import Student Data</button>
    <button onclick="window.location.href = 'stu-import-data-dropdown.php';">Import Student Dropdown Data</button>
    <button onclick="window.location.href = 'teacher-import-data.php';">Import Teacher Data</button>
    <button onclick="window.location.href = 'enroll-import-data.php';">Import Enrollment Data</button>
    <button onclick="window.location.href = 'enroll-import-data-dropdown.php';">Import Enrollment dropdown Data</button>
    <button onclick="window.location.href = 'course-import-data.php';">Import Course Data</button>
    <div class="footer">
        <p>&copy; 2024 SDMCET. All rights reserved.</p>
    </div>
</body>
</html>
