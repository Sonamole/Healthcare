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
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/nouislider.min.css">
    <link rel="stylesheet" href="css/ion.rangeSlider.css" />
    <link rel="stylesheet" href="css/ion.rangeSlider.skinFlat.css" />
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

<?php include "header.php" ?>
    <!-- Start Banner Area -->
    <section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Interation with dietician</h1>
                    <nav class="d-flex align-items-center">
                        <!-- <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Blog</a> -->
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->


    <section class="blog_area single-post-area section_gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
 
                    <div class="comments-area">
                        <h4>Chat</h4>
                        <div class="comment-list">
                            <div class="single-comment justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">

                                    <div class="desc">
                                    <?php
    include("../Includes/config.php");
    //  include("../Includes/session.php");
    $Uid_user=$Uid;
    $place = "SELECT * FROM `diet` WHERE `user_id`='$Uid_user'  AND `type`='dietician_to_user'";
    $place_run = mysqli_query($conn, $place);


             if(mysqli_num_rows($place_run))
             {
             while ($row=mysqli_fetch_assoc($place_run))
              {
                                        echo"<ul>";
                                           echo" <li>";
                                            echo"<p>{$row['message']}</p>";
                                           echo" </li>";
                                        echo"</ul>";
                                    }
                                }
                                ?>
                                    </div>
                                </div>

                            </div>
                        </div>




                    </div>
                    <div class="comment-form">
                        <h4>Ask Question</h4>
                        <form method="post" action="action/diet.php" >

                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                           <button type="submit"  name="signin"class="primary-btn submit_btn">Send</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!--================Blog Area =================-->

    <!-- start footer Area -->
    <?php include "footer.php" ?>
    <!-- End footer Area -->

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