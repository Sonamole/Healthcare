<?php
include("../../Includes/config.php");
if (isset($_POST['signin'])) {
    $name=$_POST['username'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $qualification=$_POST['qualification'];
    $type=$_POST['type'];
    $zip=$_POST['zip'];

    if($_POST['hid']!=null) {
        $hid=$_POST['hid'];

     $updtq="UPDATE `caretaker` set  `name`='$name', `email` ='$email', `address` ='$address', `qualification` ='$qualification',
     `type` ='$type', `email` ='$email' WHERE  `id`='$hid'";
     $results=mysqli_query($conn,$updtq);


    if($results)
    {

        echo "<script>alert('Updated successfully')</script>";
    }

header('location:../caretaker-data.php');

    }

else{
    $sql="insert into `caretaker`(`name`,`email`,`address`,`qualification`,`type`,`zip`)
    values('$name','$email', '$address', '$qualification', '$type', '$zip')";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        header('location:../caretaker-data.php');
    }
    else
    {

    echo "error".$sql."<br>".mysqli_error($conn);
    }
}
}
?>

