<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>BISLIG TOURS | Package List</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/custom3.css" rel='stylesheet' type='text/css' />
	<link href="css/logo.css" rel='stylesheet' type='text/css' />
	<link href="css/package_list.css" rel='stylesheet' type='text/css' />
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
	<script>
		new WOW().init();
	</script>
	<!--//end-animate-->
</head>

<body>
	<?php include('includes/header.php'); ?>

	<!-- Rooms Section -->
	<div class="rooms">
		<div class="container">
			<div class="room-bottom">
				<h3>Package List</h3>

				<?php
				$sql = "SELECT * from tbltourpackages";
				$query = $dbh->prepare($sql);
				$query->execute();
				$results = $query->fetchAll(PDO::FETCH_OBJ);

				if ($query->rowCount() > 0) {
					foreach ($results as $result) { ?>
						<div class="room-card">
							<div class="room-card-image">
								<img src="admin/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>" alt="">
							</div>
							<div class="room-card-info">
								<h4>Package Name: <?php echo htmlentities($result->PackageName); ?></h4>
								<h6>Package Type: <?php echo htmlentities($result->PackageType); ?></h6>
								<p><b>Package Location:</b> <?php echo htmlentities($result->PackageLocation); ?></p>
								<p><b>Features:</b> <?php echo htmlentities($result->PackageFetures); ?></p>
							</div>
							<div class="room-card-price">
								<h5>PESO <?php echo htmlentities($result->PackagePrice); ?></h5>
								<a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>" class="view-details">Details</a>
							</div>
						</div>
				<?php }
				} ?>
			</div>
		</div>
	</div>
	<!-- /Rooms Section -->


	<!--- /footer-top ---->
	<?php include('includes/footer.php'); ?>
	<!-- signup -->
	<?php include('includes/signup.php'); ?>
	<!-- //signu -->
	<!-- signin -->
	<?php include('includes/signin.php'); ?>
	<!-- //signin -->
	<!-- write us -->
	<?php include('includes/write-us.php'); ?>
	<!-- //write us -->
</body>

</html>