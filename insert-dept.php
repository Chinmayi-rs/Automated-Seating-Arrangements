<!DOCTYPE html>
<html>
<head>
    <title>Add Department Details</title>
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
        h2 {
            text-align: center;
            margin-top: 20px;
        }
        label {
            font-weight: bold;
            display: block;
        }
        input[type="text"] {
            width: calc(100% - 12px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
    <form method="GET" action="insertdept.php">
        <h2>Insert Department Data</h2>
        <label for="deptid">Department ID:</label>
        <input type="text" id="deptid" name="did">

        <label for="dept">Department Name:</label>
        <input type="text" id="dept" name="deptname">

        <label for="dept">Department Location:</label>
        <input type="text" id="dept" name="deptloc">

        <input type="submit" value="Submit">
    </form>
</body>
</html>
