<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {
	if (isset($_POST['submit'])) {
		$pname = $_POST['packagename'];
		$ptype = $_POST['packagetype'];
		$plocation = $_POST['packagelocation'];
		$pprice = $_POST['packageprice'];
		$pdetails = $_POST['packagedetails'];
		$pimage = $_FILES["packageimage"]["name"];

		// Combine selected features into a comma-separated string
		$pfeatures = implode(", ", $_POST['packagefeatures']);

		move_uploaded_file($_FILES["packageimage"]["tmp_name"], "pacakgeimages/" . $_FILES["packageimage"]["name"]);
		$sql = "INSERT INTO TblTourPackages(PackageName,PackageType,PackageLocation,PackagePrice,PackageFetures,PackageDetails,PackageImage) VALUES(:pname,:ptype,:plocation,:pprice,:pfeatures,:pdetails,:pimage)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':pname', $pname, PDO::PARAM_STR);
		$query->bindParam(':ptype', $ptype, PDO::PARAM_STR);
		$query->bindParam(':plocation', $plocation, PDO::PARAM_STR);
		$query->bindParam(':pprice', $pprice, PDO::PARAM_STR);
		$query->bindParam(':pfeatures', $pfeatures, PDO::PARAM_STR);
		$query->bindParam(':pdetails', $pdetails, PDO::PARAM_STR);
		$query->bindParam(':pimage', $pimage, PDO::PARAM_STR);
		$query->execute();
		$lastInsertId = $dbh->lastInsertId();
		if ($lastInsertId) {
			$msg = "Package Created Successfully";
		} else {
			$error = "Something went wrong. Please try again";
		}
	}

?>
	<!DOCTYPE HTML>
	<html>

	<head>
		<title>BISLIG TOURS | Admin Package Creation</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
		<script type="application/x-javascript">
			addEventListener("load", function() {
				setTimeout(hideURLbar, 0);
			}, false);

			function hideURLbar() {
				window.scrollTo(0, 1);
			}
		</script>
		<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
		<link href="css/style.css" rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="css/morris.css" type="text/css" />
		<link href="css/font-awesome.css" rel="stylesheet">
		<script src="js/jquery-2.1.4.min.js"></script>
		<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css' />
		<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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

			#packagetype {
				width: 97.5%;
				/* Width of the dropdown */
				height: 40px;
				/* Height of the dropdown */
				margin-left: 10px;
			}

			.checkbox-grid {
				display: grid;
				grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
				/* Adjust column size as needed */
				gap: 5px;
				/* Adjust the spacing between checkboxes */
			}

			.checkbox label {
				display: block;
				font-size: 14px;
				line-height: 1.5;
			}

			/* Style the dropdown */
			.custom-dropdown {
				-webkit-appearance: none;
				/* Remove default dropdown styling in Webkit browsers (Safari, Chrome) */
				-moz-appearance: none;
				/* Remove default dropdown styling in Firefox */
				appearance: none;
				/* Universal appearance reset */
				padding-right: 30px;
				/* Make space for the arrow */
				background-image: url('./images/down.png');
				/* Arrow image */
				background-repeat: no-repeat;
				background-position: right 10px center;
				/* Position the arrow on the right */
				background-size: 20px;
				/* Adjust the size of the arrow */
			}

			/* Optional: Style the select element for better visual appearance */
			.custom-dropdown {
				width: 100%;
				height: 40px;
				font-size: 14px;
				padding: 5px;
				border-radius: 4px;
				border: 1px solid #ccc;
				cursor: pointer;
				/* Change cursor to pointer on hover */
			}

			/* Style the label if needed */
			.form-group label {
				font-weight: bold;
			}
		</style>

	</head>

	<body>
		<div class="page-container">
			<!--/content-inner-->
			<div class="left-content">
				<div class="mother-grid-inner">
					<!--header start here-->
					<?php include('includes/header.php'); ?>

					<div class="clearfix"> </div>
				</div>
				<!--heder end here-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Create Package </li>
				</ol>
				<!--grid-->
				<div class="grid-form">

					<!---->
					<div class="grid-form1">
						<h3>Create Package</h3>
						<?php if ($error) { ?>
							<script>
								// Show the booking success modal after successful booking
								$(document).ready(function() {
									$('#packageErrorModal').modal('show');
								});
							</script>
						<?php } else if ($msg) { ?>
							<script>
								// Show the booking success modal after successful booking
								$(document).ready(function() {
									$('#packageSuccessModal').modal('show');
								});
							</script>
						<?php } ?>

						<div class="tab-content">
							<div class="tab-pane active" id="horizontal-form">
								<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="packagename" id="packagename" placeholder="Create Package" required>
										</div>
									</div>
									<div class="form-group">
										<div class="form-group">
											<label for="packagetype" class="col-sm-2 control-label">Package Type</label>
											<div class="col-sm-8">
												<select class="form-control1 custom-dropdown" name="packagetype" id="packagetype" required>
													<option value="">-- Select Package Type --</option>
													<option value="Family Package">Family Package</option>
													<option value="Couple Package">Couple Package</option>
													<option value="Adventure Package">Adventure Package</option>
													<option value="Corporate Package">Corporate Package</option>
													<option value="Honeymoon Package">Honeymoon Package</option>
													<option value="Group Package">Group Package</option>
													<option value="Luxury Package">Luxury Package</option>
													<option value="Solo Package">Solo Package</option>
													<option value="Custom Package">Custom Package</option>
												</select>
											</div>
										</div>
									</div>

									<div class="form-group">
										<label for="packagelocation" class="col-sm-2 control-label" style="margin-top: -16px;">Package Location</label>
										<div class="col-sm-8" style="margin-top: -16px;">
											<select class="form-control1 custom-dropdown" name="packagelocation" id="packagelocation" required>
												<option value="">-- Select Package Location --</option>
												<option value="Tinuy-an Falls, Borboanan, Bislig, Surigao del Sur">Tinuy-an Falls, Bislig City</option>
												<option value="Sian Falls, Bislig, Surigao del Sur">Sian Falls, Bislig City</option>
												<option value="Hinayagan Cave, Kapatagan 2, Bislig, Surigao del Sur">Hinayagan Cave, Kapatagan 2, Bislig, Surigao del Sur</option>
												<option value="Lake 77, Bislig, Surigao del Sur">Lake 77, Bislig, Surigao del Sur</option>
												<option value="Bislig Baywalk, Bislig, Surigao del Sur">Bislig Baywalk, Bislig, Surigao del Sur</option>
												<!-- You can add more locations if needed -->
											</select>
										</div>
									</div>

									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Package Price</label>
										<div class="col-sm-8">
											<input type="text" class="form-control1" name="packageprice" id="packageprice" placeholder=" Package Price in Philippine Peso" required>
										</div>
									</div>

									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
										<div class="col-sm-8">
											<div class="checkbox-grid">
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Free Pickup-Drop Facility"> Free Pickup-Drop Facility</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Guided Tours"> Guided Tours</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Meals Included"> Meals Included</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Adventure Activities"> Adventure Activities</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Luxury Stay"> Luxury Stay</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Kids' Activities"> Kids' Activities</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Cultural Experiences"> Cultural Experiences</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Spa Services"> Spa Services</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Swimming Pool Access"> Swimming Pool Access</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Free Wi-Fi"> Free Wi-Fi</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Local Sightseeing"> Local Sightseeing</label>
												</div>
												<div class="checkbox">
													<label><input type="checkbox" name="packagefeatures[]" value="Photography Services"> Photography Services</label>
												</div>
											</div>
										</div>
									</div>



									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
										<div class="col-sm-8">
											<textarea class="form-control" rows="5" cols="50" name="packagedetails" id="packagedetails" placeholder="Package Details" required></textarea>
										</div>
									</div>
									<div class="form-group">
										<label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
										<div class="col-sm-8">
											<input type="file" name="packageimage" id="packageimage" required>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-8 col-sm-offset-2">
											<button type="submit" name="submit" class="btn-primary btn">Create</button>

											<button type="reset" class="btn-inverse btn">Reset</button>
										</div>
									</div>





							</div>

							</form>





							<div class="panel-footer">

							</div>
							</form>
						</div>
					</div>
					<!--//grid-->

					<!-- script-for sticky-nav -->
					<script>
						$(document).ready(function() {
							var navoffeset = $(".header-main").offset().top;
							$(window).scroll(function() {
								var scrollpos = $(window).scrollTop();
								if (scrollpos >= navoffeset) {
									$(".header-main").addClass("fixed");
								} else {
									$(".header-main").removeClass("fixed");
								}
							});

						});
					</script>
					<!-- /script-for sticky-nav -->
					<!--inner block start here-->
					<div class="inner-block">

					</div>
					<!--inner block end here-->
					<!--copy rights start here-->
					<?php include('includes/footer.php'); ?>
					<!--COPY rights end here-->
				</div>
			</div>
			<!--//content-inner-->
			<!--/sidebar-menu-->
			<?php include('includes/sidebarmenu.php'); ?>
			<div class="clearfix"></div>
		</div>
		<script>
			var toggle = true;

			$(".sidebar-icon").click(function() {
				if (toggle) {
					$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
					$("#menu span").css({
						"position": "absolute"
					});
				} else {
					$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
					setTimeout(function() {
						$("#menu span").css({
							"position": "relative"
						});
					}, 400);
				}

				toggle = !toggle;
			});
		</script>
		<!--js -->
		<script src="js/jquery.nicescroll.js"></script>
		<script src="js/scripts.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		<!-- /Bootstrap Core JavaScript -->

		<!-- Success Modal -->
		<div class="modal fade" id="packageSuccessModal" tabindex="-1" aria-labelledby="packageSuccessModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title" id="packageSuccessModalLabel" style="font-weight: bold;">Package Creation Successful!</h1>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" id="closeButton" style="background-color: red;">Close</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Error Modal -->
		<div class="modal fade" id="packageErrorModal" tabindex="-1" aria-labelledby="packageErrorModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h1 class="modal-title" id="packageErrorModalLabel" style="font-weight: bold;">Package Creation Error</h1>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>

		<script>
			const packageSuccessModal = document.getElementById('packageSuccessModal');

			// Close modal when 'Close' button is clicked
			document.getElementById('closeButton').addEventListener('click', () => {
				packageSuccessModal.classList.remove('show'); // Remove Bootstrap 'show' class
				packageSuccessModal.style.display = 'none'; // Hide modal
				document.body.classList.remove('modal-open'); // Remove body scroll lock
				document.querySelector('.modal-backdrop').remove(); // Remove backdrop
			});
		</script>

	</body>

	</html>
<?php } ?>