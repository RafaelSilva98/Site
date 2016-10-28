
<?php
		 // This script performs an INSERT query(consulta) that adds a record to the users table.
			if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
		 		$errors = array(); // Inicializa a variavel erro.
		 	
			 // Inseriu o primeiro nome?
			 	if (empty($_POST['fname'])) {
					$errors[] = 'Não introduziu o primeiro nome.';
			 		}
				else { 
					$fn = trim($_POST['fname']);
			 	}

			 // Inseriu o Apelido?
			 	if (empty($_POST['lname'])) {
			 		$errors[] = 'Não introduziu o último nome.';
			 	}
				else { 
				$ln = trim($_POST['lname']);
				}
			// Inseriu o género?
				if (empty($_POST['sexoM']) && empty($_POST['sexoF'])) {
					$errors[] = 'Não introduziu o seu género.';
			 		}
			 	else{
			 		if (empty($_POST['sexoM'])){
			 			$s = $_POST['sexoF'];
			 		}
			 		else{
			 			$s = $_POST['sexoM'];
			 		}	
			 	}


			 		

			 // Introduziu o e-mail?
			 	if (empty($_POST['email'])) {
			 		$errors[] = 'Não introduziu o e-mail.';
			 	}
				else { 
					$e = trim($_POST['email']);
			 	}

			 // As passowords são diferentes? 
			 	if (!empty($_POST['psword1'])) {

			 		if ($_POST['psword1'] != $_POST['psword2']) {
			 			$errors[] = 'As passwords que introduziu não são iguais.';
			 		}

					else {
						$p = trim($_POST['psword1']);
			 		}
			 	}

				else { 
					$errors[] = 'Não introduziu palavra-passe.';
			 	}
			}

			//Captcha			
			if(!empty($_POST['captcha']) && $_POST["captcha"]==$_POST['v1'] + $_POST['v2']){

				$sucess = 1;
			}
			else{
				if(empty($_POST['captcha']))
					$errors[] = 'Captcha errado. --> '.$_POST['v1']." + ".$_POST['v2']." = ?";
				else{
				$sucess = 0;
				$errors[] = 'Captcha errado. --> '.$_POST['v1']." + ".$_POST['v2']." = ".$_POST['captcha'];
				}
			}

			
		 //Feedback de preenchimento dos campos

			if (empty($errors) && $sucess = 1) { 	// Se não houver problemas de registo
				require ('mysqli_connect.php'); // Conectar à base de dados.

		 // Inserir os dados
				$q = "INSERT INTO users (fname, lname, sexo, email, psword, registration_date) VALUES ('$fn', '$ln', '$s','$e', SHA1('$p'), NOW() )"; 

				$result = @mysqli_query ($dbcon, $q); // Run the query. 

				if ($result) { // Se teve sucesso a registar. 
					header ("location: login.php"); 
					exit(); 
				}

				else { // Se tiver erros..
					// MSG erro
					echo "<h2>Falha de registo.</h2> <p class='error'> Não conseguimos registá-lo devido a um erro. Tentaremos corrigi-lo o mais rapidamente possível. </p>";

				// Depuração:
					echo '<p>' . mysqli_error($dbcon) . '<br><br>Query: ' . $q . '</p>';
					} // Fim do if ($result)

			 mysqli_close($dbcon); // Fechar a conexão a base de dados
			 	include ("footer.php");
			 	exit();
			 } //empty($errors)

			else { // Mostra os erros

		 		echo "<h2>Ups!</h2> <p>Erro:<br></p>";

		 	foreach ($errors as $msg) { // Imprime o erro
				 echo " - $msg<br>\n";
		 	}

		 	echo '<p><h3>Por favor tente de novo.</h3><br></p>';
		 	}// End of else (empty($errors)) 
		 	 
		?>

