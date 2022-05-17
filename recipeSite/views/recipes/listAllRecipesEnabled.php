<?php

/** Display recipes detail and for recipes belong user logged buttons modif/errase
 * @param array|array
 * @return string
 */
function displayListRecipes(array $recipes)
{
    // include_once('views/users/displayAuthor.php');
    // $usersAll =getAllUsers();
    // echo('Function display recipelist');
    
    echo '<div class="container-fluid">';
        
    foreach ($recipes as $recipe) {
        $dspRecipe = displayRecipe($recipe);
        $dspEndRecipeAuthor = displayAuthor($recipe);
?>
        <article>
            <?php echo $dspRecipe . $dspEndRecipeAuthor;
            echo buttonOwnerUptateRemove($recipe); ?>
        </article>
<?php
    }
    echo '</div>';
    
}

/** Display user Logged recipes detail and for recipes belong user logged buttons modif/errase
 * @param array|array
 * @return string
 */
function displayMyListRescipes(array $recipes)
{
    foreach ($recipes as $recipe) {
        $dspRecipe = displayRecipe($recipe);
        ?>
        <article>
            <?php 
            echo $dspRecipe . buttonOwnerUptateRemove($recipe);
            ?>  
        </article>
<?php
    }
    backButton();
}


