<?php
session_start();
include_once('app/database.php');
include_once('repository/recipes.php');
include_once('repository/nav.php');
include_once('repository/users.php');
include_once('views/routerDirection.php');
?>

<!DOCTYPE html>
<html>
<?php include_once('html/head.php'); ?>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('html/header.php'); ?>
    <section>
        <div class="container-fluid px-5">
           
            <?php
            isUserLogged();
            $chemin=findRoute();
            router($chemin[0],$chemin[1]);
            ?>

        </div>
    </section>
    <?php include_once('html/footer.php'); ?>
</body>

</html>