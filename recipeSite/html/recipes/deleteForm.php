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
            <?php echo $title; ?>
            </br>

            </br><label for="abstract" class="form-label">Recette:</label></br>
            <?php echo $abstract; ?>
        </fieldset>
        </br>
        <div>Souhaitez-vous supprimer définitivement votre recette?</div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
            Supprimer
        </button>
        <?php
        backButton('index.php');
        ?>
    </form>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Supprimer définitivement ? </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="ficheRecapRecipe"class="modal-body">
                Recette : <?php echo $title; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button id="deleteConfirm" type="button" class="btn btn-secondary" onclick="exeDelete()">Supprimer définitivement !</button>
                <script>
                    document.getElementById("deleteConfirm").addEventListener("click", deleteConfirm);

                    function deleteConfirm() {
                        // document.getElementById("deleteConfirm").innerHTML = "YOU CLICKED ME!";
                        //    sqldelete and redirection
                        document.getElementById("ficheRecapRecipe").innerHTML = "YOU CLICKED ME!<?php echo $id;?>";
                        removeRecipesById($id);
                        switcher(['recipes', 'list', 'all', '']);
                    }
                </script>

            </div>
        </div>
    </div>
</div>