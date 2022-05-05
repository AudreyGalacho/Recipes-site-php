<div class="container">
    <aside>
        <fieldset>
            Votre commentaire
        </fieldset>
        <form action="contactSubmit.php" method="POST">
            <div class="mb-3">
                <label for="user" class="form-label">userUame
                    <!-- USER FULL NAME Variable -->
                </label>
                <input type="text" class="form-control" id="nameUser" name="nameUser" readonly>
            </div>
            <div class="mb-3">
                <label for="comment" class="form-label">
                    Votre message
                </label>
                <textarea class="form-control" placeholder="Votre commentaire" required="required" id="comment" name="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
    </aside>
</div>