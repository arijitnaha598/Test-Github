<?php
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");
// echo "Hello edit";
$edit_pass_id="";
$db_user_name="";
$db_user_pass="";
//fatching data from database
if(isset($_GET["edit_id"])){
  $edit_pass_id= $_GET["edit_id"];

  $select_edit= "SELECT `user_name`, `user_pass` FROM `reg_users` WHERE `reg_id`='$edit_pass_id'";
  $run_selet_query= mysqli_query($conn,$select_edit);

  $row= mysqli_fetch_assoc($run_selet_query);
  // print_r($row);
  $db_user_name= $row["user_name"];
  $db_user_pass= $row["user_pass"];
}
//upating user password in database
if(isset($_POST["update_pass"])){
  $update_user_pass= $_POST["update_user_pass"];
  //password encrypted by update form
  $enc_password = password_hash($update_user_pass,PASSWORD_BCRYPT);

  $update_query= "UPDATE `reg_users` SET `user_pass`='$enc_password' WHERE `reg_id`='$edit_pass_id'";
  $run_update_query= mysqli_query($conn,$update_query);

  if($run_update_query){
    my_alert("success","password updating successfully");
  }else{
    my_alert("danger","Error ehile updating the password");
  }
}


?>


<div class="container">
<div class="card" id="my-card">
  <div class="card-header bg-success text-white text-center">
  Edit Register User
    </div>
  <div class="card-body">
    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
            <div class="mb-3">
            <label for="" class="form-label">User Name</label>
            <input type="text" name="user_name" class="form-control" value="<?php echo $db_user_name; ?>" disabled>
            </div>
            <div class="mb-3">
            <label for="" class="form-label">User Password</label>
            <input type="password" name="update_user_pass" class="form-control" value="<?php echo $db_user_pass; ?>" >
            </div>
            <div class="mb-3">
            <button type="submit" name="update_pass" class="btn btn-success w-100">Update</button>
            </div>
            </form>
        </div>
</div>
  </div>
</div>
</div>







<?php
include("./includes/footer.php");
?>