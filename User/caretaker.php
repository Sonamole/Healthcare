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
					<h1>Caretakers List</h1>
					<nav class="d-flex align-items-center">
						<a href="">Home<span class="lnr lnr-arrow-right"></span></a>
						<!-- <a href="#">choose<span class="lnr lnr-arrow-right"></span></a> -->
						<a href="">Caretaker</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->
	<div class="container" >
		<div class="row">
		<?php
        include("../Includes/config.php");
		// include("../Includes/session.php");

        $place = "SELECT  caretaker.name,caretaker.type
        FROM caretaker
        INNER JOIN login  ON login.caretaker_id = caretaker.id WHERE login.id=$Uid";
        $place_run = mysqli_query($conn, $place);

        if (mysqli_num_rows($place_run) > 0) {
            while ($row = mysqli_fetch_assoc($place_run)) {

				echo"<h4  style='margin-left:300px;'>Your  caretaker is:{$row['name']}-{$row['type']}</h4>";

			}

		}
		else {
echo"No caretaker found";

        }
        ?>

			<!-- <div class="col-xl-9 col-lg-8 col-md-7"> -->
				<!-- <div class="col-md-12">

				<div class="filter-bar">
					<label style="color:black;font-size:medium;font-weight:bold;paddin-left:20px;">Choose caretaker:</label>
					<div class="sorting">

							<select class="form-control select2"  id="type" name="caretaker">
                            <option id="all" value="all">All</option>
							<option id="homenurse" value="homenurse">Homenurse</option>
                            <option id="babysitter" value="babysitter">Babysitter</option>
							</select>

					</div>

				</div> -->
				<!-- End Filter Bar -->
				<!-- Start Best Seller -->

			</div>

		</div>
	</div>
	<div class="col-md-8" id="caretakerList">
	<table class="table datatable" style="margin-left:200px;">
                                <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <!-- <th>password</th> -->
                                        <th>Address</th>
                                        <th>Qualification</th>
                                        <th> Type</th>
                                        <th>Zipcode</th>
                                        <th>choose</th>

                                    </tr>
                                </thead>
                                <tbody >
                                    <?php
    include("../Includes/config.php");
     $place="SELECT * FROM `caretaker` ";
     $place_run=mysqli_query($conn,$place);

             if(mysqli_num_rows($place_run))
             {
             while ($row=mysqli_fetch_assoc($place_run))
              {
                ?>
                                    <tr>
                                        <td><?php echo $row['name']; ?></td>
                                        <td><?php echo $row['email']; ?></td>

                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['qualification']; ?></td>
                                        <td><?php echo $row['type']; ?></td>
                                        <td><?php echo $row['zip']; ?></td>
										<td><input type="checkbox" class="form-control" onclick="handleCheckbox(this, '<?php echo $row['id']; ?>')"></td>
										<!-- <td><input type="checkbox" class="form-control" id="choosecaretaker"><td> -->


                                    </tr>
                                    <?php
            }
        } else {

            echo "<tr><td colspan='7'>No records found</td></tr>";
        }
        ?>

                                </tbody>
                            </table>
	</div>



	<!-- start footer Area -->
	<?php include "footer.php" ?>
	<!-- End footer Area -->

	<!-- Modal Quick Product View -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="container relative">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<div class="product-quick-view">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="quick-view-carousel">
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
								<div class="item" style="background: url(img/organic-food/q1.jpg);">

								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="quick-view-content">
								<div class="top">
									<h3 class="head">Mill Oil 1000W Heater, White</h3>
									<div class="price d-flex align-items-center"><span class="lnr lnr-tag"></span> <span class="ml-10">$149.99</span></div>
									<div class="category">Category: <span>Household</span></div>
									<div class="available">Availibility: <span>In Stock</span></div>
								</div>
								<div class="middle">
									<p class="content">Mill Oil is an innovative oil filled radiator with the most modern technology. If you are
										looking for something that can make your interior look awesome, and at the same time give you the pleasant
										warm feeling during the winter.</p>
									<a href="#" class="view-full">View full Details <span class="lnr lnr-arrow-right"></span></a>
								</div>
								<div class="bottom">
									<div class="color-picker d-flex align-items-center">Color:
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
										<span class="single-pick"></span>
									</div>
									<div class="quantity-container d-flex align-items-center mt-15">
										Quantity:
										<input type="text" class="quantity-amount ml-15" value="1" />
										<div class="arrow-btn d-inline-flex flex-column">
											<button class="increase arrow" type="button" title="Increase Quantity"><span class="lnr lnr-chevron-up"></span></button>
											<button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
										</div>

									</div>
									<div class="d-flex mt-20">
										<a href="#" class="view-btn color-2"><span>Add to Cart</span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-layers"></span></a>
										<a href="#" class="like-btn"><span class="lnr lnr-heart"></span></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script>
    function handleCheckbox(checkbox, id) {
        if (checkbox.checked) {
            // Checkbox is checked, do something with the id
            console.log("Checked row with ID: " + id);
            // Call your function with the id
            yourFunction(id);
        } else {
            // Checkbox is unchecked, handle accordingly if needed
        }
    }

    function yourFunction(id) {
        // Make an AJAX request to store the ID in the 'login' table
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "action/caretaker-selection.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log("ID stored successfully");
            }
        };
        xhr.send("id=" + id);
    }
</script>

	<!-- <script>
    function handleCheckbox(checkbox, id) {
        if (checkbox.checked) {
            // Checkbox is checked, do something with the id
            console.log("Checked row with ID: " + id);
            // Call your function with the id
            yourFunction(id);
        } else {
            // Checkbox is unchecked, handle accordingly if needed
        }
    }

</script> -->
	<!-- <script>
    $(document).ready(function(){
        // When an option is selected
        $('#type').change(function(){
            // Get the selected option's value
            var selectedOption = $(this).val();


            $.ajax({
                url: 'action/caretakerview.php',
                method: 'POST',
                data: { selection: selectedOption },
                success: function(response){

                    var jsonData = JSON.parse(response);


                    var table = '<table class="table" border="1"><tr><th>Name</th><th>Type</th><th>Choose</th></tr>';
                    $.each(jsonData, function(index, item) {
                        table += '<tr><td>' + item.name + '</td><td>' + item.type + '</td><td><input type="checkbox" name="selectedItems[]" value="' + item.id + '"></td></tr>';
                    });
                    table += '</table>';

                    $('#caretakerList').html(table);
                },
                error: function(xhr, status, error){
                    // Handle errors
                    console.error(xhr, status, error);
                }
            });
        });
    });
</script>
 -->




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