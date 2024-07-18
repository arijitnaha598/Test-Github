<?php
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");

if(!empty($_GET["delete_id"])){
    $delete_id= $_GET["delete_id"];

    // $del_select = "SELECT * FROM `reg_users` WHERE `reg_id`='$delete_id'";
    // print_r($select);die();
    // $qui = mysqli_query($conn, $del_select);
    // $del_result = mysqli_fetch_assoc($qui);

    $del_query ="DELETE FROM `reg_users` WHERE `reg_id`='$delete_id'";
    $run_del_query = mysqli_query($conn,$del_query);

    if($run_del_query){
        // my_alert("success","user deleted successfully");
        header("location: display_reg_users.php");
    }else{
        my_alert("danger","something went wrong while deleting the user");
    }

    mysqli_close($conn);
}
?>







<?php
include("./includes/footer.php");
?>