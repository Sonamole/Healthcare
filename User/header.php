<!-- Start Header Area -->
<header class="header_area sticky-header">
		<div class="main_menu">
			<nav class="navbar navbar-expand-lg navbar-light main_box">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
					<?php
					include("../Includes/session.php");
echo $Uname;
					?>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
						<ul class="nav navbar-nav menu_nav ml-auto">
							<li class="nav-item active"><a class="nav-link" href="home.php">Home</a></li>
							<!-- <li class="nav-item submenu dropdown">
								  <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
								 aria-expanded="false">Purchase medicine</a>
								 <ul class="dropdown-menu">
									 <li class="nav-item"><a class="nav-link" href="medicinelist.php">Shop Category</a></li> -->
									<!-- <li class="nav-item"><a class="nav-link" href="single-product.php">Product Details</a></li>
									<li class="nav-item"><a class="nav-link" href="checkout.php">Product Checkout</a></li>
									<li class="nav-item"><a class="nav-link" href="cart.php">Shopping Cart</a></li>
									<li class="nav-item"><a class="nav-link" href="confirmation.php">Confirmation</a></li>
								</ul>
							</li> -->
							<li class="nav-item"><a class="nav-link" href="medicinelist.php">Purchase Medicine</a></li>
							<li class="nav-item"><a class="nav-link" href="hospitals.php">Hospitals</a></li>
							<li class="nav-item"><a class="nav-link" href="medicalreport.php">Medical report</a></li>
                            <li class="nav-item"><a class="nav-link" href="caretaker.php">Caretaker</a></li>
							<button class="btn btn-warning"><li st ><a style="color:black;height:3px;" href="../Includes/logout.php">Logout</a></li></button>
							<!-- <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li> -->
						</ul>

					</div>
				</div>
			</nav>
		</div>
		<div class="search_input" id="search_input_box">
			<div class="container">
				<form class="d-flex justify-content-between">
					<input type="text" class="form-control" id="search_input" placeholder="Search Here">
					<button type="submit" class="btn"></button>
					<span class="lnr lnr-cross" id="close_search" title="Close Search"></span>
				</form>
			</div>
		</div>
	</header>
	<!-- End Header Area -->