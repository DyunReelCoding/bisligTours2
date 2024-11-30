<?php
error_reporting(0);
if (isset($_POST['submit'])) {
	$fname = $_POST['fname'];
	$mnumber = $_POST['mobilenumber'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$sql = "INSERT INTO  tblusers(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
	$query = $dbh->prepare($sql);
	$query->bindParam(':fname', $fname, PDO::PARAM_STR);
	$query->bindParam(':mnumber', $mnumber, PDO::PARAM_STR);
	$query->bindParam(':email', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$lastInsertId = $dbh->lastInsertId();
	if ($lastInsertId) {
		$_SESSION['msg'] = "You are Scuccessfully registered. Now you can login ";
	} else {
		$_SESSION['msg'] = "Something went wrong. Please try again.";
	}
}
?>

<?php
if (isset($_SESSION['msg'])) {
	echo "<script>
        $(document).ready(function() {
            $('#accountCreatedModal').modal('show');
        });
    </script>";
	unset($_SESSION['msg']); // Clear session message after modal is shown
}
?>

<!--Javascript for check email availabilty-->
<script>
	function checkAvailability() {

		$("#loaderIcon").show();
		jQuery.ajax({
			url: "check_availability.php",
			data: 'emailid=' + $("#email").val(),
			type: "POST",
			success: function(data) {
				$("#user-availability-status").html(data);
				$("#loaderIcon").hide();
			},
			error: function() {}
		});
	}
</script>

<html>

<head>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>

</html>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div>
			<section>
				<div class="modal-body modal-spa">
					<div class="login-grids">
						<div class="login">
							<div class="login-left">
								<img src="images/logo.png" alt="" style="width: 250px; height: 250px; margin-right: 10px; margin-top: 20px;">
								<p style="color: black; font-size: 16px; font-weight: bold; font-family: 'Poppins', sans-serif; margin-left: 20px; margin-top: 10px"> You can also sign up with: </p>
								<a href="https://facebook.com" target="_blank" rel="noopener noreferrer">
									<img src="images/fb_logo.png" alt="Sign up with Facebook" style="width: 35px; height: 35px; margin-left: 83px; margin-top: 10px">
								</a>
								<a href="https://gmail.com" target="_blank" rel="noopener noreferrer">
									<img src="images/gg_logo.png" alt="Sign up with Facebook" style="width: 35px; height: 35px; margin-left: 8px; margin-top: 10px">
								</a>
							</div>
							<div class="login-right">
								<form name="signup" method="post">
									<h1 style="color: black; font-weight: bold; font-family: 'Poppins', sans-serif;">SIGN UP</h1>
									<input type="text" value="" placeholder="Enter full name" name="fname" autocomplete="off" required="" style="color: black; border-radius: 10px;">
									<input type="text" value="" placeholder="Enter mobile number" maxlength="10" name="mobilenumber" autocomplete="off" required="" style="color: black; border-radius: 10px;">
									<input type="text" value="" placeholder="Enter e-mail address" name="email" id="email" onBlur="checkAvailability()" autocomplete="off" required="" style="color: black; border-radius: 10px;">
									<span id="user-availability-status" style="font-size:12px;"></span>
									<input type="password" value="" placeholder="Enter password" name="password" id="password" required="" style="color: black; border-radius: 10px;" onkeyup="checkPasswordStrength()">

									<!-- Password Strength Guidelines -->
									<div id="password-guidelines" style="font-size: 12px; color: #888;">
										<p>Password must contain:</p>
										<ul>
											<li id="length" style="color: red; margin-left: 15px;">At least 8 characters</li>
											<li id="number" style="color: red; margin-left: 15px;">At least one number</li>
											<li id="special" style="color: red; margin-left: 15px;">At least one special character (!@#$%^&*)</li>
										</ul>
									</div>

									<!-- Warning message that the sign-up button cannot be clicked until password guidelines are complied -->
									<p id="warning-message" style="color: red; font-size: 12px; display: none; margin-left: 15px;">
										Please make sure your password meets all the requirements to create an account.
									</p>

									<input type="submit" name="submit" id="submit" value="SIGN UP" style="background-color: black; border-radius: 25px; font-family: 'Poppins', sans-serif;" disabled>
								</form>
							</div>
							<div class="clearfix"></div>
						</div>
						<p>By having an account, you agree to our <a href="page.php?type=terms">Terms and Conditions</a> and <a href="page.php?type=privacy">Privacy Policy</a></p>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="accountCreatedModal" tabindex="-1" aria-labelledby="accountCreatedModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title" id="accountCreatedModalLabel" style="font-weight: bold;">Account Created Successfully!</h1>
			</div>
			<div class="modal-body">
				Your account has been successfully created! You can now sign in to your account.
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" id="closeButton">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	const accountCreatedModal = document.getElementById('accountCreatedModal');

	// Close modal when 'Close' button is clicked
	document.getElementById('closeButton').addEventListener('click', () => {
		accountCreatedModal.classList.remove('show'); // Remove Bootstrap 'show' class
		accountCreatedModal.style.display = 'none'; // Hide modal
		document.body.classList.remove('modal-open'); // Remove body scroll lock
		document.querySelector('.modal-backdrop').remove(); // Remove backdrop
	});

	function checkPasswordStrength() {
		var password = document.getElementById("password").value;

		// Check for length
		var lengthValid = password.length >= 8;
		var numberValid = /[0-9]/.test(password); // Check for number
		var specialValid = /[!@#$%^&*\-_]/.test(password); // Check for special character including -, _

		// Update the password guideline list
		document.getElementById("length").style.color = lengthValid ? "green" : "red";
		document.getElementById("number").style.color = numberValid ? "green" : "red";
		document.getElementById("special").style.color = specialValid ? "green" : "red";

		// Enable the submit button if all conditions are met
		if (lengthValid && numberValid && specialValid) {
			document.getElementById("submit").disabled = false; // Enable submit button
			document.getElementById("warning-message").style.display = "none"; // Hide warning
		} else {
			document.getElementById("submit").disabled = true; // Disable submit button
			document.getElementById("warning-message").style.display = "block"; // Show warning
		}
	}
</script>