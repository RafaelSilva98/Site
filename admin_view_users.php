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
					<li class="active"><a href="register-view_users-page.php">View Members</a></li>
					<li><a href="search.php">Search</a></li>
					<li><a href="register-password-admin.php">New Password</a></li>

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
				<h1>To Do List</h1>
					<ul>
					<li>1-Etiam posuere quam ac quam. Maecenas aliquet accumsan leo. Nullam dapibus fermentum ipsum. Etiam quis quam. Integer lacinia. Nulla est. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Integer vulputate sem a nibh rutrum consequat. Maecenas lorem. Pellentesque pretium</li>
					<li>2-Etiam posuere quam ac quam. Maecenas aliquet accumsan leo. Nullam dapibus fermentum ipsum. Etiam quis quam. Integer lacinia. Nulla est. Nulla turpis magna, cursus sit amet, suscipit a, interdum id, felis. Integer vulputate sem a nibh rutrum consequat. Maecenas lorem. Pellentesque pretium</li>
					
				
				</ul>
			</div>
			<div class="col-sm-4 text-left">
				<h2>Registered members displayed four at a time</h2>
			</div>
			<div class="col-sm-4 text-left"> <br><br><br>

				<?php
// This code retrieves all the records from the users table.
require ('mysqli_connect.php'); // Connect to the database.
//set the number of rows per display page
$pagerows = 4; 
// Has the total number of pages already been calculated?
if (isset($_GET['p']) && is_numeric
($_GET['p'])) {//already been calculated
$pages=$_GET['p'];
}else{//use the next block of code to calculate the number of pages #4
//First, check for the total number of records
$q = "SELECT COUNT(user_id) FROM users";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$records = $row[0];
//Now calculate the number of pages
if ($records > $pagerows){ //if the number of records will fill more than one page
//Calculatethe number of pages and round the result up to the nearest integer
$pages = ceil ($records/$pagerows); 
}else{
$pages = 1;
}
}//page check finished
//Declare which record to start with
if (isset($_GET['s']) && is_numeric
($_GET['s'])) {//already been calculated
$start = $_GET['s'];
}else{
$start = 0;
}
// Make the query: 
$q = "SELECT fname, lname, username, email, DATE_FORMAT(registration_date, '%d %M, %Y') 
AS regdat, user_id FROM users ORDER BY registration_date ASC LIMIT $start, $pagerows";

$result = @mysqli_query ($dbcon, $q); // Run the query.
$members = mysqli_num_rows($result);
if ($result) { // If it ran OK, display the records.
// Table header.
echo '<table>
<tr><td><b>Edit</b></td>
<td><b>Delete</b></td>
<td><b>First Name</b></td>
<td><b>Last Name</b></td>
<td><b>User Name</b></td>
<td><b>Email</b></td>
<td><b>Date Registered</b></td>
</tr>';
// Fetch and print the records:
while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
echo '<tr>
<td><a href="edit_record.php?id=' . $row['user_id'] . '">Edit</a></td>
<td><a href="delete_record.php?id=' . $row['user_id'] . '">Delete</a></td>
<td>' . $row['fname'] . '</td>
<td>' . $row['lname'] . '</td>
<td>' . $row['username'] . '</td>
<td>' . $row['email'] . '</td>
<td>' . $row['regdat'] . '</td>
</tr>';
}
 echo '</table>'; // Close the table
 mysqli_free_result ($result); // Free up the resources
} else { // If it failed to run
// Error message
 echo '<p class="error">The current users could not be retrieved. We apologize for 
any inconvenience.</p>';
 // Debug message
 echo '<p>' . mysqli_error($dbcon) . '<br><br />Query: ' . $q . '</p>';
} // End of if ($result)
//Now display the figure for the total number of records/members #8
$q = "SELECT COUNT(user_id) FROM users";
$result = @mysqli_query ($dbcon, $q);
$row = @mysqli_fetch_array ($result, MYSQLI_NUM);
$members = $row[0];
mysqli_close($dbcon); // Close the database connection #9
echo "<p>Total membership: $members</p>";
if ($pages > 1) { 
echo '<p>';
//What number is the current page?
$current_page = ($start/$pagerows) + 1;
//If the page is not the first page then create a Previous link
if ($current_page != 1) {
echo '<a href="register-view_users-page.php?s=' . ($start - $pagerows) . 
'&p=' . $pages . '">Previous</a> ';
}

//Create a Next link
if ($current_page != $pages) {
echo '<a href="register-view_users-page.php?s=' . ($start + $pagerows) . 
'&p=' . $pages . '">Next</a> ';
}
echo '</p>';
}
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
