<div class="container">
    <h3>Modification de "<?php echo $title; ?>":</h3>
    <form action="" method="POST">
        <fieldset>
            <legend>Auteur :</legend>
            <?php echo $authorID; ?>

        </fieldset>
        </br>
        <fieldset>
            <legend>La recette :</legend>

            <input type="hidden" class="form-control" id="id" name="id" <?php echo 'value="' . $id . '"'; ?>>

            <label for="title" class="form-label">Titre</label>
            <input type="text" row="5" class="form-control" id="title" name="title" required="required" <?php echo 'value="' . $title . '"'; ?>>
            <div class="invalid-feedback">
                Il faut un titre a cette recette.
            </div>
            </br>

            <label for="abstract" class="form-label">Recette</label>
            <textarea rows="10" class="form-control" id="abstract" name="abstract" required="required"> <?php echo $abstract; ?></textarea>
            <div class="invalid-feedback">
                Il faut une description a cette recette.
            </div>
        </fieldset>
        </br>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>