<?php
function verfyAddRecipeAndForm()
{
    
    if (!isset($_POST['recipe']) || !isset($_POST['title'])) {
        include('html/addRecipeForm.php');
    } else {
        $titleNew = htmlspecialchars($_POST['title']);
        $abstracNew = htmlspecialchars($_POST['recipe']);
        $author = $_SESSION['userMail'];
        $recipe = [$titleNew , $abstracNew , $author];
        // Verif si recette ok
        $resultCheck = checkRecipeAdd($recipe);
        if ($resultCheck == false) {
            include('html/addRecipeForm.php');
        }
        if ($resultCheck == true) {
            //requete ajout dans base
            addRecipe($titleNew,$abstracNew,$author);
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
    $recipe = getRecipeById($id);

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
        //recup recipe by id
        //rerif author recipe id match session user logged
        //
    }

            ?>