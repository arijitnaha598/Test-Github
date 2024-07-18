<?php
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");

?>

<div class="container">
    <div class="row">
        <div class="col-12 py-3">
            <h3 class="text-center">Registered Users</h3>
        </div>
        <div class="col-12 mb-3">
            <a href="./register_user.php" class="btn btn-primary">Add User</a>
        </div>
    </div>
<table class="table table-bordered table-striped table-hover">
  <thead class="table-dark text-center">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Picture</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
   <?php
    $fetch_data = "SELECT reg_id,user_name,user_pic FROM `reg_users`";
    $run_fetch_data = mysqli_query($conn,$fetch_data);
    //var_dump( $run_fetch_data);
//    echo mysqli_num_rows($run_fetch_data);
    
      $counter=1;
       if(mysqli_num_rows($run_fetch_data) > 0){
    //    print_r( mysqli_fetch_assoc($run_fetch_data));
          while($row=mysqli_fetch_assoc($run_fetch_data)){?>

            <tr>
            <th scope="row"><?php /*echo $row["reg_id"];*/ echo $counter; ?></th>
            <td><?php echo $row["user_name"]; ?></td>
            <td>
              <a href="upload_img.php?user_id=<?php echo $row["reg_id"]; ?>">
            <?php
            if($row["user_pic"] == true){?>
              <img width="50px" src="./images/user_image/<?php echo $row["user_pic"]; ?>" alt="dummy picture">
              <?php
            }else{?>
              <img width="50px" src="./images/dummy_image/dummy_profile_pic.jpg" alt= "dummy picture">
            <?php 
            }
            ?>
            </a>
            </td>
            <td class="d-flex justify-content-center">
            <a class="btn btn-primary me-3"  href="./update_user.php?edit_id=<?php echo $row["reg_id"]; ?>">Edit</a>
              <a class="btn btn-danger" href="./delete_user.php?delete_id=<?php echo $row["reg_id"]; ?>">Delete</a>
            </>
          </tr>
          <?php
          $counter++;
          }
       }else{
        ?>
          <tr>
            <td colspan="4">
                <h4 class="text-danger text-center"> No Record Found </h4>
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