<?php if ($_SESSION['login']) { ?>

	<div class="top-header login-header">
		<div class="container">
			<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
				<li class="prnt"><a href="profile.php">My Profile</a></li>
				<li class="prnt"><a href="package-list.php">Tour Package</a></li>
				<li class="prnt"><a href="change-password.php">Change Password</a></li>
				<li class="prnt"><a href="tour-history.php">My Tour History</a></li>
				<!-- <li class="prnt"><a href="issuetickets.php">Issue Tickets</a></li> -->
			</ul>
			<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
				<li class="tol">Welcome :</li>
				<li class="sig"><?php echo htmlentities($_SESSION['login']); ?></li>
				<li class="sigi"><a href="logout.php">/ Logout</a></li>
			</ul>
			<div class="clearfix"></div>
			<script>
				window.chtlConfig = {
					chatbotId: "8619528422"
				}
			</script>
			<script async data-id="8619528422" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>
		</div>
	</div><?php } else { ?>
	<!-- Apply the bg-main class to the outer container -->
	<div class="bg-main">
		<!-- Start top-header -->
		<div class="top-header">
			<div class="container">
				<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
					<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal">Sign Up</a></li>
					<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4">/ Sign In</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>

		</div>
		<!-- End top-header -->

		<!-- Start header section -->
		<div class="header">
			<div class="container">
				<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
					<a href="index.php">
						<!-- Logo image div on the left side -->
						<div class="logo-img"></div>
						BISLIG TOURS
					</a>
				</div>
				<div class="lock fadeInDown animated" data-wow-delay=".5s">
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- End header -->


		<!-- Start footer section -->
		<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
			<div class="container">
				<div class="navigation">
					<nav class="navbar navbar-default">
						<!-- Brand and toggle get grouped for better mobile display -->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
							<nav class="cl-effect-1">
								<ul class="nav navbar-nav">
									<li><a href="index.php">Home</a></li>
									<li><a href="page.php?type=aboutus">About</a></li>
									<li><a href="package-list.php">Tour Packages</a></li>
									<li><a href="page.php?type=privacy">Privacy Policy</a></li>
									<li><a href="page.php?type=terms">Terms of Use</a></li>
									<li><a href="page.php?type=contact">Contact Us</a></li>
									<?php if ($_SESSION['login']) { ?>
										<li>Need Help?<a href="#" data-toggle="modal" data-target="#myModal3"> / Write Us </a> </li>
									<?php } else { ?>
										<li><a href="enquiry.php"> Enquiry </a> </li>
									<?php } ?>
									<div class="clearfix"></div>
								</ul>
							</nav>


						</div><!-- /.navbar-collapse -->

						<div class="bg-main1">
							<div class="content">
								<h1>Welcome to Bislig Tours</h1>
								<p>Discover the beauty of BISLIG CITY!</p>
							</div>
						</div>
					</nav>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<!-- End footer-btm -->
	</div>
	<!-- End bg-main -->
	<!-- Add Chatbot Script Below -->
	<script>
		window.chtlConfig = {
			chatbotId: "8619528422"
		}
	</script>
	<script async data-id="8619528422" id="chatling-embed-script" type="text/javascript" src="https://chatling.ai/js/embed.js"></script>

<?php } ?>