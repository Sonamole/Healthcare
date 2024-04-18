<?php

include("../../Includes/config.php");
include("../../Includes/session.php");
	if (isset($_POST['submit'])) {
$user_id=$Uid;

		if (isset($_FILES['pdf_file']['name']))
		{
		$file_name = $_FILES['pdf_file']['name'];
		$file_tmp = $_FILES['pdf_file']['tmp_name'];

		move_uploaded_file($file_tmp,"../pdf/".$file_name);


        $insertquery ="INSERT INTO `medical_report`(`user_id`,`report`) VALUES('$user_id','$file_name')";
		$iquery = mysqli_query($conn, $insertquery);

		header('location:../medicalreport.php');
		}
		else
		{
		?>
			<div class=
			"alert alert-danger alert-dismissible
			fade show text-center">
			<a class="close" data-dismiss="alert"
				aria-label="close">×</a>
			<strong>Failed!</strong>
				File must be uploaded in PDF format!
			</div>
		<?php
		}
	}
?>
