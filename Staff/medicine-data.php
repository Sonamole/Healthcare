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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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

<body>

    <!-- ======= Header ======= -->

    <?php include "navbar.php" ?>
    <!-- ======= Sidebar ======= -->
    <?php include "sidebar.php" ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Medicine Data</h1>
            <nav>
            <a href="index.php"> <button class="btn btn-success">Add medicine</button></a>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">


                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Rate</th>
                                        <th>Image</th>
                                        <th>Stock</th>
                                        <th>Brand</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
    include("../Includes/config.php");

     $place="SELECT * FROM `medicine` WHERE `staff_id`='$Uid'";
     $place_run=mysqli_query($conn,$place);

             if(mysqli_num_rows($place_run))
             {
             while ($row=mysqli_fetch_assoc($place_run))
              {
                ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['rate']; ?></td>
                                        <td>
                    <?php echo "<img src='" . $row['file'] . "' style='width: 50px; height: 50px;'>"; ?>
                    </td>
                                        <td><?php echo $row['stock']; ?></td>
                                        <td><?php echo $row['brand']; ?></td>
                                        <?php echo "<td><a href='index.php?up_id=" . $row['id'] . "'><button class='btn btn-success'>Edit</button></a></td>"; ?>
                                      <?php  echo'<td ><a href="action/delete-medicine.php?id='.$row['id'].'"><button class="btn btn-success">Delete</button></a> </td>';?>


                                    </tr>
                                    <?php
            }
        } else {

            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        ?>

                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->



    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

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