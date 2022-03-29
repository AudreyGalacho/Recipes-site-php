<?php
include_once('config.php');
    try { // On se connecte à MySQL
        $mysqlClient = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";port=".DB_PORT.";charset=".DB_CHARSET, 
            USER_NAME,
            USER_PASSWORD,
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        echo 'Connexion à la bdd  .';
    }
    catch(Exception $e) {    // En cas d'erreur, on affiche un message et on arrête tout
        echo ' ERREUR /!\ ';
        die($e->getMessage());
    }
    global $mysqlClient;
?>
