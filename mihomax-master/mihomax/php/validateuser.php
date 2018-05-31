<?php

require_once("../BD/connexion.inc.php");
	$email=$_POST['emailaddress'];
    $password=$_POST['password'];
    
    if(!($email==="admin@admin.ca" && $password==="maubelarm123")) {

        echo "Ca va etre l'environnement des usagers";
    }
	else {

		header( "Location: main.php" );
        
    }

?>


