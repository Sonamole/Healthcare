<?php
include("../../Includes/config.php");
include("../../Includes/session.php");
if (isset($_POST['signin'])) {
    $message=$_POST['message'];
    $type='dietician_to_user';
    $dietician_id=$Uid;


    $query="SELECT *  FROM `medical_report` WHERE `dietician_id`='$dietician_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $user_id = $row['user_id'];


    $sql="insert into `diet`(`user_id`,`message`,`dietician_id`,`type`)
    values('$user_id','$message','$dietician_id','$type')";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        header('location:../index.php');
    }
    else
    {

    echo "error".$sql."<br>".mysqli_error($conn);
    }
}
?>

