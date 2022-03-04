<!-- Connection à la base de donnée -->
<?php
include_once('../blocs/bddCo.php');
include_once('recipesAll');
include_once('../users/usersAll.php');
include_once('../blocs/functions.php');

// Si tout va bien, on peut continuer

if (!isset($_POST['recipe']) || !isset($_POST['title'])) {
    echo 'Il faut un titre et du contenu a cette recette.';
    return;
}
if (empty($_POST['recipe']) || empty($_POST['title'])) {
    echo 'Les champs titre ou description ne doivent pas être vides.';
    return;
}
foreach ($recipes as $recipe) {
    if ($_POST['title'] === $recipe['title']) {
        echo 'Une recette à déjà le même titre';
        echo 'mettre un retour sur la page form';
    }
    if ($_POST['recipe'] === $recipe['recipe']) {
        echo 'Une recette à déjà le même descriptif';
        header('Location: form/recipes_form.php');
        exit();
    }
}

$recipeID = htmlspecialchars($_POST['recipe']);
$titleID = htmlspecialchars($_POST['title']);
$author = $_SESSION['userMail'];
$is_enabled = 1;


//Requète d'insertion
$sqlQuery = 'INSERT INTO `recipes`(`title`, `recipe`, `author`, `is_enabled`) VALUES (:title, :recipe, :author, :is_enabled)';
$insertRecipe = $mysqlClient->prepare($sqlQuery);
$insertRecipe->execute([
    'title' => $titleID,
    'recipe' => $recipeID,
    'author' => $author,
    'is_enabled' => $is_enabled,
]);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('../blocs/header.php'); ?>
    <div class="container">
        <h1>Recette bien reçue! </h1>
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Rappel de votre recette:</h5>
                <p class="card-text"><b>Auteur</b> : <?php echo $_SESSION['userLogged']; ?></p>
                <p class="card-text"><b>Titre</b> : <?php echo $titleID; ?></p>
                <pre class="card-text"><b>Recette</b> : <?php echo $recipeID; ?></pre>
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