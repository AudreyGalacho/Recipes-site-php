<?php

/** Display one recipe  
 * @param array 
 * @return string
 */
function displayRecipe(array $recipe): string // Fonction d'affichage d'une recette
{
    // echo('Fonction display recipe');
    $recipe_content = '<h3 class= "card-title">' . '<a class="text-decoration-none text-reset" href="http://localhost/recipeSite/?recipes/list/one/' . $recipe['recipe_id'] . '">' . $recipe['title'] . '</a></h3>';
    $recipe_content .= '<p class="hide-text card-text text-justify ">' . $recipe['abstract'] . '</p>';
    return $recipe_content;
}

/** Display one recipe detail and for recipes belong user logged buttons modif/errase and commentry form  
 * @param array 
 * @return string
 */
function displayFullRecipe(array $recipe) // Fonction d'affichage d'une recette avec commentaires
{
    // echo '  Function display full recipe!!!   ';
    
    $idRecipe = $recipe['recipe_id'];
    // var_dump($recipe);

    $recipe_content = '<div class= "full-text">' .
        '<h3 class= "card-title">' .
        $recipe['title'] . '</h3>';
    $recipe_content .= '<p style="white-space:pre-wrap" class= "full-text card-text text-justify" readonly>' . $recipe['abstract'] . '</p>';

    $dspEndRecipeAuthor = displayAuthor($recipe['author'],$recipe);
    $recipe_content .= $dspEndRecipeAuthor . '</br>';

?>
    <article>
        <?php
        navigationRecipes($idRecipe);
        echo $recipe_content;
        ?>
        <div class="fullButtonRecipe">
            <?php
             echo buttonOwnerUptateRemove($recipe) . backButton();
            ?>
        </div>
    </article>
<?php
    exit;
    return;
}
