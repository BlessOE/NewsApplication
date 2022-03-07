<?php
require_once("verifyUser.php");
$emailErr = $pwderr = $invalidMesg = "";

// This could be a solution for you ask. what about line no 57?
// is the same logic. Still need both? if you want to show the message later... yes
// this is a bit "tricky" for a redirect
// because I don't like making redirects in browsers
// you can use a header redirect too... but I don't like because could give you problems with caches
if (isset($_POST['submit'])) {

	if ($_POST["email"] == "") {
		$emailErr = "Email is required";
	}

	if ($_POST["password"] == null) {
		$pwderr = "Password is required";
	}

	if ($_POST['email'] != null && $_POST["password"] != null) {
		$array_user = verifyUsers(); //calling this function from SelectUser.php. The function returns an array
		if ($array_user != null) {

			//print_r($array_user);
			//echo "Test ".$array_user[0]["Role"];

			session_start();
			$_SESSION['email'] = $_POST['email'];
			$_SESSION["login_time_stamp"] = time();
			$_SESSION['user_id'] = $array_user[0]['user_id'];
			$_SESSION['first_name'] = $array_user[0]['first_name'];
			$_SESSION['last_name'] = $array_user[0]['last_name'];
			$_SESSION['city'] = $array_user[0]['city'];
			//include('OtherPage.php');// why dont we use this in line 70? Because in line 70 you want to show a text
			// not include contents of a diferent page. OK ok. 

			// You can make a redirect too:
			// Absolute URI:
			// DOC: https://www.php.net/manual/es/function.header.php
			$host  = $_SERVER['HTTP_HOST'];
			$uri   = rtrim(dirname($_SERVER['PHP_SELF'], 2), '/\\');
			$filename = 'news_app';
			$extra = 'userProfile.php';
			header("Location: http://$host$uri/$filename/$extra"); //i created a php file with the name OtherPage
			// I don't like this way, because this redirection happens in the browser
			// I prefer control things in the server
			exit();


			// if ($array_user[0]['Role'] == "admin") //if the user is admin, this message will be prompted
			// {
			// 	$invalidMesg = "This page is for student login";
			// }
		} else {
			$invalidMesg = "Invalid username and password!";
		}
	}
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> -->

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles/mobile.css">
	<link rel="stylesheet" media="only screen and (min-width:720px)" href="styles/desktop.css">

	<title>Login</title>
</head>

<body>

	<div>
		<h1>Login</h1>

		<div>
			<form action="" method="POST">
				<div class="form">
					<div>
						<label>Email</label>
						<input type="email" name="email" required>
						<span class="text-danger"> <?php echo $emailErr; ?></span>
					</div>
					<div>
						<label>Password</label>
						<input type="password" name="password" required>
						<span class="text-danger"> <?php echo $pwderr; ?></span>
					</div>
				</div>
				<div>
					<label style="color: red"><?php echo $invalidMesg; ?></label>
				</div>
				<div>
					<!-- <a class="button" href="userProfile.php">Login</a> -->
					<input class="button" type="submit" value="Login" name="submit">
					<!-- <button name="submit" class="btn">Login</button> -->
				</div>
				<div class="switch">
					<p>Don't have an account? <a href="createAccount.php">Create new account</a></p>
				</div>
			</form>
		</div>
	</div>
</body>

</html>