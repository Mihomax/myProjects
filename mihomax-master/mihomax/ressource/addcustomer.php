<?php
$connect = mysqli_connect("localhost", "root", "root", "bdfilms") or die
("Veuiller vérifiez la connexion du serveur.");
$email_address = $_POST['emailaddress'];
$password = $_POST['password'];
$repassword = $_POST['repassword'];
$sql = "INSERT INTO customers (email_address, password) VALUES ('$email_address',(PASSWORD('$password')))";
$result = mysqli_query($connect, $sql) or die(mysql_error());
if ($result)
{
?>
<p>
    Salut, <?php echo Bravo!; ?> votre compte est crée.</p>
<?php
} else {
    echo "Une erreur est survenue. Veuillez utiliser une adresse e-mail différente";
}
?>