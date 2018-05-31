<?php
  <div class="form">
	<h3>Créer un compte</h3>
		<form action="validate.php" method="post">
		<input type="text" name="username" placeholder="Nom d'utilisateur" required="">
		<input type="password" name="password" placeholder="Mot de passe" required="">
		<input type="password" name="repassword" placeholder=" Confirmer mot de passe" required="">
		<input type="email" name="emailaddress" placeholder="Courriel" required="">
		<input type="submit" value="Enregistrer">
		</form>
    </div>
?>
