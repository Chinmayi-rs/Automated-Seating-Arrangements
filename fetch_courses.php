<?php
include "conn.php";

$dept_id = $_GET['dept_id'];
$sem_id = $_GET['sem'];

// Prepare and bind parameters to prevent SQL injection
$stmt = $conn->prepare("SELECT * FROM course WHERE dept_id = ? AND sem = ?");
$stmt->bind_param("ii", $dept_id, $sem_id);
$stmt->execute();

$result = $stmt->get_result();

echo "<label for='courses_dropdown'>Courses:</label><br>";
echo "<div class='dropdown'>";
// echo "<button class='dropbtn'>Select Courses</button>";
echo "<div class='dropdown-content' id='courses_dropdown'>";

while($row = $result->fetch_assoc()) {
    echo "<input type='checkbox' name='courses[]' value='".$row['course_id']."'>".$row['course_title']."<br>";
}

echo "</div>";
echo "</div>";

$stmt->close();
mysqli_close($conn);
?>
