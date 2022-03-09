<?php

include_once('../blocs/bddCo.php');
include_once('../blocs/functions.php');

// requete pour trouver les recettes de l'utilisateur loggé----------------------------------------------------------------------

$userRequest = $_SESSION['userMail'];

$sqlQuery = 'SELECT * FROM recipes WHERE author = :author ORDER BY title';
try {
    $recipesStatement = $mysqlClient->prepare($sqlQuery);
    $recipesStatement->execute([
        'author' => $userRequest,
    ]);
    $recipesByAuthor = $recipesStatement->fetchAll();
} catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Vos recettes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php
    include_once('../blocs/header.php');
    ?>
    <div class="container">
        <h1>Vos recettes !</h1>
        <div class="card-body">
            <?php
            include_once('../users/login.php');

            if (isset($_SESSION['userLogged'])) {
                foreach ($recipesByAuthor as $recipe) {
                    echo displayRecipe($recipe); // Fonction d'affichage des recettes
            ?>
                    <form>
                        <a href="update.php?id=<?php echo $recipe['recipe_id']; ?>">
                            <input type="button" value="Modifier">
                        </a>
                        <a href="deleteRecipe.php?id=<?php echo $recipe['recipe_id']; ?>">
                            <input type="button" value="Effacer">
                        </a>
                    </form>
            <?php
                }
            }
            ?>
        </div>
    </div>
    <?php
    include_once('../blocs/footer.php');
    ?>
</body>

</html>