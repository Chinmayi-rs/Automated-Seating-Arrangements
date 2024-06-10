<?php
include "conn.php";
echo"Thank You <br>
You will be redirected to home page in a second";
$sql = "DELETE from allot_stu_class WHERE 1";

$res = $conn->query($sql);
if($res)
    header("refresh:1;URL=index.html");
else
    echo "invalid";
?>