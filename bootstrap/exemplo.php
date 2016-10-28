<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $post=1;
  //echo isset($_POST['fname']);
  if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['psword1']) && !empty($_POST['psword2'])){
    //Código para colocar dados na BD e depois redirecionar com a função header()
    $apresentar_formulario=0;
  }
  else
    $apresentar_formulario=1;
}
else
{
  $apresentar_formulario=1;
}
?>

<?php
if ($apresentar_formulario==1){
  ?>
  <!doctype html>
  <html lang="pt">
  <head>
    <title>Registo</title>
    <meta charset=utf-8>
    <style type="text/css">
      .error { color:red; font-size:105%; font-weight:bold; text-align:center;}
    </style>
  </head>
  <body>
    <h2>Register</h2>
    <form action="registo.php" method="post">
      <p><label class="label" for="fname">Primeiro Nome:</label><input id="fname" type="text" name="fname" size="30" maxlength="30" value="<?php if (isset($_POST['fname'])) echo $_POST['fname']; ?>"><span class="error"> <?php if($post==1 && empty($_POST['fname'])) echo "Falta o primeiro nome"; ?></span></p>
      <p><label class="label" for="lname">Apelido:</label><input id="lname" type="text" name="lname" size="30" maxlength="40" value="<?php if (isset($_POST['lname'])) echo $_POST['lname']; ?>"></p>
      <p><label class="label" for="email">Email:</label><input id="email" type="email" name="email" size="30" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" > </p>
      <p><label class="label" for="psword1">Password:</label><input id="psword1" type="password" name="psword1" size="12" maxlength="12" value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1']; ?>" >&nbsp;Entre 8 e 12 caracteres.</p>
      <p><label class="label" for="psword2">Confirmar Password:</label><input id="psword2" type="password" name="psword2" size="12" maxlength="12" value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2']; ?>" ></p>
      <p><input id="submit" type="submit" name="submit" value="Registar">
      <input type="reset" name="reset" value="Limpar Campos"></p>
    </form>
  </body>
  </html>
  <?php } ?>