<?php
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");

check_user();

?>


<div class="container">
<form action="" method="POST">
    <div class="row">
        <div class="col-md-12">
        <h2 class="text-center display-5 fw-bold py-5">Search Expense</h2>
        </div>
            <div class="col-md-5 mb-3">
                <lable for="" class="form-lable">From</lable>
                <input type="date" class="form-control" name="from_date" max="<?php echo date("Y-m-d")?>">
            </div>
            <div class="col-md-5 mb-3">
                <lable for="" class="form-lable">To</lable>
                <input type="date" class="form-control" name="to_date" max="<?php echo date("Y-m-d")?>">
            </div>
            <div class="col-md-2 mb-3 align-self-end">
                <!-- <lable for="" class="form-lable">Search</lable> -->
                <button type="submit" class="btn btn-primary w-100" name="search">Search</button>
            </div>
            </div>
</form>
<table class="table table-bordered table-striped table-hover">
  <thead class="table-dark">
    <tr class="text-center">
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Price</th>
      <th scope="col">Date Added</th>
      <th scope="col">Expense Details</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if(isset($_POST['search'])){
        $from_date= $_POST['from_date'];
        $to_date  = $_POST['to_date'];
        //print_r($_POST);
        $search_expense = "SELECT * FROM `expense_info` WHERE `item_date` BETWEEN '$from_date' AND '$to_date'";
    $run_search_expense = mysqli_query($conn,$search_expense);

    $exprense_counter= 1;
    $total= 0;
    if(mysqli_num_rows($run_search_expense) > 0){
      while($row=mysqli_fetch_assoc($run_search_expense)){?>
      <tr>
      <td><?php echo $exprense_counter; ?></td>
      <td><?php echo $row["item_name"]; ?></td>
      <td><?php echo $row["item_price"]; ?></td>
      <td><?php customize_date($row["item_date"]); ?></td>
      <td><?php echo $row["item_details"]; ?></td>
      <td class="d-flex justify-content-evenly">
      <a class="btn btn-danger" href="./delete_expenses.php?del_expense_id=<?php echo $row["item_id"]; ?>">Delete</a>
      <a class="btn btn-success" href="./edit_expenses.php?edit_expense_id=<?php echo $row["item_id"]; ?>">Edit</a>
      </td>
      </tr>
      <?php
      $exprense_counter++;
      $total= $total + $row["item_price"];
      // echo $total;
      }
      ?>
      <tr>
        <th colspan="2">Total Amount</th>
        <th><?php echo $total; ?></th>
      </tr>
      <?php
  }else{
      ?>
      <tr>
        <td colspan="6">
          <h3 class="text-danger text-center">No Record Found</h3>
        </td>
      </tr>
      <?php
     }
    }
   ?>
  </tbody>
</table>
</div>








<?php
include("./includes/footer.php");
?>