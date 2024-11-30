<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (isset($_POST['submit2'])) {
	$pid = intval($_GET['pkgid']);
	$useremail = $_SESSION['login'];
	$fromdate = $_POST['fromdate'];
	$todate = $_POST['todate'];
	$comment = $_POST['comment'];
	$hotelId = $_POST['hotelId'];  // Capture the selected hotel ID
	$hotelPrice = $_POST['hotelPrice'];  // Capture the selected hotel price
	$status = 0;

	// Prepare the SQL query to insert booking details
	$sql = "INSERT INTO tblbooking(PackageId, UserEmail, FromDate, ToDate, Comment, HotelId, HotelPrice, status) 
            VALUES(:pid, :useremail, :fromdate, :todate, :comment, :hotelId, :hotelPrice, :status)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':pid', $pid, PDO::PARAM_STR);
	$query->bindParam(':useremail', $useremail, PDO::PARAM_STR);
	$query->bindParam(':fromdate', $fromdate, PDO::PARAM_STR);
	$query->bindParam(':todate', $todate, PDO::PARAM_STR);
	$query->bindParam(':comment', $comment, PDO::PARAM_STR);
	$query->bindParam(':hotelId', $hotelId, PDO::PARAM_INT);
	$query->bindParam(':hotelPrice', $hotelPrice, PDO::PARAM_STR);
	$query->bindParam(':status', $status, PDO::PARAM_STR);
	$query->execute();

	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		$msg = "Booked Successfully";
	} else {
		$error = "Something went wrong. Please try again";
	}
}

?>
<!DOCTYPE HTML>
<html>

<head>
	<title>BISLIG TOURS | Package Details</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/custom3.css" rel='stylesheet' type='text/css' />
	<link href="css/package.css" rel='stylesheet' type='text/css' />
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom Theme files -->
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--animate-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<script src="js/package-details.js"></script>
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script>
		new WOW().init();
	</script>
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function() {
			$("#datepicker,#datepicker1").datepicker();
		});
	</script>
	<style>
		.errorWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #dd3d36;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}

		.succWrap {
			padding: 10px;
			margin: 0 0 20px 0;
			background: #fff;
			border-left: 4px solid #5cb85c;
			-webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
			box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
		}
	</style>
</head>

<body>
	<!-- top-header -->
	<?php include('includes/header.php'); ?>

	<?php if ($msg) : ?>
		<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="successModalLabel">Success</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<?php echo htmlentities($msg); ?>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function() {
				$('#successModal').modal('show');
			});
		</script>
	<?php endif; ?>

	<!--- /banner ---->
	<!--- selectroom ---->
	<div class="selectroom">
		<div class="container">
			<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
			<?php
			$pid = intval($_GET['pkgid']);
			$sql = "SELECT * from tbltourpackages where PackageId=:pid";
			$query = $dbh->prepare($sql);
			$query->bindParam(':pid', $pid, PDO::PARAM_STR);
			$query->execute();
			$results = $query->fetchAll(PDO::FETCH_OBJ);
			$cnt = 1;
			if ($query->rowCount() > 0) {
				foreach ($results as $result) {	?>

					<form name="book" method="post" onsubmit="return validateForm()">

						<div class="selectroom_top">
							<div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
								<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" class="img-responsive" alt="">
							</div>
							<div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
								<h2><?php echo htmlentities($result->PackageName); ?></h2>
								<p class="dow">#PKG-<?php echo htmlentities($result->PackageId); ?></p>
								<p><b>Package Type :</b> <?php echo htmlentities($result->PackageType); ?></p>
								<p><b>Package Location :</b> <?php echo htmlentities($result->PackageLocation); ?></p>
								<p><b>Features :</b> <?php echo htmlentities($result->PackageFetures); ?></p>
								<div class="ban-bottom">
									<div class="bnr-right">
										<label class="inputLabel">From</label>
										<input class="date" id="datepicker" type="text" placeholder="dd-mm-yyyy" name="fromdate" required="">
									</div>
									<div class="bnr-right">
										<label class="inputLabel">To</label>
										<input class="date" id="datepicker1" type="text" placeholder="dd-mm-yyyy" name="todate" required="">
									</div>
								</div>
								<div class="bnr-right">
									<br>
									<label class="inputLabel">Number of Customers</label>
									<input type="number" id="numCustomers" placeholder="Enter number of customers" min="1" required="">
									<button type="button" onclick="generateCustomerInputs()" style="display: none;">Confirm</button>
								</div>
								<div class="clearfix"></div>
								<br>
								<div id="customerInputs"></div>
								<br>
								<div class="accordion" id="accordionExample">
									<!-- Hotel Selection Accordion -->
									<div class="accordion-item">
										<?php
										// Fetch the hotels from the database
										$sql = "SELECT * FROM tblhotels";
										$query = $dbh->prepare($sql);
										$query->execute();
										$hotels = $query->fetchAll(PDO::FETCH_OBJ);
										?>
										<label class="inputLabel">Select Hotel <span style="font-size: 0.9em; color: #777;">(Optional)</span></label>
										<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<select name="hotel" class="form-control" id="hotelSelect" onchange="updateHotelPrice()">
													<option value="">None</option>
													<option value="" disabled selected>Select a Hotel</option> <!-- Placeholder option -->
													<?php foreach ($hotels as $hotel): ?>
														<option value="<?php echo htmlentities($hotel->HotelId); ?>" data-price="<?php echo htmlentities($hotel->Price); ?>">
															<?php echo htmlentities($hotel->HotelName); ?>
														</option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
									<p id="hotelPrice" style="margin-top: 10px; font-weight: bold;">Selected Hotel Price: -</p>
								</div>
								<br>
								<div class="accordion" id="accordionExample">
									<!-- Parking Spot Selection -->
									<div class="accordion-item">
										<label class="inputLabel">Select Parking Spot <span style="font-size: 0.9em; color: #777;">(Optional)</span></label>
										<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<select name="parking" class="form-control" id="parkingSelect" onchange="updateParkingPrice()">
													<option value="">None</option> <!-- No parking spot selected -->
													<option value="1" data-price="100.00">Grand Ocean Resort</option>
													<option value="2" data-price="150.50">Mountain View Inn</option>
													<option value="3" data-price="180.00">Lakeside Retreat</option>
													<option value="4" data-price="220.00">City Center Hotel</option>
													<option value="5" data-price="250.00">Sunset Paradise Resort</option>
												</select>
											</div>
										</div>
									</div>
									<p id="parkingPrice" style="margin-top: 10px; font-weight: bold;">Selected Parking Price: -</p>
								</div>

								<div class="grand">
									<input type="hidden" id="packagePrice" value="<?php echo htmlentities($result->PackagePrice); ?>">
									<p>Grand Total</p>
									<h3 id="grandTotal">PESO 0.00</h3> <!-- This will be updated dynamically -->
								</div>
							</div>
							<input type="hidden" id="selectedHotelId" name="hotelId" value="">
							<input type="hidden" id="selectedHotelPrice" name="hotelPrice" value="">
							<h3>Package Details</h3>
							<p style="padding-top: 1%"><?php echo htmlentities($result->PackageDetails); ?> </p>
							<div class="clearfix"></div>
						</div>
						<div class="selectroom_top">
							<h2>Travels</h2>
							<div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
								<ul>
									<li class="spe">
										<label class="inputLabel">Comment</label>
										<input class="special" type="text" name="comment">
									</li>
									<?php if ($_SESSION['login']) { ?>
										<li class="spe" align="center">
											<button type="submit" name="submit2" class="btn-primary btn">Book</button>
										</li>
									<?php } else { ?>
										<li class="sigi" align="center" style="margin-top: 1%">
											<a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn"> Book</a>
										</li>
									<?php } ?>
									<div class="clearfix"></div>
								</ul>
							</div>
						</div>
					</form>
			<?php }
			} ?>

		</div>
	</div>
	<!--- /selectroom ---->
	<<!--- /footer-top ---->
		<?php include('includes/footer.php'); ?>
		<!-- signup -->
		<?php include('includes/signup.php'); ?>
		<!-- //signu -->
		<!-- signin -->
		<?php include('includes/signin.php'); ?>
		<!-- //signin -->
		<!-- write us -->
		<?php include('includes/write-us.php'); ?>

		<script>
			document.addEventListener("DOMContentLoaded", () => {
				const packagePriceElement = document.getElementById('packagePrice');
				const grandTotalElement = document.getElementById('grandTotal');
				const hotelSelect = document.getElementById('hotelSelect');
				const parkingSelect = document.querySelector('select[name="parking"]');
				const numCustomersInput = document.getElementById('numCustomers');
				const customerInputsContainer = document.getElementById('customerInputs');

				// Function to update the hotel price
				function updateHotelPrice() {
					const selectedOption = hotelSelect.options[hotelSelect.selectedIndex];
					const hotelPrice = selectedOption.dataset.price ? parseFloat(selectedOption.dataset.price) : 0;
					document.getElementById('hotelPrice').textContent = `Selected Hotel Price: PESO ${hotelPrice.toFixed(2)}`;
					updateGrandTotal();
				}

				// Function to update the parking price
				function updateParkingPrice() {
					const selectedOption = parkingSelect.options[parkingSelect.selectedIndex];
					const parkingPrice = selectedOption.dataset.price ? parseFloat(selectedOption.dataset.price) : 0;
					document.getElementById('parkingPrice').textContent = `Selected Parking Price: PESO ${parkingPrice.toFixed(2)}`;
					updateGrandTotal();
				}

				// Function to calculate and update the grand total
				function updateGrandTotal() {
					const packagePrice = parseFloat(packagePriceElement.value) || 0;
					const hotelPrice = parseFloat(hotelSelect.options[hotelSelect.selectedIndex].dataset.price) || 0;
					const parkingPrice = parseFloat(parkingSelect.options[parkingSelect.selectedIndex].dataset.price) || 0;
					const numCustomers = parseInt(numCustomersInput.value) || 0;

					const grandTotal = (packagePrice * numCustomers) + hotelPrice + parkingPrice;
					grandTotalElement.textContent = `PESO ${grandTotal.toFixed(2)}`;
				}

				// Function to dynamically generate customer input fields
				function generateCustomerInputs() {
					const numCustomers = parseInt(numCustomersInput.value);
					const packagePrice = parseFloat(packagePriceElement.value) || 0;
					const hotelPrice = parseFloat(hotelSelect.options[hotelSelect.selectedIndex].dataset.price) || 0;

					if (isNaN(numCustomers) || numCustomers <= 0) {
						alert("Please enter a valid number of customers.");
						return;
					}

					// Clear previous inputs
					customerInputsContainer.innerHTML = "";

					// Create input fields for each customer
					for (let i = 1; i <= numCustomers; i++) {
						const inputDiv = document.createElement("div");
						inputDiv.className = "customer-input";
						inputDiv.innerHTML = `
                    <label>Customer ${i} Name</label>
                    <input type="text" name="customer${i}Name" placeholder="Enter name of customer ${i}" required>
                `;
						customerInputsContainer.appendChild(inputDiv);
					}

					// Update the grand total after generating customer inputs
					updateGrandTotal();
				}

				// Function to validate form inputs before submission
				function validateForm() {
					const numCustomers = parseInt(numCustomersInput.value);

					if (isNaN(numCustomers) || numCustomers <= 0) {
						alert("Please confirm the number of customers.");
						return false;
					}

					for (let i = 1; i <= numCustomers; i++) {
						const customerInput = document.querySelector(`input[name="customer${i}Name"]`);
						if (!customerInput || customerInput.value.trim() === "") {
							alert(`Please fill out the name for Customer ${i}.`);
							return false;
						}
					}

					// Validate hotel and parking selections
					const hotelPrice = parseFloat(hotelSelect.options[hotelSelect.selectedIndex].dataset.price) || 0;
					const parkingPrice = parseFloat(parkingSelect.options[parkingSelect.selectedIndex].dataset.price) || 0;

					document.getElementById("selectedHotelId").value = hotelSelect.value || "";
					document.getElementById("selectedHotelPrice").value = hotelPrice.toFixed(2);
					document.getElementById("selectedParkingPrice").value = parkingPrice.toFixed(2);

					return true;
				}

				// Event listeners for dynamic updates
				hotelSelect.addEventListener('change', updateHotelPrice);
				parkingSelect.addEventListener('change', updateParkingPrice);
				numCustomersInput.addEventListener('input', generateCustomerInputs);

				// Initialize total calculation
				updateGrandTotal();
			});
		</script>


</body>









</html>