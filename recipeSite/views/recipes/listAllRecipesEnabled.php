<?php

/** Display recipes detail and for recipes belong user logged buttons modif/errase
 * @param array|array
 * @return string
 */
function displayListRecipes(array $recipesJoin)
{
    // include_once('views/users/displayAuthor.php');
    // $usersAll =getAllUsers();
    // echo('Function display recipelist');
    
    echo '<div class="container-fluid px-5">';
        
    foreach ($recipesJoin as $recipe) {
        $dspRecipe = displayRecipe($recipe);
        $dspEndRecipeAuthor = displayAuthor($recipe['author'],$recipe);
?>
        <article>
            <?php echo $dspRecipe . $dspEndRecipeAuthor;
            buttonOwnerUptateRemove($recipe); ?>
        </article>
<?php
    }
    echo '</div>';
    
}

/** Display user Logged recipes detail and for recipes belong user logged buttons modif/errase
 * @param array|array
 * @return string
 */
function displayMyListRescipes(array $recipesJoin)
{
    foreach ($recipesJoin as $recipe) {
        $dspRecipe = displayRecipe($recipe);
        ?>
        <article>
            <?php echo $dspRecipe;
            buttonOwnerUptateRemove($recipe);
            
            ?>  
        </article>
<?php
    }
    backButton();
}


