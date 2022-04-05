<?php
if ($recipe['author'] === $_SESSION['userMail']) {
                ?>
            <form>
                <a href="?destination=recettes?action=modification?id=<?php echo $recipe['recipe_id']; ?>">
                    <input type="button" value="Modifier">
                </a>
                <a href="deleteRecipe.php?id=<?php echo $recipe['recipe_id']; ?>">
                    <input type="button" value="Effacer">
                </a>
            </form>
            <?php
}
            ?>