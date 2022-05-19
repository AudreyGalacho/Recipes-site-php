<div class="container">
    <h2><u>Suppression de " <?php echo $title; ?>" :</u></h2>
    <form action="" method="POST">
        <fieldset>
            <legend>Auteur</legend>
            <?php echo ($_SESSION['userMail']); ?>
        </fieldset>
        </br>
        <fieldset>
            <legend>La recette</legend>
            <input type="hidden" class="form-controller" id="id" name="id" <?php echo 'value="' . $id . '"'; ?>>
            <h5><?php echo $title; ?></h5>
            </br>
            <p style="white-space:pre-wrap" class= "full-text card-text text-justify" readonly><?php echo $abstract; ?></p>
        </fieldset>
        </br>
        <div><strong>Souhaitez-vous supprimer définitivement votre recette?</strong></div>
        <button class="btn btn-outline-danger" value="Effacer">
            Supprimer
        </button>
        <?php
        echo backButton();
        ?>
    </form>
</div>
