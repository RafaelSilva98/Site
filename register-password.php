

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Change Password</title>
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
				
				<a class="navbar-brand" href="members-page.php"><img alt="Imagem" title="Forge" height="35" width="35" src="logo.png"></a>
					</div>
						<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
					<li><a href="members-page.php">Home</a></li>
					<li class="active"><a href="register-password.php">New Password</a></li>
				</ul>
				
				
				<ul class="nav navbar-nav navbar-right">
					<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
					
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

				<h2>Login</h2><br>
				<h2>Change Your Password</h2>
				<form action="register-password.php" method="post">
					<p><label class="active" for="email">Email Address:</label><br>
						<input id="email" type="text" name="email" size="40" maxlength="60" 
						value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
					<p><label class="active" for="psword">Current Password:</label><br>
						<input id="psword" type="password" name="psword" size="12" maxlength="12" 
						value="<?php if (isset($_POST['psword'])) echo $_POST['psword']; ?>"></p>
					<p><label class="active" for="psword1">New Password:</label><br>
						<input id="psword1" type="password" name="psword1" size="12" maxlength="12" 
						value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>"></p>
					<p><label class="active" for="psword2">Confirm New Password:</label><br>
						<input id="psword2" type="password" name="psword2" size="12" maxlength="12" 
						value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>"></p>
					<p><input id="submit"type="submit" name="submit" value="Change Password"></p>
				</form>
			</div>
			<div class="col-sm-4 text-left"> <br><br><br>

				<?php
// This page lets users change their password.
// Was the submit button clicked?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 require ('mysqli_connect.php'); // Connect to the db.
 $errors = array(); // Initialize the error array.
 // Check for an email address:
 if (empty($_POST['email'])) {
 $errors[] = 'You forgot to enter your email address.';
 } else {
 $e = mysqli_real_escape_string($dbcon, trim($_POST['email'])); 
 }
 // Check for the current password:
 if (empty($_POST['psword'])) {
 $errors[] = 'You forgot to enter your current password.';
 } else {
 $p = mysqli_real_escape_string($dbcon, trim($_POST['psword']));
 }
 // Check for a new password and match against the confirmed password:
 if (!empty($_POST['psword1'])) {
 if ($_POST['psword1'] != $_POST['psword2']) {
 $errors[] = 'Your new password did not match the confirmed password.';
 } else {
 $np = mysqli_real_escape_string($dbcon, trim($_POST['psword1']));
 }
 } else {
 $errors[] = 'You forgot to enter your new password.';
 }
 if (empty($errors)) { // If no problems occurred
 // Check that the user has entered the right email address/password combination:
 $q = "SELECT user_id FROM users WHERE (email='$e' AND psword=SHA1('$p') )";
 $result = @mysqli_query($dbcon, $q);
 $num = @mysqli_num_rows($result);
 if ($num == 1) { // Match was made.
 // Get the user_id:
 $row = mysqli_fetch_array($result, MYSQLI_NUM);
 // Make the UPDATE query:
 $q = "UPDATE users SET psword=SHA1('$np') WHERE user_id=$row[0]";
$result = @mysqli_query($dbcon, $q);
 if (mysqli_affected_rows($dbcon) == 1) { // If the query ran without a problem
 // Echo a message
 echo '<h2>Thank you!</h2>
 <h3>Your password has been updated.</h3>';
 } else { // If it encountered a problem
 // Error message
 echo '<h2>System Error</h2>

<p class="error">Your password could not be changed due to a system error.
We apologize for any inconvenience.</p>';
 // Debugging message
 echo '<p>' . mysqli_error($dbcon) . '<br /><br />Query: ' . $q . '</p>';
 }
 mysqli_close($dbcon); // Close the database connection.
 // Include the footer and quit the script (to not show the form).
 include ('footer.php');
 exit();
 } else { // Invalid email address/password combination.
 echo '<h2>Error!</h2>
 <p class="error">The email address and password do not match those on file.</p>';
 }
 } else { // Report the errors.
 echo '<h2>Error!</h2>
 <p class="error">The following error(s) occurred:<br />';
 foreach ($errors as $msg) { // Print each error.
 echo " - $msg<br />\n";
 }
 echo '</p><p class="error">Please try again.</p><p><br /></p>';
 } // End of if (empty($errors))
 mysqli_close($dbcon); // Close the database connection.
} // End of the main Submit conditional
?>
<!--Display the form-->

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
