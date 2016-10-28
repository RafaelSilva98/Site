<!DOCTYPE html>
<html lang=pt>

	<head>

	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Registo</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<style type="text/css">
				p.error { 
					color:red; 
					font-size:105%; 
					font-weight:bold; 
					text-align:center; 
				}
				.label {
					color:black;
					font-family: arial;
					font-size:100%; 
				
				}

		</style>

	</head>

<body>
	<div class="container">
		<div class="row">
		
		<?php include("mysqli_connect.php"); ?>


		

		<div class="col-md-6 col-md-offset-3"> 	
		
		<legend>Registo</legend>

		<form action="error.php" method="POST">
			<p><label class="label" for="fname">Primeiro Nome:</label><br/>
		<input id="fname" type="text" name="fname" size="30" maxlength="30"
			value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>"></p>
			<p><label class="label" for="lname">Último Nome:</label><br/>
		<input id="lname" type="text" name="lname" size="30" maxlength="40"
			value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>"></p>

		<input id="sexoM" name="sexo" type="radio" value="M" tabindex="5" >
            <label class="choice">Masculino</label>
        <input id="sexoF" name="sexo" type="radio" value="F" tabindex="5" >
            <label class="choice">Feminino</label>
			</label></p>
			<p><label class="label" for="email">Endereço de E-mail:</label><br/>
		<input id="email" type="email" name="email" size="30" maxlength="60" 
			value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
			<p><label class="label" for="psword1">Password:</label><br/>
		<input id="psword1" type="password" name="psword1" size="12" minlength="8" maxlength="12"
			value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>" >&nbsp; Entre 8 e 12 caracteres.</p>
		<p><label class="label" for="psword2">Confirmar Password:</label><br/>
			<input id="psword2" type="password" name="psword2" size="12" minlength="8" maxlength="12"
			value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>" ></p>

		<label class="label"><?php include('mathcaptcha.php');?> <input name="captcha" type="text"></label><br/>
		<input type="hidden" name="v1" value="<?php echo $n1; ?>">
		<input type="hidden" name="v2" value="<?php echo $n2; ?>">
		
		<p><input id="submit" type="submit" name="submit" value="Registar">
		<input id="reset" type="reset" name="reset" value="Limpar campos"></p>
					</form>
			
				</div>
			</div>
		</div>
		 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		 <!-- Include all compiled plugins (below), or include individual files as needed -->
		 <!-- Latest compiled and minified JavaScript -->
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</body>
</html>