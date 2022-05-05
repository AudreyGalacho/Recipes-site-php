<?php

/** Display button navigation bettewen recipe full display
 * @param array
 * @return 
 */

function buttonOwnerUptateRemove($recipe)
{
    if ($recipe['author'] === $_SESSION['userMail']) {
?>
        <div class="ownerButton">
            <form>
                <a href="?recipes/form/update/<?php echo $recipe['recipe_id']; ?>">
                    <input type="button" class="btn btn-outline-warning" value="Modifier">
                </a>
                <a href="?recipes/form/remove/<?php echo $recipe['recipe_id']; ?>">
                    <input type="button" class="btn btn-outline-danger" value="Effacer">
                </a>
            </form>
        </div>
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
        <a href="http://localhost/recipeSite/?recipes/list/all">
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
        <div class="navigationButton">
            <a href="?recipes/list/one/<?php echo $idPlus; ?>" class="previous round">&#8249;</a>
        <?php
    } else {
        // var_dump($recipePrev['recipe_id']);
        ?>
            <div class="navigationButton">
                <a href="?recipes/list/one/<?php echo $recipePrev['recipe_id']; ?>" class="previous round">&#8249;</a>
            <?php
        }


        //  button Next recipe
        if ($recipeNext == NULL) {
            ?>
                <a href="?recipes/list/one/<?php echo $idPlus; ?>" class="next round">&#8250;</a>
            </div>
        <?php
        } else {
            // var_dump($recipeNext['recipe_id']);
        ?>
            <a href="?recipes/list/one/<?php echo $recipeNext['recipe_id']; ?>" class="next round">&#8250;</a>
        </div>
<?php
        }
    }
