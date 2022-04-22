<?php
session_start();
include_once('app/includeAll.php');
?>

<!DOCTYPE html>
<html>
<?php include_once('html//body/head.php'); ?>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('html/body/header.php'); ?>
    <section>
        <div class="container-fluid px-5">
            <?php
            router();
            ?>

        </div>
    </section>
    <?php include_once('html/body/footer.php'); ?>
</body>

</html>