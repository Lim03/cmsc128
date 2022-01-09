<?php 

include 'config.php';

error_reporting(0);

session_start();

// register.php: will register a new user to the database

// if there's already a user logged in, just proceed to the website, else stay in register page
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}

// if a form is successfully submitted
if (isset($_POST['submit'])) {

	// retrieve user's info
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$cpassword = md5($_POST['cpassword']);
    $pass = $_POST['password'];

	// checks if the user's email is already in the database
	$sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

	// if the result NOT returned a row, the user's email is not yet in the database
    if (!$result->num_rows > 0) {

		// checks if the user's username is still available
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($conn, $sql);

		// if the result NOT returned a row, the user's username is still available
        if (!$result->num_rows > 0) {

			// checks if the password is correctly confirmed
            if ($password == $cpassword) {

				// if the password is correctly confirmed, check if it is strong
				// checks the pattern of the password
                $number = preg_match('@[0-9]@', $pass);			// the password have number
			    $uppercase = preg_match('@[A-Z]@', $pass);		// the password have uppercase letter
			    $lowercase = preg_match('@[a-z]@', $pass);		// the password have lowercase letter
			    $specialChars = preg_match('@[^\w]@', $pass);	// the password have special character

				// based on requirements strong password: min 8 chars, have 1 number, uppercase, lowercase, and special char
				// if the password is not strong
                if (strlen($pass) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
                    echo "<script>alert('Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character. Think of a stronger password')</script>";
				
				// if the password is strong
                } else {

					// record the user's input in the database
                    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
                    $result = mysqli_query($conn, $sql);

					// if the insertion is successful, the user is registered and automatically logged in
                    if ($result) {
						$_SESSION['username'] = $username;
						echo '<script>alert("Congratulations! You are now successfully registered."); window.location.href="index.php";</script>';
                    } else {
						echo "<script>alert('There is something wrong with your registration. Please try again.')</script>";
                    }
                }
			
			// if the password is not confirmed
            } else {
                echo "<script>alert('Your passwords do not match. Please confirm your password again.')</script>";
            }

		// if the username is already taken
        } else {
            echo "<script>alert('Sorry, this username already belongs to somebody else. Please choose a different username.')</script>";
        }

	// if the email is already registered
    } else {
        echo "<script>alert('Oh, looks like your email is already registered. Try logging into your account instead.')</script>";
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

	<title>Lim's Flat Icons - Register</title>
</head>
<body>
	<div class="container">

		<!-- the registration form -->
		<form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>

			<!-- username field -->
			<div class="input-group">
				<input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
			</div>

			<!-- email field -->
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>

			<!-- password field -->
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
				<span class="pw">
					<i class="fa fa-eye" id="font" onclick="toggle()" aria-hidden="true"></i>
				</span>
            </div>

			<!-- confirm password field -->
            <div class="input-group">
				<input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
				<span class="cpw">
					<i class="fa fa-eye" id="font2" onclick="toggle2()" aria-hidden="true"></i>
				</span>
			</div>

			<!-- submit button -->
			<div class="input-group">
				<button name="submit" class="btn">Register</button>
			</div>

			<p class="login-register-text">Have an account? <a href="login.php">Login Here</a>.</p>
		</form>
	</div>

	<script src="toggle.js"></script>
	
</body>
</html>