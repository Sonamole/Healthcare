<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Staff Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.jpeg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Mar 17 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php
include('../Includes/config.php');
    if(isset($_GET['up_id'])){
        $u_name="";
        $u_rate="";
        $u_file="";
        $_brand="";
        $_stock="";



    $id=$_GET['up_id'];
    $sql="SELECT * from `medicine` WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($row){


        $u_name=$row['name'];
        $u_rate=$row['rate'];
        $u_file=$row['file'];
        $u_brand=$row['brand'];
        $u_stock=$row['stock'];


    }

    }

    ?>
<body>

   <!-- ======= Header ======= -->
   <?php include "navbar.php" ?>
  <!-- ======= Sidebar ======= -->
  <?php include "sidebar.php" ?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Layouts</h1>
      <nav>
            <a href="medicine-data.php"> <button class="btn btn-success">View medicines</button></a>
            </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Medicine</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" method="post" action="action/medicineaction.php" enctype="multipart/form-data">
              <input type="hidden" name="hid" value="<?php echo isset($_GET['up_id']) ?  $_GET['up_id'] : null ?>" >
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="medicinename" name="medicinename" placeholder="Medicine name"
                    required value="<?php echo isset($u_name) ?  $u_name: "" ?>">
                    <label for="floatingName">Medicine Name</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="rate" name="rate" placeholder="rate"
                    required value="<?php echo isset($u_rate) ?  $u_rate: "" ?>">
                    <label for="floatingEmail">Rate</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock"
                    required value="<?php echo isset($u_stock) ?  $u_stock: "" ?>">
                    <label for="floatingEmail">Stock</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="brand" id="brand" placeholder="Brand"
                    required value="<?php echo isset($u_brand) ?  $u_brand: "" ?>">
                    <label for="floatingZip">Brand</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                  <!-- <label for="basicpill-firstname-input">Upload Pic:</label> <br> -->
                <input type="file"  class="form-control" name="file" id="file"    value="<?php echo isset($u_file) ?  $u_file: "" ?>">

                </div>
                </div>

                <div class="text-center">
                  <button type="submit" name="signin" class="btn btn-success">Add</button>
                  
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>