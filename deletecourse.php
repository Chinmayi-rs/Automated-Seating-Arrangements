<?php
    include 'conn.php';
    
    $cid=$_GET["cid"];

    $sql = "DELETE FROM course WHERE course_id ='".$cid."'";
    
    if($conn->query($sql))
        echo"Deleted";
    else
        echo"Failed to Delete";
    
    $conn->close();
?>