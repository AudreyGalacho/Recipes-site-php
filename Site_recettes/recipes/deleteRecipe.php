<?php
$getData = $_GET;
//Recupération de bdd et header
include_once('../blocs/bddCo.php');
include_once('../blocs/header.php');
include_once('recipesAll.php');
include_once('../users/usersAll.php');
include_once('../functSql.php');

if (!isset($_SESSION['userLogged'])) {
    echo 'Vous n\'êtes pas enregistré!';
    include_once('../users/login.php');
    include_once('../blocs/footer.php');
    exit();
}

//requete pour trouver la recette correspondante a ID
$recipe =recipeByIdVerrif($getData['id']);

$authorID = $recipe['author'];
if ($_SESSION['userMail'] !== $authorID) {
    echo 'Oh..Oh.. Vous n\'avez pas le droit de supprimer cette recette!!';
    ?></br><?php
    echo 'Vous êtes ' . $_SESSION['userMail'] . ' et non ' . $authorID . '!';
    include_once('../blocs/footer.php');
    exit();
}
$titleID = $recipe['title'];
$recipeID = $recipe['recipe'];
$id = $recipe['recipe_id'];
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Site de Recettes-Suppression_de_votre_recette </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <h2>Suppression de " <?php echo $titleID; ?>" :</h2>
        <form action="deleteConfirm.php" method="POST">
            <fieldset>
                <legend>Auteur</legend>
                <?php echo ($_SESSION['userMail']); ?>
            </fieldset>
            </br>
            <fieldset>
                <legend>La recette</legend>
                <input type="hidden" class="form-control" id="id" name="id" <?php echo 'value="' . $id . '"'; ?>>

                <label for="title" class="form-label">Titre:</label></br>
                <?php echo $titleID; ?>
                </br>

                </br><label for="recipe" class="form-label">Recette:</label></br>
                <?php echo $recipeID; ?>
            </fieldset>
            </br>
            <div>Souhaitez-vous supprimer définitivement votre recette?</div>
            <button type="submit" class="btn btn-primary">Supprimer</button>
        </form>
    </div>
    <?php
    include_once('../blocs/footer.php'); ?>
</body>

</html>