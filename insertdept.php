<?php
    include 'conn.php';

    $did=$_GET["did"];
    $dname=$_GET["deptname"];
    $loc=$_GET["deptloc"];

    $sql = "INSERT INTO `department`(`dept_id`, `dept_name`, `location`) VALUES ('".$did."','".$dname."','".$loc."')";
    
    if( $conn->query($sql) )
        echo"inserted";
    else
        echo"failed to insert";

    $conn->close();
?>