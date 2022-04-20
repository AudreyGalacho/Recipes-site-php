<?php
function verfyAddRecipeAndForm()
{

    if (!isset($_POST['recipe']) || !isset($_POST['title'])) {
        include('html/recipes/addRecipeForm.php');
    } else {
        $titleNew = htmlspecialchars($_POST['title']);
        $abstracNew = htmlspecialchars($_POST['recipe']);
        $author = $_SESSION['userMail'];
        $recipe = [$titleNew, $abstracNew, $author];
        // Verif si recette ok
        $resultCheck = checkRecipeAdd($recipe);
        if ($resultCheck == false) {
            include('html/recipes/addRecipeForm.php');
        }
        if ($resultCheck == true) {
            //requete ajout dans base
            addRecipe($titleNew, $abstracNew, $author);
?>
            <div class="alert alert-success" role="alert">
                Recette Ajoutée!
            </div>
    <?php
            switcher(['recipes', 'list', 'all', '']);
        }
    }
}


function verfyDeleteRecipe($id)
{
    include_once('repository/recipes.php');
    $recipe = getRecipeById($id);

    ?></br><?php
    var_dump($recipe['recipe_id']);
    $authorID = $recipe['author'];

    if ($_SESSION['userMail'] !== $authorID) {
        echo 'Oh..Oh.. Vous n\'avez pas le droit de supprimer cette recette!!';
    ?></br><?php
        echo 'Vous êtes ' . $_SESSION['userMail'] . ' et non ' . $authorID . '!';

        return;
    } else {
    ?></br><?php
        echo 'ON VA DELETE';
        $id = $recipe['recipe_id'];
        // affichage du recap de la recette
        $title = $recipe['title'];
        $abstract = $recipe['abstract'];
        include('html/recipes/deleteForm.php');


        
    }
}
