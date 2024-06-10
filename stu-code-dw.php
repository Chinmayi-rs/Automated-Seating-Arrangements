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
        $worksheet = $spreadsheet->getActiveSheet();

        $highestRow = $worksheet->getHighestRow();

        $msg = false;

        for($row = 2; $row <= $highestRow; $row++)
        {
            $usn = $worksheet->getCell('A' . $row)->getValue();
            $Name = $worksheet->getCell('B' . $row)->getValue();
            $phno = $worksheet->getCell('C' . $row)->getValue();
            $dept = $_POST['dept'];
            $Year = $_POST['year'];
            $Sem = $_POST['semester'];
            $Type = $_POST['type'];
            $division = $_POST['div'];
            

            $studentQuery = "INSERT INTO student (USN, name, dept_id, year, sem, type, division) VALUES ('$usn', '$Name',  '$dept', '$Year', '$Sem', '$Type','$division')";
            $result = mysqli_query($conn, $studentQuery);

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