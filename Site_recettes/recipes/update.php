<?php
$getData = $_GET;
//Recupération de bdd et header
include_once('../blocs/bddCo.php');
include_once('recipesAll.php');
include_once('../users/usersAll.php');
include_once('../functSql.php');

if (!isset($_SESSION['userLogged'])) {
    echo 'Vous n\'êtes pas enregistré!';
    include_once('../users/login.php');
    include_once('../blocs/footer.php');
    exit();
}
$recipe = recipeByIdVerrif($getData['id']);

$authorID = $recipe['author'];
if ($_SESSION['userMail'] !== $authorID) {
    echo 'Oh..Oh.. Vous n\'avez pas le droit de modifier cette recette!!';
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
    <title>Site de Recettes-Modification_de_votre_recette</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body class="d-flex flex-column min-vh-100">
<?php include_once('../blocs/header.php'); ?>
    <div class="container">
        <h3>Modification de "<?php echo $titleID; ?>":</h3>
        <form action="updatePost.php" method="POST">
            <fieldset>
                <legend>Auteur :</legend>
                <?php echo $_SESSION['userMail']; ?>

            </fieldset>
            </br>
            <fieldset>
                <legend>La recette :</legend>

                <input type="hidden" class="form-control" id="id" name="id" <?php echo 'value="' . $id . '"'; ?>>

                <label for="title" class="form-label">Titre</label>
                <input type="text" row="5" class="form-control" id="title" name="title" required="required" <?php echo 'value="' . $titleID . '"'; ?>>
                <div class="invalid-feedback">
                    Il faut un titre a cette recette.
                </div>
                </br>

                <label for="recipe" class="form-label">Recette</label>
                <textarea rows="10" class="form-control" id="recipe" name="recipe" required="required"> <?php echo $recipeID; ?></textarea>
                <div class="invalid-feedback">
                    Il faut une description a cette recette.
                </div>
            </fieldset>
            </br>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </div>
    <?php
    include_once('../blocs/footer.php');
    ?>
</body>