<?php
include("./includes/header.php");
include("./includes/function.php");
include("./includes/db_conn.php");

$user_id ='';
// $user_id = $_GET['reg_id'];

if(!empty($_GET["user_id"])){
    $user_id = $_GET["user_id"];
    
    $select = "SELECT * FROM `reg_users` WHERE `reg_id`='$user_id'";
    // print_r($select);die();
    $qu = mysqli_query($conn,$select);
    $res = mysqli_fetch_assoc($qu);

    // $img = $row['user_pic'];
}
if(isset($_POST["submit"])){
    $user_pic = $_FILES["user_pic"];
    

    $img_name = $user_pic["name"];
    $img_tmp_name = $user_pic["tmp_name"];

    //man.jpg
    //['man','jpg']
     $img_extension = explode(".",$img_name);
 
     //1658745224.jpg
     $new_img_name = round(microtime(true)) .".". end($img_extension);
    
    $img_path = "./images/user_image/".$new_img_name;

    $img_upload_result = move_uploaded_file($img_tmp_name,$img_path);
    // echo die ($img_upload_result);
    if($img_upload_result){
        $run_query ="UPDATE `reg_users` SET `user_pic`='$new_img_name' WHERE `reg_id`='$user_id'";

        // print_r($run_query);

       if($run_query_result = mysqli_query($conn,$run_query)){
        echo "image update database";
       }else{
        echo "image ot updated in database";
       }

    }else{
        echo "something went wrong";
    }
}
    //     $run_query = "UPDATE reg_users SET user_pic ='$new_img_name' WHERE reg_id='$user_id'";
    //     $run_query_result = mysqli_query($conn,$run_query);
    //     if($run_query_result){
    //         echo "images name updated successfully in database";
    //     }else{
    //         echo "Error while uploading image in database";
    //     }
    // }

?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-12">
            <h2 class="text-center py-3">Upload Image</h2>
                <form action="" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 mb-3 mx-auto">
                    <input type="file" class="form-control" name="user_pic" required>
                    </div>
                    <div class="col-md-6 mb-3 mx-auto">
                    <button type="submit" class="btn btn-primary w-100" name="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>






<?php
include("./includes/footer.php");
?>