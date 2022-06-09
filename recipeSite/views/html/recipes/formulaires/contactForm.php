<div class="container">

    <h1>Contactez nous</h1>
    <form action="" method="POST">
        <label for="email" class="form-label">Adresse mail</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="votre@mail.com">
        <small id="emailHelp" class="form-text text-muted">Nous ne revendrons pas votre email.</small>

        <label for="message" class="form-label">Votre message</label>
        <textarea class="form-control" placeholder="Exprimez vous" required="required" id="message" rows="3" name="message"></textarea>
        </br>
        <button type="submit" class="btn btn-primary">Envoyer</button> <?php echo backButton(); ?>
    </form>

</div>