<?php
include("../../Includes/config.php");
include("../../Includes/session.php");

    $address=$_POST['address'];
    $medicines=$_POST['med'];
    $quantities=$_POST['qty'];
    $units=$_POST['unit_prices'];
    $totals=$_POST['total_prices'];
    $total_rate=0;
    $ins="insert into medpurchase_head (`user_id`, `address`) values('$Uid','$address')";
    $result=mysqli_query($conn,$ins);
    $id=mysqli_insert_id($conn);

    foreach ($quantities as $index => $quantity) {

        $medicine = $medicines[$index];
        $unit = $units[$index];
        $total = $totals[$index];
        $ins_1="insert into medpurchase_child  (`head_id`, `purchase_id`) values($id,$medicine)";
        $result_1=mysqli_query($conn,$ins_1);
        $total_rate += $total;
        header('location:../medicinelist.php');

    }

