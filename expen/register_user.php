<?php
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");

if(isset($_POST["register"])){
  //getting values from html form
$user_name= $_POST["user_name"];
$user_pass= $_POST["user_pass"];

//Encrypted Password
$enc_pass = password_hash($user_pass,PASSWORD_BCRYPT);
// echo $enc_pass;die();

//insarting data into database
$sql = "INSERT INTO `reg_users` (user_name,user_pass)
VALUES ('$user_name','$enc_pass')";

if (mysqli_query($conn,$sql)) {
  my_alert("success","New record created successfully");
} else {
  my_alert("danger","Error while inserting the record");
}

mysqli_close($conn);


}
?>



<div class="container bg-dark">
<div class="card" id="my-card">
  <div class="card-header bg-primary text-white text-center">
    Register User
    </div>
  <div class="card-body">
    <div class="row">
        <div class="col-12">
            <link rel="stylesheet" href="./CSS/style.css">
            <form action="" method="POST">
            <div class="mb-3">
            <label for="" class="form-label">User Name</label>
            <input type="text" name="user_name" class="form-control" required>
            </div>
            <div class="mb-3">
            <label for="" class="form-label">User Password</label>
            <input type="password" name="user_pass" class="form-control" required>
            </div>
            <div class="mb-3">
            <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
            </div>
            </form>
        </div>
</div>
<a href="login_user.php">Already have an account?!Go to the login page</a>
  </div>
</div>
</div>











<?php
include("./includes/footer.php");
?>