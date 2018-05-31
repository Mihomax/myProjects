
<?php
    // Connect to the database server
    $MySQLi = new MySQLi("localhost", "root", "root", "bdfilms");
    if ($MySQLi->errno) {
        printf("Probleme de connexion au serveur de bd:<br /> %s",
        $MySQLi->error);
        exit();
} else
    printf("Connection réussie avec la base de données");
?>