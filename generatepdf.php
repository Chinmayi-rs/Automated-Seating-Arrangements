<?php
include "conn.php";
session_start();
require('C:/wamp64/www/need/fpdf186/fpdf.php');

// Create a new PDF instance
$pdf = new FPDF('P','mm','A4');
$pdf->SetFont('Arial','B',12);

// Add title and course details on the first page
$pdf->AddPage();
$pdf->Cell(0, 10, 'Seat Allotment Chart', 0, 1, 'C');

$courseId = $_SESSION["cid"];
$departmentId = $_SESSION["deptid"];
$sql = "SELECT course_title from course where course_id = '$courseId'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, 'Course Code: ' . $courseId, 0, 1, 'C');
$pdf->Cell(0, 10, 'Course Title: ' . $row['course_title'], 0, 1, 'C');
$pdf->Ln();

// Fetch classrooms
$sql_classrooms = "SELECT class_num, capacity FROM classroom WHERE dept_id = $departmentId";
$result_classrooms = $conn->query($sql_classrooms);

// Fetch students enrolled in the course
$sql_students = "SELECT s.usn, s.name, s.type, s.division
                 FROM student s
                 INNER JOIN stu_enroll e ON s.usn = e.usn
                 WHERE e.course_id = '$courseId'
                 ORDER BY s.division, s.usn";
$result_students = $conn->query($sql_students);
$students_a = array();
$students_b = array();

while ($row_student = $result_students->fetch_assoc()) {
    if ($row_student['division'] == 'A') {
        $students_a[] = $row_student;
    } else {
        $students_b[] = $row_student;
    }
}

// Function to allocate students to classrooms
function allocate_students($pdf, $students, &$result_classrooms, $new_classroom = false) {
    if ($new_classroom) {
        // Skip to the next classroom by fetching it once without using it
        $pdf->AddPage();
        if ($result_classrooms->fetch_assoc() === null) {
            // If there are no more classrooms, return the remaining students
            return $students;
        }
    }

    while ($row_classroom = $result_classrooms->fetch_assoc()) {
        $class_num = $row_classroom['class_num'];
        $capacity = $row_classroom['capacity'];

        // Add table headers
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(0, 10, "Classroom: $class_num", 0, 1, 'C');
        $pdf->Cell(30, 10, 'USN', 1, 0, 'C');
        $pdf->Cell(80, 10, 'Name', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Type', 1, 0, 'C');
        $pdf->Cell(30, 10, 'Seat Number', 1, 1, 'C');

        // Allocate students to this classroom
        $allocated_students = 0;
        foreach ($students as $key => $student) {
            if ($allocated_students >= $capacity) {
                break; // Move to the next classroom if the capacity is reached
            }

            // Output student information
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(30, 10, $student['usn'], 1, 0, 'C');
            $pdf->Cell(80, 10, $student['name'], 1, 0, 'C');
            $pdf->Cell(30, 10, $student['type'], 1, 0, 'C');
            $pdf->Cell(30, 10, $allocated_students + 1, 1, 1, 'C');

            $allocated_students++;
            unset($students[$key]); // Remove the allocated student from the array
        }

        // If all students have been allocated, exit the function
        if (empty($students)) {
            break;
        }

        // Move to the next line
        $pdf->Ln(10);

        // Add a new page for subsequent classrooms
        $pdf->AddPage();
    }

    return $students; // Return remaining students if any
}

// Allocate students from division 'A' with the first classroom on the same page
$students_a = allocate_students($pdf, $students_a, $result_classrooms);

// Reset the result set pointer for classrooms
$result_classrooms->data_seek(0);

// Allocate students from division 'B' in new classrooms
$students_b = allocate_students($pdf, $students_b, $result_classrooms, true);

// Output the PDF
$pdf->Output();

$conn->close();
?>
