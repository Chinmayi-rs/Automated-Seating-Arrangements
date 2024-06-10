<?php
include "conn.php";
$stuid=$_GET['usn'];
$sql="DELETE from stu_enroll where USN= '$stuid'";
$sql2="DELETE from student where USN= '$stuid'";


$result = $conn->query($sql);
$result1 = $conn->query($sql2);
if(!$result){
    echo "delete unsuccessful";

}
else echo "delete successful";
if(!$result1){
    echo "delete unsuccessful";

}
else echo "delete successful";
$conn->close();
?>