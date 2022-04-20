<?php

/** Verify form add recipe
 * @param array 
 * @return bool
 */
function checkRecipeAdd($recipe)
{

    $title = $recipe[0];
    $abstract = $recipe[1];

    $verifEmpty = checkEmptyRecipe($title, $abstract);
    if ($verifEmpty == true) {
        return false;
    }
    $verifTwinRecipe = checkTwinRecipe($title, $abstract);
    if ($verifTwinRecipe == true) {
        return false;
    }
    if ($verifEmpty == false && $verifTwinRecipe == false) {
        $title = htmlspecialchars($title);
        $abstract = htmlspecialchars($abstract);
        //Requète d'insertion
        echo 'Tout est OK...';
        return true;
    }
}

/** Verify double recipes in Table recipes
 * @param string
 * @return bool 
 */
function checkTwinRecipe($title, $abstract)
{
    // MEME TITRE   
    $recipeGetByTitle = getRecipeByTitle($title);
    $recipeGetByAbstract = getRecipeByAbstract($abstract);
    
    // if (($recipeGetByAbstract == null) || ($recipeGetByTitle == null)){

    // }
    if ($recipeGetByTitle !== false) {
        if ($recipeGetByTitle[1] == $title) {
            errMessageSameTitle();
            return true;
        }
    }
    // MEME ABSTRACT
    if ($recipeGetByAbstract !== false) {
        if ($recipeGetByAbstract[2] == $abstract) {
        errMessageSameAbstract();
        return true;
    }
}
    
    // if ((getRecipeByTitle($title) !== $title) &&
    //     (getRecipeByAbstract($abstract) !== $abstract)
    // ) {
    //     return false;
    // }
}
/** Verify double recipes in Table recipes
 * @param string 
 * @return bool 
 */
function checkEmptyRecipe($title, $abstract)
{
    if (empty($abstract)) {
?>
        <div class="alert alert-warning" role="alert">
            Le descriptif est vide ! Comment voulez vous suivre la recette?!
        </div>
    <?php
        return true;
    }
    if (empty($title)) {
    ?>
        <div class="alert alert-warning" role="alert">
            Cette recette n'a pas de titre!
        </div>
        <?php
        return true;
    }
    if ((!empty($abstract)) && (!empty($title))) {
        return false;
    }
}
