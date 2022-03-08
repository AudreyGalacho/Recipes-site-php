<?php
include_once('blocs/bddCo.php');
include_once('recipes/recipesAll.php');
include_once('users/usersAll.php');
include_once('blocs/functions.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Page d'accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('blocs/header.php'); ?>
    <div class="container">
        <h1>Site de Recettes !</h1>
        <div class="card-body">
            <?php
            include_once('users/login.php');
            if (isset($_SESSION['userLogged'])) {
                
                dspAllRescipes($recipesActiv, $usersAll);
            ?>
        </div>
    <?php
            }
    ?>
    </div>
    <?php include_once('blocs/footer.php'); ?>
</body>

</html>