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

        // Get the highest row number containing data
        $highestRow = $worksheet->getHighestRow();

        $msg = false; // Initialize message flag

        // Start iterating from the second row (index 2)
        for($row = 2; $row <= $highestRow; $row++)
        {
            $usn = $worksheet->getCell('A' . $row)->getValue();
            $Name = $worksheet->getCell('B' . $row)->getValue();
            $phno = $worksheet->getCell('C' . $row)->getValue();
            $d_id = $worksheet->getCell('D' . $row)->getValue();
            $Year = $worksheet->getCell('E' . $row)->getValue();
            $Sem = $worksheet->getCell('F' . $row)->getValue();
            $Type = $worksheet->getCell('G' . $row)->getValue();

            // Insert data into the database
            $studentQuery = "INSERT INTO student (USN, name, phone_number, dept_id, year, sem, type) VALUES ('$usn', '$Name', '$phno', '$d_id', '$Year', '$Sem', '$Type')";
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
