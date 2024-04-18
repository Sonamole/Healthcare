<?php
include('../../Includes/config.php');
$id=$_GET['id'];
$sql="DELETE FROM `caretaker` WHERE `id`='$id'";
$res=mysqli_query($conn,$sql);
if($res)
{
    header("location:../caretaker-data.php");
}
else{
    echo "error".$sql1."<br>".mysqli_error($conn);
}
?>