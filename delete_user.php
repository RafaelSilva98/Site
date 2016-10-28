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
					<li><a href="search.php">Search</a></li>
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
				<h2>Delete a Record</h2>
			</div>
			<div class="col-sm-5 text-left"><br><br><br><br>
			<?php
		// Check for a valid user ID, through GET or POST
		if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) { //Details from view_users.php
		 $id = $_GET['id'];
		} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) { // Form submission #1
		 $id = $_POST['id'];
		 } else { // If no valid ID, stop the script
		 echo '<p class="error">This page has been accessed in error.</p>';
		 include ('footer.php');
		 exit();
		}
		require ('mysqli_connect.php');
		// Has the form been submitted? #2
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['sure'] == 'Yes') { // Delete the record
		 // Make the query
		 $q = "DELETE FROM users WHERE user_id=$id LIMIT 1";
		 $result = @mysqli_query ($dbcon , $q);

		 if (mysqli_affected_rows($dbcon ) == 1) { // If there was no problem
		// Display a message
		 echo '<h3>The record has been deleted.</h3>';
		 } else { // If the query failed to run
		echo '<p class="error">The record could not be deleted.<br>Probably 
		because it does not exist or due to a system error.</p>'; // Display error message
		echo '<p>' . mysqli_error($dbcon ) . '<br />Query: ' . $q . '</p>';
		// Debugging message
		 }
		 } else { // Confirmation that the record was not deleted
		 echo '<h3>The user has NOT been deleted.</h3>';
		 }
		 } else { // Display the form
		// Retrieve the member's data #3
		 $q = "SELECT CONCAT(fname, ' ', lname) FROM users WHERE user_id=$id";
		 $result = @mysqli_query ($dbcon , $q);
		 if (mysqli_num_rows($result) == 1) { // Valid user ID, show the form
		// Get the member's data
		 $row = mysqli_fetch_array ($result, MYSQLI_NUM);
		// Display the name of the member being deleted
		 echo "<h3>Are you sure you want to permanently delete $row[0]?</h3>";
		// Display the delete page
			echo '<form action="delete_user.php" method="post"> 
		 <input id="submit-yes" type="submit" name="sure" value="Yes">
		 <input id="submit-no" type="submit" name="sure" value="No">
		 <input type="hidden" name="id" value="' . $id . '">
		 </form>';
		 } else { // Not a valid member’s ID
		 echo '<p class="error">This page has been accessed in error.</p>';
		 echo '<p>&nbsp;</p>';
		 }
		} // End of the main conditional section
		mysqli_close($dbcon );
		 echo '<p>&nbsp;</p>';
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
