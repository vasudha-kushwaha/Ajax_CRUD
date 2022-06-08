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
            <h3>Ajax Learn Pagination</h3>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6" >
            <h4></h4>
            </div>
            <div class="col-md-6" >
            
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
                <div class="container" id="pagination">
                    
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

//Pagination

$(document).ready(function(){
    function loadTable(page){
        $.ajax({
            url : "loadmore.php",
            type : "POST",
            data : {page_no:page},
            success:function(data){ // data as an object
                $("#table-data").html(data);
            }
        })       
    }
    loadTable();
       
//Pagination Numbers
    $(document).on("click", "#pagination a", function(e){
        e.preventDefault();
        var pageId= $(this).attr("id");

        loadTable(pageId);
    });


});
</script>


</body>
</html>
