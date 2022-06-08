<?php
include 'Connection.php';

    $s=$_POST["search"];

    $sql="SELECT * FROM student WHERE FName LIKE '%{$s}%' OR LName LIKE '%{$s}%'";
    
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $output="<table><tr><td>Roll No</td><td>First Name</td><td>Last Name</td><td>Mobile No.</td><td>Action</td></tr>";

        while($row = $result->fetch_assoc()) {
            $output .= "<tr><td>{$row["RollNo"]}</td>
            <td>{$row["FName"]}</td>
            <td>{$row["LName"]}</td>
            <td>{$row["Mobile"]}</td>
            <td><button class='delete-btn' data-id={$row["RollNo"]}>Delete</button> 
            <button class='edit-btn' data-bs-toggle='modal' data-bs-target='#myModel' data-id={$row["RollNo"]}>Edit</button>
            </td></tr>";
        }
        $output .="</table>";
        echo $output;

    } else{
        echo "No record Found";
    }

   
    
?>