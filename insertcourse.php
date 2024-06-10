<?php
    include 'conn.php';
    $cid=$_GET["cid"];
    $ctitle=$_GET["ctitle"];
    $type=$_GET["type"];
    $dept=$_GET["dept"];
    $scheme=$_GET["scheme"];
    $sem=$_GET["sem"];

    $sql="INSERT INTO course VALUES(".$cid.",'".$ctitle."','".$type."','".$dept."','".$scheme."','".$sem."')";

    if($conn->query($sql))
        echo"inserted";
    else
        echo"failed to insert";
    
    $conn->close();
    ?>