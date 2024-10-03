<?php
error_reporting(0);
if ($conn = mysqli_connect("localhost","root","","cc")){
    echo "*Success";
}else{
    echo 'Failed';
}



if(isset($_GET['eid'])){
    $get_id=  $_GET['eid'];
   $sql = "SELECT * FROM c_user WHERE id='$get_id'";
   $query= mysqli_query($conn,$sql);
   $row = mysqli_fetch_assoc($query);
   $dname = $row['name'];
   $demail = $row['email'];
   $dpassword = $row['password'];

   //echo "$dname $demail $dpassword";

}

//inserting part

if(isset($_POST['submit'])){
    $uname = $_POST['name'];
    $uemail = $_POST['email'];
    $upassword = $_POST['password'];
if(empty($_GET['eid'])){
    if(!empty($uname) && !empty($uemail) && !empty($upassword)){

        $insert = "INSERT INTO `c_user`(`name`,`email`,`password`) VALUES ('$uname','$uemail','$upassword')";
        if(mysqli_query($conn,$insert)){
            echo "*Data Insert";
        }else{
            echo "*Data not Inserted";
        }

    }else{
        echo "*All filed are required";
    }
}else{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sqlup = "UPDATE `c_user` SET `name`='$name',`email`='$email',`password`='$password' WHERE `id`='$get_id'";
    $result = mysqli_query($conn,$sqlup);
    if($result){
        header("location:regi.php");
    }else{
        echo "Insertion not successfull";
    }
}
}

//delete data
if(!empty($_GET['did'])){
    $deleteid = $_GET['did'];
    $sql= "DELETE FROM `c_user` WHERE `id`='$deleteid'";
    if(mysqli_query($conn,$sql)===TRUE){
       echo "<script>
       alert('delete successful ! Ok press to continue');
       window.location.href='regi.php';
       </script>";
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registation Form</title>
</head>
<body>
    <form action="" method="POST">
        <label>Username:</label>
        <input type="text" name="name" value="<?php echo $dname; ?>"><br><br>
        <label>Email:</lavel>
        <input type="email" name="email" value="<?php echo $demail; ?>"><br><br>
        <label>Password:</label>
        <input type="password" name="password" value="<?php echo $dpassword; ?>"><br><br>
        <input type="submit" name="submit" value="<?php if(empty($dname && $demail && $dpassword)){echo "Submit";}else{echo "Update";} ?>">
    </form>

</body>
</html>


<?php
//view part
$select = "SELECT * FROM `c_user`";
$query = mysqli_query($conn,$select);
?>
 <table border='2px'>
 <tr>
 <th>Id</th>
<th>Name</th>
<th>Email</th>
<th>Password</th>
<th>Operation</th>
</tr>
<?php
$i=1;
while($data = mysqli_fetch_assoc($query)){?>
 <tr>
 <td><?php echo $i;?></td>

<td><?php echo $data['name'];?></td>
<td><?php echo $data['email'];?></td>
<td><?php echo $data['password'];?></td>
<td><a href="regi.php?eid=<?php echo $data['id']; ?>">Edit</a>
    <a href="regi.php?did=<?php echo $data['id']; ?>"> Delete</a></td>
</tr>
<?php
$i=$i+1;
}
?>


