<div class="container">
    <h2>Suppression de " <?php echo $title; ?>" :</h2>
    <form action="" method="POST">
        <fieldset>
            <legend>Auteur</legend>
            <?php echo ($_SESSION['userMail']); ?>
        </fieldset>
        </br>
        <fieldset>
            <legend>La recette</legend>
            <input type="hidden" class="form-control" id="id" name="id" <?php echo 'value="' . $id . '"'; ?>>

            <label for="title" class="form-label">Titre:</label></br>
            <h3><?php echo $title; ?></h3>
            </br>

            </br><label for="abstract" class="form-label">Recette:</label></br>
            <textarea class="full-text" readonly><?php echo $abstract; ?></textarea>
        </fieldset>
        </br>
        <div>Souhaitez-vous supprimer définitivement votre recette?</div>
        <button class="btn btn-outline-danger" value="Effacer">
            Supprimer
        </button>
        <?php
        backButton();
        ?>
    </form>
</div>
