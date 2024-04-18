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
        $u_place="";
        $u_location="";



    $id=$_GET['up_id'];
    $sql="SELECT * from `hospital` WHERE `id`='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);
    if($row){


        $u_name=$row['name'];
        $u_place=$row['place'];
        $u_location=$row['Location'];


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
      <h1>Add Hospital</h1>
      <nav>
      <a href="hospital-data.php"> <button class="btn btn-primary">View hospital data</button></a>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Add Hospitals</h5>

              <!-- Floating Labels Form -->
              <form class="row g-3" method="post" action="action/hospitalaction.php">
              <input type="hidden" name="hid" value="<?php echo isset($_GET['up_id']) ?  $_GET['up_id'] : null ?>" >
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="hospitalname" placeholder="Hospital name"
                    required value="<?php echo isset($u_name) ?  $u_name: "" ?>">
                    <label for="floatingName">Hospital name</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" id="floatingName" name="place" placeholder="Hospital Location"
                    required value="<?php echo isset($u_place) ?  $u_place: "" ?>">
                    <label for="floatingName">Hospital Place</label>
                  </div>
                </div>

                <div class="col-md-12">
                  <div class="form-floating mb-3">

  <select id="cityInput"class="form-control" name="location" onchange="getCity()" value="<?php echo isset($u_location) ?  $u_location: "" ?>">
    <option value="" >Select a Location</option>
  </select>

                  </div>
                </div>

                <div class="text-center">
                  <button type="submit" name="signin" class="btn btn-primary">Submit</button>
                  <!-- <button type="reset" class="btn btn-secondary">Reset</button> -->
                </div>
              </form><!-- End floating Labels Form -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  < 

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
  <script>



function getCity() {
  const selectedCity = document.getElementById('cityInput').value;
  if (selectedCity === '') {
    return;
  }
  alert(`You selected: ${selectedCity}`);
}
fetch('https://countriesnow.space/api/v0.1/countries/state/cities', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json'
  },
  body: JSON.stringify({
    "country": "India",
    "state": "Kerala"
  })
})
.then(response => response.json())
.then(data => {
  const cities = data.data;
  const cityInput = document.getElementById('cityInput');
  cities.forEach(city => {
    const option = document.createElement('option');
    option.textContent = city;
    option.value = city;
    cityInput.appendChild(option);
  });
})
.catch(error => console.log(error));

</script>
</body>

</html>