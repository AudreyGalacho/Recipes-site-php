<!-- Connection à la base de donnée -->
<?php
    try { // On se connecte à MySQL
        $mysqlClient = new PDO(
            'mysql:host=localhost;port=8889;dbname=my_recipes;charset=utf8',
            'lupi',
            'test',
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION],
        );
    }
    catch(Exception $e) {    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
    }
?>

