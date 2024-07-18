<?php
//header a session start kora ache r header sob file a include ache tai comment kora 
//  session_start();
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");

if(isset($_SESSION['message']) && isset($_SESSION['color'])){
  echo my_alert($_SESSION['color'],$_SESSION['message']);
  
  unset($_SESSION['color'],$_SESSION['message']);
}

if(isset($_POST["login"])){
  //getting values from html form
$user_name= $_POST["user_name"];
$user_pass= $_POST["user_pass"];

$login_query = "SELECT * FROM `reg_users` WHERE `user_name`='$user_name'";
$result_login_query = mysqli_query($conn,$login_query);

if(mysqli_num_rows($result_login_query) == 1){
    $row = mysqli_fetch_assoc($result_login_query);
    $db_user_name = $row['user_name'];
    $db_user_pass = $row['user_pass'];
    $db_user_pic = $row['user_pic'];

    if(password_verify($user_pass, $db_user_pass)){
        $_SESSION['name'] = $db_user_name;
        $_SESSION['picture'] = $db_user_pic;
        $_SESSION['is_login'] = true;

        //to show notification of success
        //my_alert("success","Login Successfull");
        $_SESSION['message'] = "Login Successfull";
        $_SESSION['color'] = "success";

         header("Location: index.php");
    }else{
        my_alert("danger","Incorrect Password");
    }
}else{
    echo "User Does not exist";
}

mysqli_close($conn);
}
?>



<div class="container">
<div class="card" id="my-card">
  <div class="card-header bg-primary text-white text-center">
    Login Form
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
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            </div>
            </form>
        </div>
</div>
<a href="register_user.php">Create an account?!Go to the Register page</a>
  </div>
</div>
</div>











<?php
include("./includes/footer.php");
?>