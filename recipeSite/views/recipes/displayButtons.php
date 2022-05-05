<?php

/** Display button navigation bettewen recipe full display
 * @param array
 * @return 
 */

function buttonOwnerUptateRemove($recipe)
{
    if ($recipe['author'] === $_SESSION['userMail']) {
?>

        <form>
            <a href="?destination=recipes?action=form?id=update?<?php echo $recipe['recipe_id']; ?>">
                <input type="button" class="btn btn-outline-warning" value="Modifier">
            </a>
            <a href="?destination=recipes?action=form?id=remove?<?php echo $recipe['recipe_id']; ?>">
                <input type="button" class="btn btn-outline-danger" value="Effacer">
            </a>
        </form>

    <?php
    }
}
/** Display button return on main page
 * @param 
 * @return 
 */
function backButton() //Le bouton pour retourner à la page acceuil qui pourra servir de bouton juste retour un jour
{
?>
    <form>
        <a href="http://localhost/recipeSite/?destination=recipes?action=list?id=all">
            <input type="button" class="btn btn-secondary" value="Retour" name="Retour">
        </a>
    </form>
<?php
}


/** Display button navigation bettewen recipe full display
 * @param string
 * @return 
 */

function navigationRecipes($idPlus)
{
    $recipeNext = getNextRecipe($idPlus); //GET NEXT RECIPE IN THE TABLE
    $recipePrev = getPreviewRecipe($idPlus); //GET PREVIEWS RECIPE IN THE TABLE

//  button Previews recipe
    if ($recipePrev == NULL) { 
    ?>
    
        <a href="?destination=recipes?action=list?id=one?<?php echo $idPlus; ?>" class="previous round">&#8249;</a>
    <?php
    } else {
        var_dump($recipePrev['recipe_id']);
    ?>
        <a href="?destination=recipes?action=list?id=one?<?php echo $recipePrev['recipe_id']; ?>" class="previous round">&#8249;</a>
    <?php
    }
//  button Next recipe
    if ($recipeNext == NULL) {
    ?>
        <a href="?destination=recipes?action=list?id=one?<?php echo $idPlus; ?>" class="next round">&#8250;</a>
    <?php
    } else {
        var_dump($recipeNext['recipe_id']);
    ?>
        <a href="?destination=recipes?action=list?id=one?<?php echo $recipeNext['recipe_id']; ?>" class="next round">&#8250;</a>
<?php
    }
}
