<?php
session_start();
include_once('app/includeAll.php');
?>

<!DOCTYPE html>
<html>
<?php require('views/html/body/head.php'); ?>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('views/html/body/header.php'); ?>
    <section class="container">
        <?php
        router();
        ?>
    </section>
    <?php include_once('views/html/body/footer.php'); ?>
</body>

</html>