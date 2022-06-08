<?php
include 'Connection.php';

    $id=$_POST["RollNo"];
    $first=$_POST["first_name"];
    $last=$_POST["last_name"];
    $mob=$_POST["Mobile"];
   
    $sql="UPDATE student SET FName='{$first}', LName='{$last}', Mobile='{$mob}' WHERE RollNo = {$id}";
    if ($conn->query($sql)) {
        echo 1;
      } else {
        echo 0;
      }
      
      $conn->close();
    
?>