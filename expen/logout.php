<?php
session_start();

// session_unset();
// session_destroy();

// //to show notification danger
// $_SESSION['message'] = "Logout Successfull";
// $_SESSION['color'] = "danger";

// header("location: login_user.php");
// exit;

if(isset($_SESSION['is_login'])){
    unset($_SESSION['is_login']);
    // //to show notification danger
    $_SESSION['message'] = "Logout Successfully";
    $_SESSION['color'] = "danger";
}
header("location: login_user.php");

?>