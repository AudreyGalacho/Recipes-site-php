<?php

/** Display recipes detail and for recipes belong user logged buttons modif/errase
 * @param array|array
 * @return string
 */
function displayAllRescipes(array $recipesActiv, $usersAll)
{
    include('displayRecipe.php');
    include('/Users/buutt//Documents/WEB-DEV/first-repository/recipeSite/views/users/displayAuthor.php');

    foreach ($recipesActiv as $recipe) {
        $dspRecipe = displayRecipe($recipe);
        $dspEndRecipeAuthor = displayAuthor($recipe['author'], $usersAll);
?>
        <article class="cadre">
            <p class="card-text">
                <?php echo $dspRecipe . $dspEndRecipeAuthor;
                if ($recipe['author'] === $_SESSION['userMail']) {
                ?>
            <form>
                <a href="recipes/update.php?id=<?php echo $recipe['recipe_id']; ?>">
                    <input type="button" value="Modifier">
                </a>
                <a href="recipes/deleteRecipe.php?id=<?php echo $recipe['recipe_id']; ?>">
                    <input type="button" value="Effacer">
                </a>
            </form>
        <?php
                }
        ?>
            </p>
        </article>
<?php
    }
}
