<?php
include_once('../blocs/bddCo.php'); //Connection à la base de donnée
include_once('recipesAll.php');
include_once('../blocs/header.php');
include_once('../blocs/functions.php');
include_once('../functSql.php');
$postData = $_POST;

if (!isset($postData['recipe']) || !isset($postData['title'])) { //Vérif que le formulaire a été posté
    echo ('Il faut un titre et du contenu a cette recette.');
    include_once('../blocs/footer.php');
    exit();
}

if ((strlen($postData['recipe']) === 0) || (strlen($postData['title']) === 0)) { //Et que les champs ne sont pas vides
    echo ('Les champs titre ou description ne doivent pas être vides.');
    include_once('../blocs/footer.php');
    exit();
}
$recipe= recipeByIdVerrif($postData['id']);

$authorID = $recipe['author'];

if ($_SESSION['userMail'] !== $authorID) {
    echo 'Oh..Oh.. Vous n\'avez pas le droit de modifier cette recette!!';
    echo 'Vous êtes ' . $_SESSION['userMail'] . ' et non ' . $authorID . '!';
    include_once('../blocs/footer.php');
    exit();
}

$recipe = htmlspecialchars($_POST['recipe']);
$title = htmlspecialchars($_POST['title']);
$id = htmlspecialchars($_POST['id']);

//Requète d'insertion

$sqlQuery = 'UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id';
try {
    $insertRecipe = $mysqlClient->prepare($sqlQuery);
    $insertRecipe->execute([
        'title' => $title,
        'recipe' => $recipe,
        'id' => $id,
    ]);
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
    <title>Site de Recettes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('../blocs/header.php'); ?>
    <div class="container">
        <h2>Recette bien reçue! </h1>
        <div class="card">
            <div class="card-body">
                <h3 class="card-title">Rappel de la recette</h3>
                <h6 class="card-text"><b>Titre</b> : <?php echo $title; ?></h6>
                <p class="card-text"><b>Recette</b>:</br> <?php echo $recipe; ?></p>
                <p class="card-text"><b>Auteur</b> : <?php echo $_SESSION['userLogged']; ?></p>
            </div>
        </div>
</br>
        <?php
        backButton('index.php');
        ?>
    </div>
    <?php include_once('../blocs/footer.php'); ?>
</body>

</html>