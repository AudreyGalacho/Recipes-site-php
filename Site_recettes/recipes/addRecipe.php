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
    <?php
    include_once('../blocs/header.php');
    ?>
    <div class="container">
        <?php
        if (!isset($_SESSION['userLogged'])) {
            echo 'Vous n\'êtes pas enregistré!';
            include_once('../users/login.php');
        ?>
    </div>
<?php
            include_once('../blocs/footer.php');
            exit();
        }
?>

<h1>Ajout de recette</h1>

<form action="submitRecipe.php" method="POST">
    <fieldset>
        <legend>Auteur</legend>
        <?php echo $_SESSION['userMail']; ?>

    </fieldset>
    </br>
    <fieldset>
        <legend>La recette</legend>

        <label for="title" class="form-label">Titre</label>
        <input type="text" class="form-control" id="title" name="title" required="required">
        <div class="invalid-feedback">
            Il faut un titre a cette recette.
        </div>

        <label for="recipe" class="form-label">Recette</label>
        <textarea class="form-control" rows="5" placeholder="Détails de votre recette" id="recipe" name="recipe" required="required"></textarea>
        <div class="invalid-feedback">
            Il faut une description a cette recette.
        </div>
    </fieldset>
    </br>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
</div>
<?php
include_once('../blocs_fixes/footer.php');
?>
</body>

</html>