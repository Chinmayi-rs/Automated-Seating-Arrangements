<?php
session_start();
include('conn.php');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if(isset($_POST['save_excel_data']))
{
    $fileName = $_FILES['import_file']['name'];
    $file_ext = pathinfo($fileName, PATHINFO_EXTENSION);

    $allowed_ext = ['xls','csv','xlsx'];

    if(in_array($file_ext, $allowed_ext))
    {
        $inputFileNamePath = $_FILES['import_file']['tmp_name'];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($inputFileNamePath);
        $data = $spreadsheet->getActiveSheet()->toArray();

        $msg = false; // Initialize message flag

        // Start iterating from the second row (index 1)
        for($count = 1; $count < count($data); $count++)
        {
            $row = $data[$count];

            // Extracting data from each column
            $course_id = $row[0];
            $course_title = $row[1];
            $type = $row[2];
            $dept_id = $row[3];
            $scheme = $row[4];
            $sem = $row[5];

            // Insert data into the database
            $studentQuery = "INSERT INTO course (course_id, course_title, type, dept_id, scheme, sem) VALUES ('$course_id','$course_title','$type','$dept_id','$scheme','$sem')";
            $result = mysqli_query($conn, $studentQuery);

            // Set message flag if at least one row is inserted
            $msg = true;
        }

        if($msg)
        {
            $_SESSION['message'] = "Successfully Imported";
        }
        else
        {
            $_SESSION['message'] = "Not Imported";
        }

        header('Location: index.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Invalid File";
        header('Location: index.php');
        exit(0);
    }
}
?>
