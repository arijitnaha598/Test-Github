<?php
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");

?>

<div class="container">
    <div class="row">
        <div class="col-12 py-3">
            <h3 class="text-center">Today Expenses Dashboard</h3>
        </div>
        <div class="col-12 mb-3">
            <a href="./add_expenses.php" class="btn btn-primary">Add Expense</a>
        </div>
    </div>
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
    $today_date = date("Y-m-d");
    $fetch_expense = "SELECT * FROM `expense_info` WHERE `item_date`='$today_date' ORDER BY `item_date` DESC";
    $run_fetch_expense = mysqli_query($conn,$fetch_expense);
    //incriment 
    $exprense_counter = 1;
    $total=0;
    if(mysqli_num_rows($run_fetch_expense) > 0){
        while($row=mysqli_fetch_assoc($run_fetch_expense)){?>
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
     ?>
  </tbody>
</table>
</div>




<?php
include("./includes/footer.php");
?>