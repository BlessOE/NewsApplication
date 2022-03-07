<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles/mobile.css">
	<link rel="stylesheet" media="only screen and (min-width:720px)" href="styles/desktop.css">

	<title>Create Account</title>
</head>

<body>

	<?php
	include_once("createAccountSQL.php");
	?>

	<?php
	$errorfirstName = $errorlastName = $erroremail = $errordateOfBirth = $errorpassword = $errorcity = "";
	$allFields = "yes";

	/* 
	
	- email
	- dob
	- password
	- cpassword
	- city

	*/

	if (isset($_POST['submit'])) {

		if ($_POST['firstName'] == "") {
			$errorfname = "First name is mandatory";
			$allFields = "no";
		}
		if ($_POST['lastName'] == null) {
			$errorlname = "Last name is mandatory";
			$allFields = "no";
		}
		if ($_POST['email'] == "") {
			$erroruname = "Email is mandatory";
			$allFields = "no";
		}
		if ($_POST['dateOfBirth'] == "") {
			$erroruid = "Date of Birth is mandatory";
			$allFields = "no";
		}
		if ($_POST['password'] == "") {
			$errorpwd = "Default password mandatory";
			$allFields = "no";
		}
		if ($_POST['city'] == "") {
			$errorpwd = "Located city is mandatory";
			$allFields = "no";
		}

		if ($allFields == "yes") {
			$createUser = createAccount();
			header('Location: login.php?createUser=' . $createUser);
		}
	}
	?>

	<div>
		<h1>Create New Account</h1>

		<div>
			<div>
				<form method="POST" action="">
					<div class="formCA">
						<div class="input">
							<div>
								<label>First Name</label>
								<input type="text" name="firstName" required>
								<span><?php echo $errorfirstName; ?></span>
							</div>
							<div>
								<label>Email</label>
								<input type="email" name="email" required>
								<span><?php echo $erroremail; ?></span>
								<!-- value="</?php echo $email; ?>" -->
							</div>
							<div>
								<label>Password</label>
								<input type="password" name="password" required>
								<span><?php echo $errorpassword; ?></span>
								<!-- value="</?php echo $_POST['password']; ?>" -->
							</div>
							<div>
								<label>City</label>
								<input type="text" name="city" required>
								<span><?php echo $errorcity; ?></span>
								<!-- value="</?php echo $city; ?>" -->
							</div>
						</div>
						<div class="input">
							<div>
								<label>Last Name</label>
								<input type="text" name="lastName" required>
								<span><?php echo $errorlastName; ?></span>
								<!-- value="</?php echo $lastName; ?>" -->
							</div>
							<div>
								<label>Date of Birth</label>
								<input type="date" name="dateOfBirth" required>
								<span><?php echo $errordateOfBirth; ?></span>
								<!-- value="</?php echo $dateOfBirth; ?>" -->
							</div>
							<div>
								<label>Confirm Password</label>
								<input type="password" name="cpassword" required>
								<span><?php echo $errorpassword; ?></span>
								<!-- value="</?php echo $_POST['cpassword']; ?>" -->
							</div>
						</div>
					</div>

					<div>
						<input class="button" type="submit" value="Create Account" name="submit">
					</div>

				</form>
			</div>
			<div>
				<!-- <button type="submit" name="submit">Create Accouent</button> -->
			</div>
			<div class="switch">
				<p>Already have an account? <a href="login.php">Login to account</a></p>
			</div>
		</div>
	</div>
</body>

</html>