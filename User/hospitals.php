<!DOCTYPE html>
<html lang="zxx" class="no-js">

<head>
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="CodePixar">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title>Healthcare</title>

	<!--
            CSS
            ============================================= -->
	<link rel="stylesheet" href="css/linearicons.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/themify-icons.css">
	<link rel="stylesheet" href="css/nice-select.css">
	<link rel="stylesheet" href="css/nouislider.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/main.css">

	<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<style>
	.select2-container .select2-selection--single{
    height:34px !important;

}
.select2-container--default .select2-selection--single{
         border: 1px solid #ccc !important;
     border-radius: 0px !important;
}

	</style>

</head>

<body id="category">

<?php include "header.php" ?>
	<!-- Start Banner Area -->
	<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Hospitals List</h1>
					<nav class="d-flex align-items-center">
						<a href="">Home<span class="lnr lnr-arrow-right"></span></a>
						<!-- <a href="#">choose<span class="lnr lnr-arrow-right"></span></a> -->
						<a href="">Hospitals</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container">
		<div class="row">

			<!-- <div class="col-xl-9 col-lg-8 col-md-7"> -->
				<div class="col-md-12">

				<div class="filter-bar">
					<label style="color:black;font-size:medium;font-weight:bold;paddin-left:20px;">Choose location:</label>
					<div class="sorting">

						<!-- <form class="col-md-6"> -->

							<select class="form-control select2" id="cityInputs" name="location"  onchange="storeLocation(this.value)">
							<?php
    include("../Includes/config.php");

     $place="SELECT * FROM `hospital`";
     $place_run=mysqli_query($conn,$place);

             if(mysqli_num_rows($place_run))
             {
             while ($row=mysqli_fetch_assoc($place_run))
              {
							echo"<option  value='{$row["Location"]}'> {$row["Location"]}</option>";
						}
					} else {

						echo "<tr><td colspan='7'>No records found</td></tr>";
					}
					?>

							</select>
						<!-- </form> -->
					</div>

				</div>
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->
				<section class="lattest-product-area pb-40 category-list">
					<div class="row">

						<div >
							<div class="single-product">
								<div class="product-details">
									<div class="col-md-12">

									<div id="hospitalList"></div>
								<?php
    include("../Includes/config.php");

     $place="SELECT * FROM `hospital`";
     $place_run=mysqli_query($conn,$place);

             if(mysqli_num_rows($place_run))
             {
             while ($row=mysqli_fetch_assoc($place_run))
              {
				echo "<h6>{$row["name"]}</h6>";
				echo "<h6>{$row["place"]}</h6>";
				echo "<h6 >{$row["Location"]}</h6>";
				echo "<br>";
				echo "<br>";
				}
						} else {

							echo "<tr><td colspan='7'>No records found</td></tr>";
						}
						?>

					</div>
								</div>

							</div>
						</div>

					</div>
				</section>
			</div>
		</div>
	</div>



	<!-- start footer Area -->
	<?php include "footer.php" ?>
	<!-- End footer Area -->


	<script>
		$('.select2').select2();
	</script>

<script>
function  storeLocation(location) {
    $.ajax({
        type: 'POST',
        url: 'action/get_hospitals.php',
        data: { location: location },
        success: function(data) {
            $('#hospitalList').html(data);
        }
    });
}
</script>
<!-- <script>
function storeLocation(Location) {
    // You can now use the Location variable to store the selected location ID
    console.log("Selected Location ID: " + Location);

}
</script> -->
	<script src="js/vendor/jquery-2.2.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
	 crossorigin="anonymous"></script>
	<script src="js/vendor/bootstrap.min.js"></script>
	<script src="js/jquery.ajaxchimp.min.js"></script>
	<script src="js/jquery.nice-select.min.js"></script>
	<script src="js/jquery.sticky.js"></script>
	<script src="js/nouislider.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<!--gmaps Js-->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
	<script src="js/gmaps.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>