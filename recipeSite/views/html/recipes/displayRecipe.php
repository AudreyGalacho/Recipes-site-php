<?php

/** Display one recipe  
 * @param array 
 * @return string
 */
function displayRecipe(array $recipe): string // Fonction d'affichage d'une recette
{
    // echo('Fonction display recipe');
    $recipe_content = '<h3 class= "card-title">' . '<a class="text-decoration-none text-reset" href="/recipeSite/?recipes/list/one/' . $recipe['recipe_id'] . '">' . $recipe['title'] . '</a></h3>';
    $recipe_content .= '<p class="hide-text card-text text-justify ">' . $recipe['abstract'] . '</p>';
    return $recipe_content;
}

/** Display author in full name instead of mail adress
 * @param array
 * @return string
 */

function displayAuthor($recipe) //Affichage de l'auteur en nom complet
{        
    $authorRecipeFullName = $recipe['full_name'] . ' (' . $recipe['age'] . ' ans)';
    $recipeAuthor = '<i><a class="text-decoration-none text-reset text-end" href="/recipeSite/?recipes/list/author/'.$recipe['author'].'">' . $authorRecipeFullName . '</a></i>';
    return $recipeAuthor;
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

    $dspEndRecipeAuthor = displayAuthor($recipe);
    $recipe_content .= $dspEndRecipeAuthor;

?>
    <div class="container" 
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
    </div>
<?php
    exit;
    return;
}

/** Display list recipes (hide version) and for recipes belong user logged buttons modif/errase
 * @param array|array
 * @return string
 */
function displayListRecipes(array $recipes)
{
    echo '<div class="container-fluid">';

    foreach ($recipes as $recipe) {
        $dspRecipe = displayRecipe($recipe);
        $dspEndRecipeAuthor = displayAuthor($recipe);
?>
        <article class="list">
            <?php echo $dspRecipe . $dspEndRecipeAuthor;      
            echo buttonOwnerUptateRemove($recipe); ?>
        </article>
    <?php
    }
    echo '</div>';
}



