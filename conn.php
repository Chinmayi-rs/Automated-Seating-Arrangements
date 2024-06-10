<?php
 $username="root";
 $server="localhost";
 $db="blockingsystem";
 $pwd="";

 $conn = new mysqli($server,$username,$pwd,$db);
 
 if (!$conn) 
    echo "connection failure";
?>