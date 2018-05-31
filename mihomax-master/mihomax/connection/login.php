<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Mihomax connexion</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body style=" background-image: url(bgd.jpg)";>
  <div class="header" style="background: #ad0e0e; font-family: 'Helvetica Neue', Helvetica, Arial, 'sans-serif'"; font-size: 10px>
  	<h2 >connection</h2>
  </div>
	 
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
  		<label>Pseudo</label>
  		<input type="text" name="username" >
  	</div>
  	<div class="input-group">
  		<label>Mot de passe</label>
  		<input type="password" name="password">
  	</div>
  	<div class="input-group">
  		<button type="submit" class="btn" name="login_user">SE CONNECTER</button>
  	</div>
  	<p>
  		Avez vous un compte? <a href="register.php">S'INSCRIRE</a>
  	</p>
  </form>
</body>
</html>
