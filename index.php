<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
  <script src="bootstrap/bootstrap.bundle.min.js"></script>
  <script src="bootstrap/jquery-3.6.0.min.js"></script>
  
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h3>Ajax Learn</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6" >
            <h4>Enter Search Term</h4>
            </div>
            <div class="col-md-6" >
            <input type="text" name="Search" id="Search">
            </div>
        </div>
<hr>
        <div class="row">
            <div class="col-md-6">
                <div class="container">
                <h2>Enter Student Data</h2>
                    <form action="" id="myform">
                    <table class="table">
                        <tr>
                            <td>First Name</td><td><input type="text" name="FName" id="FName"></td>
                        </tr>
                        <tr>
                            <td>Last Name</td><td><input type="text" name="LName" id="LName"></td>
                        </tr>
                        <tr>
                            <td>Mobile Number</td><td><input type="text" name="Mob" id="Mob"></td>
                        </tr>
                        <tr>
                            <td>
                            <input type="button" value="submit" name="submit" id="load-button">
                            </td>
                        </tr>
                    </table>
                    </form>
                    <div id="error">

                    </div>
                    <div id="success">

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="container" id="table-data">
                Load Data
                </div>
                
            </div>
        </div>

    </div>
<!-- Model Start -->

<div class="modal" id="myModel" >
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" id="myModelBody">
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <input type="button" class="btn btn-success" value="Update" name="submit" id="update-record">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
<!-- Model End -->

    
<script>
//Load Table
    $(document).ready(function(){
        function loadTable(){
            $.ajax({
                url : "load.php",
                type : "POST",
                success:function(data){
                    $("#table-data").html(data);
                }
            });
        }
        loadTable();

//Insert Data
        $("#load-button").on("click", function(e){
            e.preventDefault();
            var f= $("#FName").val();
            var l= $("#LName").val();
            var m= $("#Mob").val();

            if(f==""||l==""||m==""){
                $("#error").html("All fields are required").slideDown();
                $("#success").slideUp();
            }else{
                $.ajax({
                    url : "insert.php",
                    type : "POST",
                    data : {first_name:f, last_name:l, mobile:m},
                    success:function(data){ 
                        if(data == 1){
                            loadTable();
                            $("#myform").trigger("reset");
                            $("#success").html("Data inserted.").slideDown();
                            $("#error").slideUp();
                        }else{
                            $("#error").html("Can't Save Record.").slideDown();
                            $("#success").slideUp();
                        }
                    }
                });
            }
        });

//Delete Data
        $(document).on("click", ".delete-btn", function(){
            if(confirm("Do you really want to delete")){
                var id=$(this).data("id");
                var element= this;
                $.ajax({
                    url : "del.php",
                    type : "POST",
                    data : {stu_id : id},
                    success:function(data){
                        if(data == 1){
                            $(element).closest("tr").fadeOut();
                            
                        }else{
                            $("#error").html("Can't Delete Record.").slideDown();
                            $("#success").slideUp();
                        }
                    }
                });
            }else{
            }
        });


//Update Data
        $(document).on("click", ".edit-btn", function(){
            $("#myModel").show();
            var id=$(this).data("id");
            var element= this;
            $.ajax({
                url : "update.php",
                type : "POST",
                data : {stu_id : id},
                success : function(data){
                    $("#myModelBody").html(data);
                }
            });
        });


        $(document).on("click", "#update-record", function(){
            var RNo= $("#EditRollNo").val();
            var fName= $("#EditFName").val();
            var lName= $("#EditLName").val();
            var Mobile= $("#EditMob").val();
            $.ajax({
                url : "ajax-update.php",
                type : "POST",
                data : {RollNo: RNo, first_name:fName, last_name:lName, Mobile:Mobile},
                success :  function(data){
                    if(data==1){
                        $("#myModel").hide();
                        loadTable();
                    }
                }
            });
        });

// Live Search

        $("#Search").on("keyup", function(){
            var search_term= $(this).val();
            $.ajax({
                url : "search.php",
                type : "POST",
                data : {search: search_term},
                success :  function(data){
                    $("#table-data").html(data);
                }
            });
        });

//Pagination

        $(document).ready(function(){
            function loadTable(page){
                url : "pagination.php",
                type : "POST",
                data : {page_no:page},
                success:function(data){
                    $("#table-data").html(data);
            }
        });

//Pagination Numbers
        $(document).on("click", "#Pagination a", function(e){
            e.preventDefault();
            var pageId= $(this).attr("#id");
            loadTable(pageId);
        });





    });
</script>


</body>
</html>
