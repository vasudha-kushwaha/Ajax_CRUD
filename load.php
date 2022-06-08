<?php
include 'Connection.php';

    $sql="SELECT * FROM student";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $output="<table class='table'><tr><td>Roll No</td><td>First Name</td><td>Last Name</td><td>Mobile No.</td><td>Action</td></tr>";

        while($row = $result->fetch_assoc()) {
            $output .= "<tr><td>{$row["RollNo"]}</td>
            <td>{$row["FName"]}</td>
            <td>{$row["LName"]}</td>
            <td>{$row["Mobile"]}</td>
            <td><button class='delete-btn btn-danger' data-id={$row["RollNo"]}>Delete</button> 
            <button class='edit-btn btn-success' data-bs-toggle='modal' data-bs-target='#myModel' data-id={$row["RollNo"]}>Edit</button>
            </td></tr>";
        }
        $output .="</table>";
        echo $output;

    } else{
        echo "No record Found";
    }
    
?>