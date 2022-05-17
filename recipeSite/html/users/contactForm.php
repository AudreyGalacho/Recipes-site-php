<div class="container">
    <h1>Contactez nous</h1>

    <form action="contactSubmit.php" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">
                Email
            </label>
            <input type="email" class="form-control" id="email" required="required" name="email" aria-describedby="email-help">
            <div id="email-help" class="form-text">
                Nous ne revendrons pas votre email.
            </div>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label">
                Votre message
            </label>
            <textarea class="form-control" placeholder="Exprimez vous" required="required" id="message" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button> <?php echo backButton(); ?>
    </form>

</div>