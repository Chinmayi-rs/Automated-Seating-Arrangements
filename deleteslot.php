<?php
    include 'conn.php';
    
    $slot=$_GET["slot"];

    $sql="SELECT * FROM `slot` WHERE `slot_no` = '$slot' ";

    if($conn->query($sql))
        echo"Deleted";
    else
        echo"Failed to delete";
    
    $conn->close();
    ?>