<?php 

include 'config.php';

// since a session variable will be used, session must be started
session_start();

error_reporting(0);

// login.php: will log in an existing user (based on the database)

// if there's already a user logged in, just proceed to the website, else stay in the login page
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

// if a form is successfully submitted
if (isset($_POST['submit'])) {

	// retrieve user's entered info
	$email = $_POST['email'];
	$password = md5($_POST['password']);

	// checks if the user's info is in the database
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$result = mysqli_query($conn, $sql);

	// if the user's info is in the database, proceed to the website
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['username'] = $row['username'];	// the current user's username will be the session's username
		header("Location: index.php");
	
	// if the user's info is not in the database
	} else {
		echo "<script>alert('The details that you entered are invalid.')</script>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="login-style.css">
	<title>Lim's Flat Icons - Login</title>
</head>
<body>

	<!-- the login form -->
	<div class="container">

		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>

			<!-- email field -->
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<!-- password field -->
			<div class="input-group">
				<input type="password" placeholder="Password" id="myInput" name="password" value="<?php echo $_POST['password']; ?>" required>
				<span class="pw">
					<!-- will call the function toggle() -->
					<!-- toggle() changes the color of the eye icon and makes the password field's content visible -->
					<i class="fa fa-eye" id="font" onclick="toggle()" aria-hidden="true"></i>
				</span>
			</div>

			<!-- login button -->
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>

			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>

	</div>

	<script src="toggle.js"></script>

</body>
</html>