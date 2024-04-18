<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Dashboard</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
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
  <style>
    .dietician{
        padding:5px;
border-radius:10px;
}

    </style>
</head>

<body>

    <!-- ======= Header ======= -->
    <?php include "navbar.php" ?>
    <!-- ======= Sidebar ======= -->
    <?php include "sidebar.php" ?>
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>User Data</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item">Tables</li>
                    <li class="breadcrumb-item active">Medical reports</li>
                </ol>
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
            <th>Report</th>
            <th>Assign dietician</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include("../Includes/config.php");
        $place = "SELECT medical_report.id, medical_report.report, login.name
        FROM medical_report
        INNER JOIN login  ON medical_report.user_id = login.id";
        $place_run = mysqli_query($conn, $place);

        if (mysqli_num_rows($place_run) > 0) {
            while ($row = mysqli_fetch_assoc($place_run)) {
                $rowId=$row['id'];


        ?>
                <tr data-rowid="<?php echo $row['id']; ?>">

                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['report']; ?></td>
                    <td>
                        <select class="dietician" onchange="assignDietician(this)">
                            <?php
                            $dieticians_query = "SELECT * FROM `login` WHERE `category`='Dietician'";
                            $dieticians_result = mysqli_query($conn, $dieticians_query);

                            if (mysqli_num_rows($dieticians_result) > 0) {
                                while ($dietician_row = mysqli_fetch_assoc($dieticians_result)) {
                            ?>
                            <!-- <option >Choose dietician</option> -->
                                    <option id="dietician" value="<?php echo $dietician_row['id']; ?>"><?php echo $dietician_row['name']; ?></option>
                                <?php
                                }
                            } else {
                                echo "<option value=''>No dieticians available</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "<tr><td colspan='3'>No records found</td></tr>";
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
            <!-- <script>
    function assignDietician(selectElement) {
        var selectedValue = selectElement.value;

        console.log("Selected dietician ID:", selectedValue);

    }
</script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script>
    function assignDietician(selectElement) {
        var selectedValue = selectElement.value;
        var rowId = $(selectElement).closest('tr').data('rowid');
        var data = {
            selectedValue: selectedValue,
            rowId: rowId
        };

        // Send AJAX request
        $.ajax({
            url: 'action/dietician-assign.php',
            type: 'POST',
            data: data,
            success: function(response) {
                // Handle success response
                console.log('Assignment successful:', response);


                // $(selectElement).closest('tr').hide(); //to decide to hide the row after selecting a dietician
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error('Error occurred:', error);
            }
        });
    }
</script>




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