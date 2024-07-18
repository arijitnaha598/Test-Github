<?php
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");


 check_user();

 $edit_expense_id="";
 $db_item_name="";
 $db_item_price="";
 $db_item_date="";
 $db_item_details="";
 //fatching data from database
 if(isset($_GET["edit_expense_id"])){
   $edit_expense_id= $_GET["edit_expense_id"];
 
   $select_edit= "SELECT * FROM `expense_info` WHERE `item_id`='$edit_expense_id'";
   $run_selet_query= mysqli_query($conn,$select_edit);
 
   $row= mysqli_fetch_assoc($run_selet_query);
   // print_r($row);
   $db_item_name= $row["item_name"];
   $db_item_price= $row["item_price"];
   $db_item_date= $row["item_date"];
   $db_item_details= $row["item_details"];
 }
 //upating expense_info table colum values
 if(isset($_POST["update_item"])){
   $update_item_name= $_POST["update_item_name"];
   $update_item_price= $_POST["update_item_price"];
   $update_item_date= $_POST["update_item_date"];
   $Update_item_details= $_POST["Update_item_details"];
 
   $update_query= "UPDATE `expense_info` SET `item_name`='$update_item_name',`item_price`='$update_item_price',`item_date`='$update_item_date',`item_details`='$Update_item_details' WHERE `item_id`='$edit_expense_id'";

   $run_update_query= mysqli_query($conn,$update_query);
 
   if($run_update_query){
     my_alert("success","Expnse updating successfully");
   }else{
     my_alert("danger","Error ehile updating the Expense");
   }
 }
 




?>
<div class="container py-3">
<h2 class="text-center display-4 py-3 fw-semibold">Update Expense</h2>
    <form action="" method="POST">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="update_item_name" placeholder="Item Name" value="<?php echo $db_item_name  ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="" class="form-label">Price</label>
            <input type="number" class="form-control" name="update_item_price" placeholder="Amount" value="<?php echo $db_item_price  ?>">
        </div>
        <div class="col-md-4 mb-3">
            <label for="" class="form-label">Date</label>
            <input type="date" class="form-control" name="update_item_date" value="<?php echo $db_item_date  ?>">
        </div>
        <div class="col-md-12 mb-3">
            <label for="" class="form-label">Details</label>
            <input type="text" class="form-control" name="Update_item_details" placeholder="Enter Details" value="<?php echo $db_item_details  ?>">
        </div>
        <div class="col-md-12 mb-3">
            <button type="submit" name="update_item" class="btn btn-success">Update Expense</button>
        </div>
    </div>
    </form>
</div>








<?php
include("./includes/footer.php");
?>