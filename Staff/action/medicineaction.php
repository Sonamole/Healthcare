<?php
include("../../Includes/config.php");
include("../../Includes/session.php");
if (isset($_POST['signin'])) {
    $medicinename=$_POST['medicinename'];
    $rate=$_POST['rate'];
    $stock=$_POST['stock'];
    $brand=$_POST['brand'];
    $staff_id=$Uid;


    $ImagePath="../image/";

    if($_POST['hid']!=null) {
        $hid=$_POST['hid'];

     $updtq="UPDATE `medicine` set  `name`='$medicinename', `rate` ='$rate' ,`stock`='$stock',`brand`='$brand'  WHERE  `id`='$hid'";

     $results=mysqli_query($conn,$updtq);


    if($results)
    {

        echo "<script>alert('Updated successfully')</script>";
    }

header('location:../medicine-data.php');

    }


if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $ImagePath .= basename($_FILES['file']['name']);
    if (move_uploaded_file($_FILES['file']['tmp_name'], $ImagePath)) {

        $sql1="insert into `medicine`(`name`,`rate`,`file`,`stock`,`brand`,`staff_id`)
        values('$medicinename','$rate','$ImagePath','$stock','$brand','$staff_id')";
        $result=mysqli_query($conn,$sql1);
        if($result){



            header('location:../medicine-data.php');

        }
        else{
            echo "error".$sql."<br>".mysqli_error($conn);
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
} else {
    echo "File upload error: " . $_FILES['file']['error'];
   }
}
?>

