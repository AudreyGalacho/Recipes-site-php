<?php
if (isset($_POST['email'])) {
    $i = 0;
    while (!isset($_SESSION['userLogged']) && $i < count($usersAll)) {

        if  ( ($usersAll[$i]['email'] === $_POST['email']) &&
            ($usersAll[$i]['password'] === $_POST['password']) ) {

                $_SESSION['userLogged'] = $usersAll[$i]['full_name'];
                $_SESSION['userMail'] = $usersAll[$i]['email'];
        }
        ++$i;
    }
    if (!isset($_SESSION['userLogged'])) {
        echo 'utilisateur/password non valide';
    }
}

if (!isset($_SESSION['userLogged'])) {
?>
    <p> Vous devez être enregistré pour accéder aux recettes. </p>
    
    <form method="POST" action="/Site_recettes/index.php">
        <label for="email">Email</label>
        <input type="email" placeholder="your@email.com" name="email" required="required">

        <label for="password">Password</label>
        <input type="password" placeholder="password" name="password" required="required">

        <input type="submit" value="envoyer">
    </form>

<?php
} else {
?>
    <p>
        Bonjour <?php echo $_SESSION['userLogged'] ?> bienvenu!!!
    </p>
<?php
}
?>