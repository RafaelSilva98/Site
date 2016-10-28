
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

			 
			 // As passowords são diferentes? 
			 	if (!empty($_POST['psword1'])) {

						$p = trim($_POST['psword1']);
			 		}
			 	

				else { 
					$errors[] = 'Não introduziu palavra-passe.';
			 	}
			}

			

			
		 //Feedback de preenchimento dos campos

			if (empty($errors)) { 	// Se não houver problemas de registo
				require ('mysqli_connect.php'); // Conectar à base de dados.

		
			 } //empty($errors)

			else { // Mostra os erros

		 		echo "<h2>Ups!</h2> <p>Erro:<br></p>";

		 	foreach ($errors as $msg) { // Imprime o erro
				 echo " - $msg<br>\n";
		 	}

		 	echo '<p><h3>Por favor tente de novo.</h3><br></p>';
		 	}// End of else (empty($errors)) 
		 	 
		?>

