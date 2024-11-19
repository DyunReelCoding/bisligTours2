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
									<button type="button" onclick="generateCustomerInputs()">Confirm</button>
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
								</div>
								<br>
								<div class="accordion" id="accordionExample">
									<!-- Parking Spot Selection -->
									<div class="accordion-item">
										<label class="inputLabel">Select Parking Spot <span style="font-size: 0.9em; color: #777;">(Optional)</span></label>
										<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
											<div class="accordion-body">
												<select name="parking" class="form-control">
													<option value="">None</option> <!-- No parking spot selected -->
													<option value="1">Grand Ocean Resort</option>
													<option value="2">Mountain View Inn</option>
													<option value="3">Lakeside Retreat</option>
													<option value="4">City Center Hotel</option>
													<option value="5">Sunset Paradise Resort</option>
												</select>
											</div>
										</div>
									</div>
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
			function updateHotelPrice() {
				const hotelSelect = document.getElementById("hotelSelect");
				const selectedOption = hotelSelect.options[hotelSelect.selectedIndex];

				// If the placeholder is selected, return early
				if (selectedOption.value === "") {
					return; // Do not update the hotel price if no hotel is selected
				}

				const hotelPrice = parseFloat(selectedOption.getAttribute("data-price"));

				// Set hidden fields for hotel ID and price
				document.getElementById("selectedHotelId").value = selectedOption.value;
				document.getElementById("selectedHotelPrice").value = hotelPrice.toFixed(2);

				// Update grand total calculation
				const numCustomers = parseInt(document.getElementById("numCustomers").value);
				const packagePrice = parseFloat(document.getElementById("packagePrice").value); // Get package price

				// Calculate the total price with fixed hotel cost
				const grandTotal = (packagePrice * numCustomers) + hotelPrice; // Hotel price is added only once
				document.getElementById("grandTotal").innerText = "PESO " + grandTotal.toFixed(2);
			}

			function generateCustomerInputs() {
				const container = document.getElementById("customerInputs");
				const numCustomers = parseInt(document.getElementById("numCustomers").value);
				const packagePrice = parseFloat(document.getElementById("packagePrice").value); // Get package price
				const hotelSelect = document.getElementById("hotelSelect");
				const selectedOption = hotelSelect.options[hotelSelect.selectedIndex];

				// If no hotel is selected, hotelPrice should be 0
				const hotelPrice = selectedOption.value === "" ? 0 : parseFloat(selectedOption.getAttribute("data-price"));

				// Clear previous inputs
				container.innerHTML = "";

				if (isNaN(numCustomers) || numCustomers <= 0) {
					alert("Please enter a valid number of customers.");
					return;
				}

				// Create customer inputs dynamically
				for (let i = 1; i <= numCustomers; i++) {
					const inputDiv = document.createElement("div");
					inputDiv.className = "customer-input";
					inputDiv.innerHTML =
						`<label>Customer ${i} Name</label>
						<input type="text" name="customer${i}Name" placeholder="Enter name of customer ${i}" required="">`;
					container.appendChild(inputDiv);
				}

				// Calculate and update grand total
				const grandTotal = (packagePrice * numCustomers) + hotelPrice; // Hotel price is added only once
				document.getElementById("grandTotal").innerText = "PESO " + grandTotal.toFixed(2);
			}
		</script>


</body>
<script>
	function validateForm() {
		// Check if the Confirm button was clicked and fields were generated
		const confirmButton = document.querySelector('button[onclick="generateCustomerInputs()"]');
		const customerFieldsGenerated = document.querySelector('input[name="customer1Name"]'); // Replace with a representative field

		if (confirmButton && !customerFieldsGenerated) {
			alert("Please click the Confirm button to generate customer fields.");
			return false;
		}

		// Validate the number of customers
		const numCustomers = parseInt(document.getElementById("numCustomers").value);
		if (isNaN(numCustomers) || numCustomers <= 0) {
			alert("Please confirm the number of customers.");
			return false;
		}

		// Validate customer name inputs
		for (let i = 1; i <= numCustomers; i++) {
			const customerInput = document.querySelector(`input[name="customer${i}Name"]`);
			if (!customerInput || customerInput.value.trim() === "") {
				alert(`Please fill out the name for Customer ${i}.`);
				return false;
			}
		}

		// Confirm hotel selection is properly populated
		const hotelSelect = document.getElementById("hotelSelect");
		const selectedOption = hotelSelect.options[hotelSelect.selectedIndex];
		const selectedHotelId = selectedOption.value;
		const selectedHotelPrice = selectedOption.getAttribute("data-price");

		document.getElementById("selectedHotelId").value = selectedHotelId || "";
		document.getElementById("selectedHotelPrice").value = selectedHotelPrice || "0";

		return true; // All checks passed
	}
</script>

<!-- Add to the `<script>` section in your HTML -->
<script>
	document.addEventListener("DOMContentLoaded", () => {
		const packagePrice = parseFloat(document.getElementById('packagePrice').value);
		const grandTotalElement = document.getElementById('grandTotal');
		const hotelSelect = document.getElementById('hotelSelect');
		const parkingSelect = document.querySelector('select[name="parking"]');

		const parkingSpotPrice = 500; // Fixed price for parking spot

		// Function to calculate and update the grand total
		function updateGrandTotal() {
			const selectedHotelOption = hotelSelect.options[hotelSelect.selectedIndex];
			const hotelPrice = selectedHotelOption.dataset.price ? parseFloat(selectedHotelOption.dataset.price) : 0;

			const parkingSelected = parkingSelect.value !== ""; // Check if a parking spot is selected
			const parkingPrice = parkingSelected ? parkingSpotPrice : 0;

			const grandTotal = packagePrice + hotelPrice + parkingPrice;
			grandTotalElement.textContent = `PESO ${grandTotal.toFixed(2)}`;
		}

		// Add event listeners to update the total dynamically
		hotelSelect.addEventListener('change', updateGrandTotal);
		parkingSelect.addEventListener('change', updateGrandTotal);
	});
</script>




</html>