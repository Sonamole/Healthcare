<?php
include("../../Includes/config.php");
if (isset($_POST['signin'])) {
    $name=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $staff='staff';
    $address=$_POST['address'];
    $qualification=$_POST['qualification'];
    $zip=$_POST['zip'];

    $sql1="insert into `login`(`name`,`email`,`password`,`category`)
    values('$name','$email','$password','$staff')";
    $result=mysqli_query($conn,$sql1);

    if($result)
    {
        $login_id = mysqli_insert_id($conn);
        $sql1="insert into `staff`(`login_id`,`name`,`email`,`password`,`address`,`qualification`,`zip`)
        values('$login_id','$name','$email','$password', '$address', '$qualification', '$zip')";
        $res=mysqli_query($conn,$sql1);


        header('location:../staff-data.php');
    }
    else
    {

    echo "error".$sql."<br>".mysqli_error($conn);
    }
}
?>

