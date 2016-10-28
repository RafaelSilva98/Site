
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>
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
				<a class="navbar-brand" href="index.php"><img alt="Imagem" title="Forge" height="35" width="35" src="logo.png"></a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav">
					<li class="active"><a href="index.php">Home</a></li>

				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li><a href="register-page.php"><span class="glyphicon glyphicon-log-in"></span> Register</a></li>
					
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
				<form action="login.php" method="post">
					<p><label class="active" for="username">Username:</label><br>
						<input id="username" type="text" name="username" size="30" maxlength="60" 
						value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>" > </p>
						<br>
					<p><label class="active" for="psword">Password:</label><br>
							<input id="psword" type="password" name="psword" size="12" maxlength="12" 
							value="<?php if (isset($_POST['psword'])) echo $_POST['psword']; ?>" > 
							<span>&nbsp;Between 8 and 12 characters.</span></p>
							<p><input id="submit" type="submit" name="submit" value="Login"></p>
				</form>
			</div>
			<div class="col-sm-4 text-left"> <br><br><br>

				<?php
session_start();
// This section processes submissions from the login form
// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 //connect to database
 
	require ('mysqli_connect.php'); 
 // Validate the email address
	if (!empty($_POST['username'])) {
		$u = mysqli_real_escape_string($dbcon, $_POST['username']);
	} else {
		$u = FALSE;
		echo '<p class="error">You forgot to enter your username.</p>';
	}
 // Validate the password
	if (!empty($_POST['psword'])) {
		$p = mysqli_real_escape_string($dbcon, $_POST['psword']);
	} else {
		$p = FALSE;
		echo '<p class="error">You forgot to enter your password.</p>';
	}
 if ($u && $p){//if no problems 
// Retrieve the user_id, first_name and user_level for that username/password combination
 	$q = "SELECT user_id, fname, user_level FROM users WHERE (username LIKE '$u' AND psword LIKE SHA1('$p'))";
// Run the query and assign it to the variable $result
 	$result = mysqli_query ($dbcon, $q);
// Count the number of rows that match the username/password combination
	if (@mysqli_num_rows($result) == 1) {//if one database row (record) matches the input:-
// Start the session, fetch the record and insert the three values in an array
		
//session_start(); 
		$_SESSION = mysqli_fetch_array ($result, MYSQLI_ASSOC);

// Use a ternary operation to set the URL 
//$url = ($_SESSION['user_level'] == 1) ? 'admin-page.php' : 'members-page.php';
		if($_SESSION['user_level'] == 1){
			//echo '1'; exit();
		?>
		<script>$(location).attr('href', 'admin-page.php');</script>

		<?php 
		exit();
		} else { //exit();
			//echo '2'; exit();
			//print_r($_SESSION); exit();
		?>
		<script>
			$(location).attr('href', 'members-page.php');
			</script> 
		<?php 
		exit();
		}
exit(); // Cancel the rest of the script

mysqli_free_result($result);
mysqli_close($dbcon);
	 } else { // No match was made.
	 	echo '<p class="error"> The username and password entered do not match our records 
	 	<br> Perhaps you need to register, just click the Register button on the header menu</p>';
	 }
 } else { // If there was a problem.
 	echo '<p class="error">Please try again.</p>';
 }
 mysqli_close($dbcon);
  }// End of SUBMIT conditional.
  ?>
  <!-- Display the form fields--> 

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
