<?php
if ($recipe['author'] === $_SESSION['userMail']) {
                ?>
            <form>
                <a href="?destination=recipes?action=form?id=update?<?php echo $recipe['recipe_id']; ?>">
                    <input type="button" class="btn btn-outline-warning" value="Modifier">
                </a>
                <a href="?destination=recipes?action=form?id=remove?<?php echo $recipe['recipe_id'] ?>">
                    <input type="button" class="btn btn-outline-danger" value="Effacer">
                </a>
            </form>
            <?php
}
?>