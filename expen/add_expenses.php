<?php
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");


 check_user();

if(isset($_POST["add_item"])){
    // echo "Ok";
    $item_name= $_POST["item_name"];
    $item_price= $_POST["item_price"];
    $item_date= $_POST["item_date"];
    $item_details= $_POST["item_details"];
    //  echo $item_name . $item_price .  $item_date . $item_details;

//insarting data into database
$sql= "INSERT INTO `expense_info`(`item_name`, `item_price`, `item_date`, `item_details`) VALUES ('$item_name','$item_price','$item_date','$item_details')";

if (mysqli_query($conn,$sql)) {
    my_alert("success","New record created successfully");
  } else {
    my_alert("danger","Error while inserting the record");
  }
  
  mysqli_close($conn);
  
  
  }




?>
<div class="container py-3">
<h2 class="text-center display-4 py-3 fw-semibold">Add Expense</h2>
    <form action="" method="POST">
    <div class="row">
        <div class="col-md-4 mb-3">
            <label for="" class="form-label">Name</label>
            <input type="text" class="form-control" name="item_name" placeholder="Item Name">
        </div>
        <div class="col-md-4 mb-3">
            <label for="" class="form-label">Price</label>
            <input type="number" class="form-control" name="item_price" placeholder="Amount">
        </div>
        <div class="col-md-4 mb-3">
            <label for="" class="form-label">Date</label>
            <input type="date" class="form-control" value="<?php echo date("Y-m-d");?>" name="item_date">
        </div>
        <div class="col-md-12 mb-3">
            <label for="" class="form-label">Details</label>
            <input type="text" class="form-control" name="item_details" placeholder="Enter Details">
        </div>
        <div class="col-md-12 mb-3">
            <button type="submit" name="add_item" class="btn btn-primary">Add Expense</button>
        </div>
    </div>
    </form>
</div>








<?php
include("./includes/footer.php");
?>