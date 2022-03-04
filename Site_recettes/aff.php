<?php
require_once('blocs/bddCo.php');
include_once('users/usersAll.php');
include_once('recipes/recipesAll.php');
include_once('blocs/functions.php');
include_once('recipes/recipeByAuthor.php');
include_once('functSql.php');
?>
</br>
<?php 

foreach ($recipesByAuthor as $recipes) {
    //var_dump( $recipes);

    $dspRecipe = displayRecipe($recipes);
    $dspEndRecipeAuthor= displayAuthor($recipes['author'], $usersAll);
?>
    <p>
        <?php //echo $dspRecipe . $dspEndRecipeAuthor?>
    </p>
<?php
}
//FONCTION D'AFF ALL RECIPE+ AUTEURs

?>
</br>
<?php
 dspAllRescipes($recipesActiv,$usersAll);

?>