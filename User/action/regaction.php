<?php
include("../../Includes/config.php");
if (isset($_POST['signin'])) {
    $name=$_POST['username'];
    $email=$_POST['email'];
    $category='user';
    $password=$_POST['password'];

    $sql="insert into `login`(`name`,`email`,`category`,`password`)
    values('$name','$email', '$category','$password')";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        header('location:../../index.php');
    }
    else
    {

    echo "error".$sql."<br>".mysqli_error($conn);
    }
}
?>

