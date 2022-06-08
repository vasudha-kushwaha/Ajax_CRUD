<?php
include 'Connection.php';

    $first=$_POST["first_name"];
    $last=$_POST["last_name"];
    $mob=$_POST["mobile"];

    $sql="INSERT INTO student (FName, LName, Mobile) VALUES ('{$first}','{$last}','{$mob}')";
    if ($conn->query($sql)) {
        echo 1;
      } else {
        echo 0;
      }
      
      $conn->close();
    
?>