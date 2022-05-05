<?php

/** Display recipes detail and for recipes belong user logged buttons modif/errase
 * @param array|array
 * @return string
 */
function displayListRecipes(array $recipesActiv)
{
    include_once('views/users/displayAuthor.php');
    $usersAll =getAllUsers();
    echo('Function display recipelist');
    foreach ($recipesActiv as $recipe) {
        $dspRecipe = displayRecipe($recipe);
        $dspEndRecipeAuthor = displayAuthor($recipe['author'], $usersAll);
?>
        <article>
            <?php echo $dspRecipe . $dspEndRecipeAuthor;
            buttonOwnerUptateRemove($recipe); ?>
        </article>
<?php
    }
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
        <article>
            <?php echo $dspRecipe;
            buttonOwnerUptateRemove($recipe);
            ?>  
        </article>
<?php
    }
}


