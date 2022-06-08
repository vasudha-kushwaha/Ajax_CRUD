<?php
include 'Connection.php';

    $id=$_POST["stu_id"];
   
    $sql="DELETE FROM student WHERE RollNo = {$id}";
    if ($conn->query($sql)) {
        echo 1;
      } else {
        echo 0;
      }
      
      $conn->close();
    
?>