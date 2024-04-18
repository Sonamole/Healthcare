<?php
include("../../Includes/config.php");
if (isset($_POST['signin'])) {
    $name=$_POST['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $dietician='Dietician';
    $address=$_POST['address'];
    $qualification=$_POST['qualification'];
    $zip=$_POST['zip'];

    $place="SELECT * FROM `dietician`";
    $result = mysqli_query($conn, $place);
    $row = mysqli_fetch_assoc($result);
    $login_id = $row['login_id'];

    if($_POST['hid']!=null) {
        $hid=$_POST['hid'];

     $updtq="UPDATE `dietician` set  `name`='$name', `email` ='$email', `password` ='$password', `address` ='$address', `qualification` ='$qualification',
     `zip` ='$zip' WHERE  `id`='$hid'";
     $results=mysqli_query($conn,$updtq);

    if($results)

    {

     $updtq2="UPDATE `login` set  `name`='$name', `email` ='$email', `category` ='$staff' WHERE  `id`='$login_id'";
     $results2=mysqli_query($conn,$updtq2);


        header('location:../dietician-data.php');
    }

    }

   else{ $sql1="insert into `login`(`name`,`email`,`password`,`category`)
    values('$name','$email','$password','$dietician')";
    $result=mysqli_query($conn,$sql1);

    if($result)
    {
        $login_id = mysqli_insert_id($conn);
        $sql2="insert into `dietician`(`login_id`,`name`,`email`,`password`,`address`,`qualification`,`zip`)
        values('$login_id','$name','$email','$password', '$address', '$qualification', '$zip')";
        $res=mysqli_query($conn,$sql2);


        header('location:../dietician-data.php');
    }
    else
    {

    echo "error".$sql."<br>".mysqli_error($conn);
    }
}
}
?>

