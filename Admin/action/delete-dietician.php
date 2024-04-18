<?php
include('../../Includes/config.php');
$id=$_GET['id'];


$place="SELECT * FROM `dietician` WHERE `id`='$id'";
$result = mysqli_query($conn, $place);
$row = mysqli_fetch_assoc($result);
$login_id = $row['login_id'];


$sql="DELETE FROM `dietician` WHERE `id`='$id'";
$res=mysqli_query($conn,$sql);
if($res)
{


$sql2="DELETE FROM `login` WHERE `id`='$login_id'";
$res2=mysqli_query($conn,$sql2);
    header("location:../dietician-data.php");
}


else{
    echo "error".$sql1."<br>".mysqli_error($conn);
}
?>