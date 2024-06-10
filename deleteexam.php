<?php
    include 'conn.php';
    
    $eid=$_GET["eid"];

    $sql="DELETE FROM `exam` WHERE `exam_no` = '$eid' ";

    if($conn->query($sql))
        echo"Deleted";
    else
        echo"Failed to Delete";
    
    $conn->close();
    ?>