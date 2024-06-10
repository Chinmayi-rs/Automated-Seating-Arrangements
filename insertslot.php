<?php
    include 'conn.php';

    $sid=$_GET["slot"];
    $stime=$_GET["stime"];
    $etime=$_GET["etime"];

    $sql="INSERT INTO `slot`(`slot_no`, `start_time`, `end_time`) VALUES ('$sid','$stime','$etime')";

    if($conn->query($sql))
        echo"inserted";
    else
        echo"failed to insert";
    
    $conn->close();
    ?>