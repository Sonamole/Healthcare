<?php
include('../../Includes/config.php');
$id=$_GET['id'];
$sql="DELETE FROM `medicine` WHERE `id`='$id'";
$res=mysqli_query($conn,$sql);
if($res)
{
    header("location:../medicine-data.php");
}
else{
    echo "error".$sql1."<br>".mysqli_error($conn);
}
?>