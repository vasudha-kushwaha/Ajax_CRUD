<?php
include 'Connection.php';

    
    $limit=2;
    $page="";

    if(isset($_POST["page_no"])){
        $page=$_POST["page_no"];
    }else{
        $page=1;
    }

    $offset = ($page - 1) * $limit;

    $sql="SELECT * FROM student LIMIT {$offset} , {$limit}";
    $result = $conn->query($sql);

    $output="";
    if ($result->num_rows > 0) {
        $output .="<table class='table'><tr><td>Roll No</td><td>First Name</td><td>Last Name</td><td>Mobile No.</td><td>Action</td></tr>";

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

        $sqlTotal="SELECT * FROM student";

        $records= mysqli_query($conn, $sqlTotal);

        $TotalRecord=mysqli_num_rows($records);

        $TotalPages= ceil($TotalRecord/$limit);

        $output .= "<div class='container' id='pagination'>";

        for($i=1 ; $i<=$TotalPages ; $i++){
            if($i==$page){
                $class_name="active";
            }else{
                $class_name="";
            }

            $output .= "<a class='{$class_name}' href='' id='{$i}'>{$i}</a> &nbsp;&nbsp;";
        }
        $output .= "</div>";

        echo $output;

    } else{
        echo "No record Found";
    }
    
?>