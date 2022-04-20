<div class="container">
    <h3>Modification de "<?php echo $recipeGet['title']; ?>":</h3>
    <form action="updatePost.php" method="POST">
        <fieldset>
            <legend>Auteur :</legend>
            <?php echo $_SESSION['userMail']; ?>

        </fieldset>
        </br>
        <fieldset>
            <legend>La recette :</legend>

            <input type="hidden" class="form-control" id="id" name="id" <?php echo 'value="' . $recipeGet['recipe_id'] . '"'; ?>>

            <label for="title" class="form-label">Titre</label>
            <input type="text" row="5" class="form-control" id="title" name="title" required="required" <?php echo 'value="' . $recipeGet['title'] . '"'; ?>>
            <div class="invalid-feedback">
                Il faut un titre a cette recette.
            </div>
            </br>

            <label for="recipe" class="form-label">Recette</label>
            <textarea rows="10" class="form-control" id="recipe" name="recipe" required="required"> <?php echo $recipeGet['abstract']; ?></textarea>
            <div class="invalid-feedback">
                Il faut une description a cette recette.
            </div>
        </fieldset>
        </br>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>