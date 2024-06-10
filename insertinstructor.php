<?php

        include 'conn.php';

        $empid = $_GET['empid'];
        $first_name = $_GET['first_name'];
        $phone_number =  $_GET['phone_number'];
        $dept_id = $_GET['department'];
        $course_id = $_GET['courseTitle'];
         
        $sql = "INSERT INTO `instructor`(`empid`, `first_name`, `phone_number`, `course_id`, `dept_id`) VALUES ('$empid','$first_name','$phone_number','$course_id','$dept_id')";
        
        if($conn->query($sql)){
            echo "Data inserted successfully"; 
           
        } else{
            echo "ERROR inserting instructor data ";
        }
    
    
         $conn->close();
        ?>