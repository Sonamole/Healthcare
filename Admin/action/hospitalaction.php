<?php
include("../../Includes/config.php");
if (isset($_POST['signin'])) {
    $hospital_name=$_POST['hospitalname'];
    $hospital_place=$_POST['place'];
    $hospital_location=$_POST['location'];
    if($_POST['hid']!=null) {
        $hid=$_POST['hid'];

     $updtq="UPDATE `hospital` set  `name`='$hospital_name', `place` ='$hospital_place' ,`location`='$hospital_location'  WHERE  `id`='$hid'";

     $results=mysqli_query($conn,$updtq);


    if($results)
    {

        echo "<script>alert('Updated successfully')</script>";
    }

header('location:../hospital-data.php');

    }

else{



    $sql="insert into `hospital`(`name`,`place`,`location`)
    values('$hospital_name','$hospital_place', '$hospital_location')";
    $result=mysqli_query($conn,$sql);

    if($result)
    {
        header('location:../hospital-data.php');
    }
    else
    {

    echo "error".$sql."<br>".mysqli_error($conn);
    }
}
}
?>

