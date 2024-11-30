<?php
session_start();
if (isset($_POST['signin'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "SELECT EmailId,Password FROM tblusers WHERE EmailId=:email and Password=:password";
	$query = $dbh->prepare($sql);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$_SESSION['login'] = $_POST['email'];
		echo "<script type='text/javascript'> document.location = 'package-list.php'; </script>";
	} else {

		echo "<script>alert('Invalid Details');</script>";
	}
}

?>

<html>

<head>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

</html>

<div class="modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content modal-info">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
			</div>
			<div class="modal-body modal-spa">
				<div class="login-grids">
					<div class="login">
						<div class="login-left">
							<img src="images/logo.png" alt="" style="width: 250px; height: 250px; margin-right: 10px; margin-top: 10px;">
							<p style="color: black; font-size: 16px; font-weight: bold; font-family: 'Poppins', sans-serif; margin-left: 20px; margin-top: 10px"> You can also sign in with: </p>
							<a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
								<img src="images/fb_logo.png" alt="Sign up with Facebook" style="width: 35px; height: 35px; margin-left: 83px; margin-top: 10px">
							</a>
							<a href="https://gmail.com" target="_blank" rel="noopener noreferrer">
								<img src="images/gg_logo.png" alt="Sign up with Facebook" style="width: 35px; height: 35px; margin-left: 8px; margin-top: 10px">
							</a>
						</div>
						<div class="login-right">
							<form method="post">
								<h2 style="color: black; font-weight: bold; font-family: 'Poppins', sans-serif; margin-top: 20px;">SIGN IN</h2>
								<input type="text" name="email" id="email" placeholder="Enter e-mail address" required="" style="color: black; border-radius: 10px;">
								<input type="password" name="password" id="password" placeholder="Enter password" value="" required="" style="color: black; border-radius: 10px;">
								<p><a style="color: black; font-weight: bold; font-family: 'Poppins', sans-serif; font-size: 13px" href="forgot-password.php">Forgot password</a></p>

								<input type="submit" name="signin" value="SIGN IN" style="background-color: black; border-radius: 25px;">
							</form>
						</div>
						<div class="clearfix"></div>
					</div>
					<p>By signing in, you agree to our <a href="page.php?type=terms">Terms and Conditions</a> and <a href="page.php?type=privacy">Privacy Policy</a></p>
				</div>
			</div>
		</div>
	</div>
</div>