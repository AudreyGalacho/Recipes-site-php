<?php

/** Display button of user owner recipes
 * @param array
 * @return string
 */
function buttonOwnerUptateRemove($recipe)
{
    if ($recipe['author'] === $_SESSION['userMail']) {
        $buttonOwener =
            '<div class="ownerButton">
                <a class="text-decoration-none" href="?recipes/form/update/'. $recipe['recipe_id'].'">
                    <input type="button" class="btn btn-outline-warning" value="Modifier">
                </a>
                <a class="text-decoration-none" href="?recipes/form/remove/'. $recipe['recipe_id']. '>">
                    <input type="button" class="btn btn-outline-danger" value="Effacer">
                </a>
            </div>';
        return $buttonOwener;
    }
}

/** Display button return on main page
 * @param 
 * @return string
 */
function backButton(){
    $buttonBack = 
        '<a class="buttonBack text-decoration-none" href="http://localhost/recipeSite/?recipes/list/all">
            <input type="button" class="btn btn-secondary" value="Retour" name="Retour">
        </a>';
    return $buttonBack;
}
/** Display button return on main page
 * @param 
 * @return string
 */
function logOutButton() //Le bouton pour retourner à la page acceuil qui pourra servir de bouton juste retour un jour
{
    $buttonLogOut = 
    '<a class="log-out text-decoration-none" href="http://localhost/recipeSite/?user/log/out">
        <input type="button" class="btn btn-secondary" value="Déconnexion" name="Déconnexion">
    </a>';
    return $buttonLogOut;    
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
