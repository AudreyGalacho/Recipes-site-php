<?php

include_once('config.php');
    try { // On se connecte à MySQL
        $mysqlClient = new PDO(
            'mysql:host=DB_HOST;port=DB_PORT;dbname=DB_NAME;charset=utf8',
            'USER_NAME',
            'USER_PASSWORD',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
        echo 'on a passé la requete a la base de donnée';
        global $mysqlClient;
    }
    catch(Exception $e) {    // En cas d'erreur, on affiche un message et on arrête tout
        echo ' ERREUR /!\ ';
        die($e->getMessage());
    }
    echo ' on a passé la requete a la base de donnée ';
?>
