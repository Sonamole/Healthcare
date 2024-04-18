<?php
$value=$_GET['item'];
include("../../Includes/config.php");
$rate_qry="SELECT rate FROM `medicine` WHERE `id`=$value";
$rate_of=mysqli_query($conn,$rate_qry);
$rate_arr=mysqli_fetch_array($rate_of);
echo $rate_arr['rate'];

?>