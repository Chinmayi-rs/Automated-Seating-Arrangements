<?php
    include 'conn.php';
    
    $cid=$_GET["cid"];
    $eid=$_GET["eid"];
    $slot=$_GET["slot"];
    $etype=$_GET["etype"];
    $edate=$_GET["edate"];

    $sql="INSERT INTO `exam`(`exam_date`, `exam_Type`, `exam_no`, `slot_no`, `course_id`) VALUES ('$edate','$etype','$eid','$slot','$cid')";

    if($conn->query($sql))
        echo"inserted";
    else
        echo"failed to insert";
    
    $conn->close();
    ?>