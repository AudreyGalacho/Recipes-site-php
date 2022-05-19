<div class="container">
    <h1>Ajout de recette</h1>
    <form action="" method="POST">
        <fieldset>
            <legend>Auteur</legend>
            <?php echo $_SESSION['userMail']; ?>

        </fieldset>
        </br>
        <fieldset>
            <legend>La recette</legend>

            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required="required">
            <div class="invalid-feedback">
                Il faut un titre a cette recette.
            </div>

            <label for="abstract" class="form-label">Recette</label>
            <textarea class="form-control" rows="5" placeholder="Détails de votre recette" id="abstract" name="abstract" required="required"></textarea>
            <div class="invalid-feedback">
                Il faut une description a cette recette.
            </div>
        </fieldset>
        </br>
        <button type="submit" class="btn btn-primary">Envoyer</button> <?php echo backButton(); ?>
    </form>
</div>