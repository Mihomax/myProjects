<?php
    $connect = mysqli_connect("localhost", "root", "root", "bdfilms") or
    die("Please, check your server connection.");
    $query = "SELECT email_address, password FROM customers
    WHERE email_address like '" . $_POST['emailaddress'] . "' " .
       "AND password like (PASSWORD('" . $_POST['password'] . "'))";
    $result = mysqli_query($connect, $query) or die(mysql_error());
    if (mysqli_num_rows($result) == 1) {
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            extract($row);
            echo "Bienvenue sur le site MAHOMAX <br>";
        }
}
else { ?>
    Adresse courriel et / ou le mot de passe est invalide<br>
    Non inscrit?
    <a href="index.html">Cliquez ici</a> pour s'inscrire.<br><br><br>
    Vous voulez essayer à nouveau<br>
    <a href="index.html">Cliquez ici</a> pour essayé de se connecter.<br>
    <?php
} ?>