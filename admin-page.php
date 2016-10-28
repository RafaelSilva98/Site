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
					<li class="active"><a href="admin-page.php">Home</a></li>
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
			<div class="col-sm-4 text-left">
				<?php 
				echo '<h2>Welcome to the Admin Page';
				if (isset($_SESSION['username'])){
				echo "{$_SESSION['username']}";
				}
				echo '</h2>';
				?>
			</div>
			<div class="col-sm-4 text-left"> <br><br><br>
			<h3> As an Admin you can:</h3>
				<p>&#9632;Edit and delete a record.</p> 
			 	<p>&#9632;Use the View Members button to page through all the members.</p>
				<p>&#9632;Use the Search button to locate a particular member.</p>
		 		<p>&nbsp;</p>
				
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
