<?php

/** Function verify the recipe add and add if all ok 
 * @param  
 * @return bool
 */
function verifyAddRecipeAndForm()
{

    if (!isset($_POST['abstract']) || !isset($_POST['title'])) {
        include('html/recipes/addRecipeForm.php');
        backButton();
        return;
    } else {
        $titleNew = htmlspecialchars($_POST['title']);
        $abstracNew = htmlspecialchars($_POST['abstract']);
        $author = $_SESSION['userMail'];
        $recipe = [$titleNew, $abstracNew, $author];
        // Verif si recette ok
        $resultCheck = checkRecipe($recipe);
        if ($resultCheck == false) {
            include('html/recipes/addRecipeForm.php');
            backButton();
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

/** Function verif owner recipe and recap the recipe to delete 
 * @param  
 * @return bool
 */
function verifyDeleteRecipe($id)
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
                backButton();
                return;
            }
            if (isset($_POST['id'])) {
                deleteConfirm();
            ?>
        <div class="alert alert-success" role="alert">
            Recette supprimée!
        </div>
    <?php
                switcher(['recipes', 'list', 'all', '']);
                return;
            } else {
    ?></br><?php
                // echo 'ON VA DELETE';
                $id = $recipe['recipe_id'];
                // affichage du recap de la recette
                $title = $recipe['title'];
                $abstract = $recipe['abstract'];
                include('html/recipes/deleteForm.php');
            }
        }
        /** Function verify the recipe to delete and if all ok delete
         * @param  
         * @return bool
         */
        function deleteConfirm()
        {
            $id = ($_POST['id']);
            $recipe = getRecipeById($id);
            $authorID = $recipe['author'];

            // echo  $authorID, $id;

            if ($_SESSION['userMail'] !== $authorID) {
                echo 'Oh..Oh.. Vous n\'avez pas le droit de supprimer cette recette!!';
                echo 'Vous êtes ' . $_SESSION['userMail'] . ' et non ' . $authorID . '!';
                backButton();
                return;
            } else {
                removeRecipesById($id);
                switcher(['recipe', 'list', 'all', '']);
            }
        }
        /** Function verify the recipe update and if all ok update databe
         * @param  string
         * @return bool
         */
        function verifyUpdateRecipe($id)
        {

            $recipe = getRecipeById($id);

            $authorID = $recipe['author'];
            $abstract = $recipe['abstract'];
            $title = $recipe['title'];


            if ($_SESSION['userMail'] !== $authorID) {
                ?> <p class="debug-display">Oh..Oh.. Vous n'avez pas le droit de modifier cette recette!!
            </br>
            <?php
                echo 'Vous êtes ' . $_SESSION['userMail'] . ' et non ' . $authorID . '!';
            ?>
        </p> <?php
                backButton();
                return;
            }
            if (!isset($_POST['abstract']) || !isset($_POST['title'])) {
                include('html/recipes/modifRecipeForm.php');
                backButton();
                return;
            } else {

                $titleNew = htmlspecialchars($_POST['title']);
                $abstracNew = htmlspecialchars($_POST['abstract']);
                $id = $_POST['id'];
                $recipe = [$titleNew, $abstracNew];
                // Verif si recette ok
                $verifEmpty = checkEmptyRecipe($title, $abstract);
                // var_dump($verifEmpty) ;


                if ($verifEmpty == true) {
                    include('html/recipes/modifRecipeForm.php');
                    backButton();
                    return;
                } else {
                    //requete ajout dans base
                    updateRecipesById($titleNew, $abstracNew, $id);
                ?>
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <p>Recette modifiée avec succès</p>
                </div>
<?php
                    switcher(['recipes', 'list', 'all', '']);
                }
            }
        }
