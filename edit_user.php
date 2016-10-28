<?php 
session_start();
if (!isset($_SESSION['user_level']) or ($_SESSION['user_level'] != 1))
{
	
	header("Location: login.php");
	exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Page</title>
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
				<a class="navbar-brand" href="admin-page.php"><img alt="Imagem" title="Forge" height="35" width="35" src="logo.png"></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li><a href="admin-page.php">Home</a></li>
					<li><a href="register-view_users-page.php">View Members</a></li>
					<li class="active"><a href="search.php">Search</a></li>
					<li><a href="register-password-admin.php">New Password</a></li>


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
				<h1>To Do List</h1>
				<ul>
					<li>1-Etiam posuere quam ac quam. Maecenas aliquet accumsan leo. Nullam dapibus fermentum ipsum. Etiam quis quam. Integer lacinia. Nulla est. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Integer vulputate sem a nibh rutrum consequat. Maecenas lorem. Pellentesque pretium</li>
					<li>2-Etiam posuere quam ac quam. Maecenas aliquet accumsan leo. Nullam dapibus fermentum ipsum. Etiam quis quam. Integer lacinia. Nulla est. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Integer vulputate sem a nibh rutrum consequat. Maecenas lorem. Pellentesque pretium</li>
					
				</ul>
			</div>
			<div class="col-sm-3 text-center">
				<h2>Edit Record</h2>
			</div>
			<div class="col-sm-5 text-left"><br><br><br><br>
			<?php
// After clicking the Edit link in the found_record.php page, the editing interface appears
// The code looks for a valid user ID, either through GET or POST #1
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { // From view_users.php
	$id = $_GET['id'];
} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission
	$id = $_POST['id'];
} else { // If no valid ID, stop the script
	echo '<p class="error">This page has been accessed in error</p>';
	include ('footer.php');
	exit();
}
require ('mysqli_connect.php');
$errors = array();
// Has the form been submitted?
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
// Look for the first name
	if (empty($_POST['fname'])) {
		$errors[] = 'You forgot to enter the first name.';
	} else {
		$fn = mysqli_real_escape_string($dbcon, trim($_POST['fname']));
	}
 // Look for the last name
	if (empty($_POST['lname'])) {
		$errors[] = 'You forgot to enter the last name.';
	} else {
		$ln = mysqli_real_escape_string($dbcon, trim($_POST['lname']));
	}
 // Look for the user name
	if (empty($_POST['username'])) {
		$errors[] = 'You forgot to enter the last name.';
	} else {
		$u = mysqli_real_escape_string($dbcon, trim($_POST['username']));
	}
// Look for the email address
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter the email address.';
	} else {
		$e = mysqli_real_escape_string($dbcon, trim($_POST['email']));
	}
if (empty($errors)) { // If everything is OK, make the update query #2
// Check that the email is not already in the users table
			$q = "UPDATE users SET fname='$fn', lname='$ln', username='$u', email='$e' WHERE user_id=$id LIMIT 1";
			$result = @mysqli_query ($dbcon, $q);
				 if (mysqli_affected_rows($dbcon) == 1) { // If it ran OK
				// Echo a message if the edit was satisfactory
				 	echo '<h3>The user has been edited.</h3>';
				 } else { // Echo a message if the query failed
				 	echo '<p class="error">You did not change any field!'; // Error message.
				 
				}
 } else { // If the email address is already registered
 	echo '<p class="error">The email address has already been registered.</p>';
 	}

 } else { // Display the errors.
 	echo '<p class="error">The following error(s) occurred:<br />';
 		foreach ($errors as $msg) { // Extract the errors from the array and echo them
	echo " - $msg<br>\n";
			}
 } // End of if (empty($errors))section
// Select the record 
$q = "SELECT fname, lname, username, email FROM users WHERE user_id=$id";
$result = @mysqli_query ($dbcon, $q);
if (mysqli_num_rows($result) == 1) { // Valid user ID, display the form.
// Get the user's information
	$row = mysqli_fetch_array ($result, MYSQLI_NUM);
// Create the form
	echo '<form action="edit_user.php" method="post">
	<p><label class="active" for="fname">First Name:</label>
		<input class="fl-left" id="fname" type="text" name="fname" size="30" maxlength="30" 
		value="' . $row[0] . '"></p>
		<br><p><label class="active" for="lname">Last Name:</label>
		<input class="fl-left" type="text" name="lname" size="30" maxlength="40" 
		value="' . $row[1] . '"></p>
		<br><p><label class="active" for="username">Username:</label>
		<input class="fl-left" type="text" name="username" size="30" maxlength="50" 
		value="' . $row[2] . '"></p>
		<br><p><label class="active" for="email">Email Address:</label>
		<input class="fl-left" type="email" name="email" size="30" maxlength="50" 
		value="' . $row[3] . '"></p>
		<br><p><input id="submit" type="submit" name="submit" value="Edit"></p>
		<br><input type="hidden" name="id" value="' . $id . '" /> 
	</form>';
} else { // The record could not be validated
	echo '<p class="error">This page has been accessed in error</p>';
}
mysqli_close($dbcon);
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
