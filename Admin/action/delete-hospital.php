<?php
include('../../Includes/config.php');
$id=$_GET['id'];
$sql="DELETE FROM `hospital` WHERE `id`='$id'";
$res=mysqli_query($conn,$sql);
if($res)
{
    header("location:../hospital-data.php");
}
else{
    echo "error".$sql1."<br>".mysqli_error($conn);
}
?>