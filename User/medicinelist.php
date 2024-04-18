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

	<style>
        .invoice-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .address-section {
            margin-bottom: 20px;
        }
        .item-select {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        .add-btn {
            margin-left: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #F2F2F2;
        }
        .remove-btn {
            background-color: #FF6347;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
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
					<h1>Purchase medicines page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<!-- <a href="#">Medicines<span class="lnr lnr-arrow-right"></span></a> -->
						<a href="medicinelist.php"> Medicines</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->


				<section class="lattest-product-area pb-40 category-list">
				<form id="invoice-form" method="post" action="action/submit-invoice.php">
    <div class="invoice-container">
        <div class="address-section">
            <h2>Address</h2>
            <p>Enter your address here:</p>
            <textarea name="address" rows="4" cols="50"></textarea>
        </div>
        <h2>Medicines</h2>
        <div id="items-container">
            <div class="item-select">
                <select name="items[]">
                    <?php
    include("../Includes/config.php");

     $place="SELECT * FROM `medicine`";
     $place_run=mysqli_query($conn,$place);

             if(mysqli_num_rows($place_run))
             {
             while ($row=mysqli_fetch_assoc($place_run))
              {
				echo"<option value='{$row['id']}'>{$row['name']}</option>";
			  }
			}
			?>

                </select>
                <input type="number" name="quantity[]" min="1" value="1">
                <button type="button" id="add-item-btn" class="add-btn btn btn-warning">Add Item</button>
            </div>
        </div>
        <table id="items-table">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <div id="subtotal"></div>
        <button type="submit" name="signin" class=" btn btn-warning" id="submit-btn">Submit</button>
    </div>
</form>
				</section>





	<!-- start footer Area -->
	<?php include "footer.php" ?>
	<!-- End footer Area -->



	<script>
    document.getElementById('add-item-btn').addEventListener('click', function() {
        var selectElement = document.querySelector('[name="items[]"]');
        var selectedItem = selectElement.options[selectElement.selectedIndex].value;
		var selectedItemText = selectElement.options[selectElement.selectedIndex].text;
        var quantity = document.querySelector('.item-select input[name="quantity[]"]').value;
        var tableBody = document.querySelector('#items-table tbody');
        // AJAX request to fetch unit price
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'action/get_price.php?item=' + selectedItem); // Replace 'get_price.php' with your server-side script
        xhr.onload = function() {
            if (xhr.status === 200) {
                var unitPrice = xhr.responseText;
                var totalPrice = unitPrice * quantity;
                var newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${selectedItemText}</td>
                    <td>${quantity}</td>
                    <td>${unitPrice}</td>
                    <td>${totalPrice}</td>
                    <td><button class="remove-btn">Remove</button>
					<input type="hidden" name="med[]" value="${selectedItem}">
                    <input type="hidden" name="qty[]" value="${quantity}">
                    <input type="hidden" name="unit_prices[]" value="${unitPrice}">
                    <input type="hidden" name="total_prices[]" value="${totalPrice}">
					</td>
                `;
                tableBody.appendChild(newRow);
                updateSubtotal();
            } else {
                console.log('Request failed. Status:', xhr.status);
            }
        };
        xhr.send();
    });
    document.addEventListener('click', function(event) {
        if (event.target && event.target.classList.contains('remove-btn')) {
            var rowToRemove = event.target.closest('tr');
            rowToRemove.parentNode.removeChild(rowToRemove);
            updateSubtotal();
        }
    });
    function updateSubtotal() {
        var totalPrice = 0;
        var rows = document.querySelectorAll('#items-table tbody tr');
        rows.forEach(function(row) {
            var priceCell = row.querySelector('td:nth-child(4)');
            totalPrice += parseFloat(priceCell.textContent || priceCell.innerText);
			'<input type="text" name="total" value="${totalPrice}">'
        });
        document.getElementById('subtotal').innerHTML = '<strong>Subtotal:</strong> ' + totalPrice.toFixed(2);
    }
</script>


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