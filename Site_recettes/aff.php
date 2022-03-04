<?php
require_once('blocs/bddCo.php');
include_once('users/usersAll.php');
include_once('recipes/recipesAll.php');
include_once('blocs/functions.php');
include_once('recipes/recipeByAuthor.php');
include_once('functSql.php');

echo 'c INCLU';
?>
</br>

<?php 

$recipeId = '3';
$recipeGet = recipeByIdVerrif($recipeId);
echo displayRecipe($recipeGet);


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

?>