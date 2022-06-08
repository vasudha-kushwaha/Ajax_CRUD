<?php
include 'Connection.php';

    $RollNo=$_POST["stu_id"];


    $sql="SELECT * FROM student WHERE RollNo ='{$RollNo}'";
    $result = $conn->query($sql);
    $output="";
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
        $output .= "<table class='table'>
            <tr>
                <td ></td><td><input type='text' name='FName' id='EditRollNo' hidden value='{$row["RollNo"]}'> </td>
            </tr>
            <tr>
                <td>First Name</td><td><input type='text' name='FName' id='EditFName' value='{$row["FName"]}'> </td>
            </tr>
            <tr>
                <td>Last Name</td><td><input type='text' name='LName' id='EditLName' value='{$row["LName"]}'></td>
            </tr>
            <tr>
                <td>Mobile Number</td><td><input type='text' name='Mob' id='EditMob' value= '{$row["Mobile"]}' ></td>
            </tr></table>";
        }
        echo $output;
      } else {
        echo 0;
      }
      
      $conn->close();
      


   
    
?>