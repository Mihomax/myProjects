<?php
  <div class="form">
	<h3>Créer un compte</h3>
		<form action="addcustomer.php" method="post" onsubmit="return validate(this)">
		<input type="text" name="Username" placeholder="Nom d'utilisateur" required="">
		<input type="password" name="password" id="passwdmsg" placeholder="Mot de passe" required="">
		<input type="password" name="repassword" id="repasswdmsg" placeholder=" Confirmer mot de passe" required="">
		<input type="email" name="Email" id="emailmsg" placeholder="Courriel" required="">
		<input type="submit" value="Enregistrer">
		</form>
    </div>
?>
