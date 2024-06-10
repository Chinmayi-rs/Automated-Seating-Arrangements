<?php
        include 'conn.php';
        

        $empid = $_GET["empid"];
       

        $sql = "DELETE FROM instructor WHERE empid='$empid'";

        if($conn->query($sql)) {
           echo "Record deleted successfully";
     } else {
           echo "Error deleting record: " . $conn->error;
     }
    

$conn->close();
?>