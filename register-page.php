
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
		/* Remove the navbar's default margin-bottom and rounded borders */
		.navbar {
			margin-bottom: 0;
			border-radius: 0;
		}

		/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
		.row.content {height: 450px}

		.col-sm-2{
			text-align: left;
		}

		/* Set gray background color and 100% height */
		.sidenav {
			padding-top: 20px;
			background-color: #f1f1f1;
			height: 100%;
		}

		/* Set black background color, white text and some padding */
		footer {
			background-color: #555;
			color: white;
			padding: 15px;
		}

		/* On small screens, set height to 'auto' for sidenav and grid */
		@media screen and (max-width: 767px) {
			.sidenav {
				height: auto;
				padding: 15px;
			}
			.row.content {height:auto;}
		}
		p.error { 
			color:red;
			font-size:105%; 
			font-weight:bold;
		}

		.straight{
			float:left; 
			margin-bottom:5px;
		}

	</style>
</head>
<body>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php"><img alt="Imagem" title="Forge" height="35" width="35" src="logo.png"></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>

				</ul>
			</div>
		</div>
	</nav>

	<div class="container-fluid text-center">
		<div class="row content">
			<div class="col-sm-2 sidenav">
				<h1>News</h1>
				<p>And it's a funny sort of business to be sitting up there at your desk, talking down at your subordinates from up there, especially when you have to go right up close because the boss is hard of hearing. Well, there's still some hope; once I've got the money together to pay off my parents' debt to him - another five or six years I suppose - that's definitely what I'll do. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards the viewer. Gregor then turned to look out the window at the dull weather. Drops of rain could be heard hitting the pane.</p>
			</div>
			<div class="col-sm-4 text-left">

				<h2>Register</h2>
				<form action="register-page.php" method="post">
					<p><label class="active" for="fname">First Name:</label><br> 
						<input id="straight" type="text" name="fname" size="30" maxlength="30" 
						value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>"></p>
						<p><label class="active" for="lname">Last Name:</label><br>
							<input id="straight" type="text" name="lname" size="30" maxlength="40" 
							value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>"></p>
							<p><label class="active" for="username">Username:</label><br>
								<input id="straight" type="text" name="username" size="30" maxlength="30" 
								value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>"></p>
								<p><label class="active" for="email">Email Address:</label><br>
									<input id="straight" type="email" name="email" size="30" maxlength="60" 
									value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
									<p><label class="active" for="psword1">Password:</label><br>
										<input id="straight" type="password" name="psword1" size="12" maxlength="12"
										value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>" >&nbsp; 
										Between 8 and 12 characters.</p>
										<p><label class="active" for="psword2">Confirm Password:</label><br>
											<input id="straight" type="password" name="psword2" size="12" maxlength="12" 
											value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>" ></p>
											<p><label class="active" for="fname">Captcha:</label><br>
												<input id="straight" type="text" name="captcha" placeholder="<?php include('mathcaptcha.php');?>" tabindex="4">
												<input type="hidden" name="v1" value="<?php echo $n1; ?>">
												<input type="hidden" name="v2" value="<?php echo $n2; ?>"></p>
												<p><input id="submit" type="submit" name="submit" value="Register"></p>
											</form>
										</div>
										<div class="col-sm-4 text-left"> <br>

											<?php
// The link to the database is moved to the top of the PHP code.
require ('mysqli_connect.php'); // Connect to the db.
// This query INSERTs a record in the users table.
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
$errors = array(); // Initialize an error array.
// Check for a first name:

if (empty($_POST['fname'])) {
	$errors[] = 'You forgot to enter your first name.';
} else {
	$fn = mysqli_real_escape_string($dbcon, trim($_POST['fname']));

}
// Check for a last name
if (empty($_POST['lname'])) {
	$errors[] = 'You forgot to enter your last name.';
} else {
	$ln = mysqli_real_escape_string($dbcon, trim($_POST['lname']));
}
// Check for a username
if (empty($_POST['username'])) {
	$errors[] = 'You forgot to enter your username.';
} else {
	$u = mysqli_real_escape_string($dbcon, trim($_POST['username']));
}

// Check for an email address
if (empty($_POST['email'])) {
	$errors[] = 'You forgot to enter your email address.';
} else {
	$e = mysqli_real_escape_string($dbcon, trim($_POST['email']));
}
// Check for a password and match it against the confirmed password
if (!empty($_POST['psword1'])) {
	if ($_POST['psword1'] != $_POST['psword2']) {
		$errors[] = 'Your two passwords did not match.';
	} else {
		$p = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
	}
} else {
	$errors[] = 'You forgot to enter your password.';
}
if(!empty($_POST['captcha']) && $_POST["captcha"]==$_POST['v1'] + $_POST['v2']){
}
else{
	if(empty($_POST['captcha']))
		$errors[] = 'You did not answer the captcha. --> '.$_POST['v1']." + ".$_POST['v2']." = ?";
	else{
		$errors[] = 'Wrong Captcha. --> '.$_POST['v1']." + ".$_POST['v2']." = ".$_POST['captcha'];
	}
}
if (empty($errors)) { // If it runs
// Register the user in the database...
// Make the query:
	$q = "INSERT INTO users (fname, lname, username, email, psword, registration_date)
	VALUES ('$fn', '$ln', '$u', '$e', SHA1('$p'), NOW() )";
$result = @mysqli_query ($dbcon, $q); // Run the query.
if ($result) { // If it runs
	echo "You've been registed sucessfuly!";
	exit();
} else { // If it did not run
// Message:
	echo '<h2>System Error</h2>
	<p class="error">You could not be registered due to a system error. We apologize
		for any inconvenience.</p>';
// Debugging message:
			echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
} // End of if ($result)
mysqli_close($dbcon); // Close the database connection.
// Include the footer and quit the script:
include ('footer.php');
exit();
} else { // Report the errors.

	echo '<h2>Error!</h2>
	<p class="error">The following error(s) occurred:<br>';
foreach ($errors as $msg) { // Extract the errors from the array and echo them
	echo " - $msg<br>\n";
}
echo '</p><h3>Please try again.</h3><p><br></p>';
}// End of if (empty($errors))
} // End of the main Submit conditional.
?>

</div>
<div class="col-sm-2 sidenav">
	<div class="well">
		<p>Advertisements</p>
		<img alt="Imagem" title="Carro" height="130" width="230" src="632.gif"><br>
	</div>
	<div class="well">
		<p>ADS</p>
		<img alt="Imagem" title="Carro" height="130" width="230" src="632.gif"><br>
	</div>
</div>
</div>
</div>




<footer class="container-fluid text-center">
	<p>Template modified by Rafael Silva</p>
</footer>

</body>
</html>