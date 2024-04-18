<?php
include("../../Includes/config.php");
include("../../Includes/session.php");
if (isset($_POST['signin'])) {
    $message=$_POST['message'];
    $type='user_to_dietician';
    $user_id=$Uid;


    $query="SELECT *  FROM `medical_report` WHERE `user_id`='$user_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $dietician_id = $row['dietician_id'];


    $sql="insert into `diet`(`user_id`,`message`,`dietician_id`,`type`)
    values('$user_id','$message','$dietician_id','$type')";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        header('location:../dietician-contact.php');
    }
    else
    {

    echo "error".$sql."<br>".mysqli_error($conn);
    }
}
?>

