<?php
    include 'conn.php';
    
    $dept=$_GET["dept"];

    $sql = "DELETE FROM `department` WHERE dept_id = '".$dept."'";

    if($conn->query($sql))
        echo"Deleted";
    else
        echo"Failed to Delete";

    $conn->close();
    ?>