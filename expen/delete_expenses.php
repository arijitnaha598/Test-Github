<?php
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");

if(!empty($_GET["del_expense_id"])){
    $del_expense_id= $_GET["del_expense_id"];

    // $del_select = "SELECT * FROM `reg_users` WHERE `reg_id`='$delete_id'";
    // print_r($select);die();
    // $qui = mysqli_query($conn, $del_select);
    // $del_result = mysqli_fetch_assoc($qui);

    $del_query ="DELETE FROM `expense_info` WHERE `item_id`='$del_expense_id'";
    $run_del_query = mysqli_query($conn,$del_query);

    if($run_del_query){
        // my_alert("success","user deleted successfully");
        header("location: all_expenses.php");
    }else{
        my_alert("danger","something went wrong while deleting the user");
    }

    mysqli_close($conn);
}
?>







<?php
include("./includes/footer.php");
?>