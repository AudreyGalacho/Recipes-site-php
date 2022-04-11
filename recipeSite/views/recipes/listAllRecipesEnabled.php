<?php

/** Display recipes detail and for recipes belong user logged buttons modif/errase
 * @param array|array
 * @return string
 */
function displayListRecipes(array $recipesActiv)
{
    include_once('views/users/displayAuthor.php');
    $usersAll =getAllUsers();
    foreach ($recipesActiv as $recipe) {
        $dspRecipe = displayRecipe($recipe);
        $dspEndRecipeAuthor = displayAuthor($recipe['author'], $usersAll);
?>
        <article class="cadre">
            <p class="card-text">
                <?php echo $dspRecipe . $dspEndRecipeAuthor;
               include('displayUserRecipeOwnerButtons.php');
                }
        ?>
            </p>
        </article>
<?php
    }

/** Display MY recipes detail and for recipes belong user logged buttons modif/errase
 * @param array|array
 * @return string
 */
function displayMyListRescipes(array $recipesActiv)
{
    foreach ($recipesActiv as $recipe) {
        $dspRecipe = displayRecipe($recipe);
        ?>
        <article class="cadre">
            <p class="card-text">
                <?php echo $dspRecipe;
                include('displayUserRecipeOwnerButtons.php');
                }
        ?>
            </p>
        </article>
<?php
    }


