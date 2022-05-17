<?php
session_start();
include_once('app/includeAll.php');
?>

<!DOCTYPE html>
<html>
<?php include_once('html//body/head.php'); ?>

<body class="d-flex flex-column min-vh-100">
    <?php include_once('html/body/header.php'); ?>
    <section class="container">
        <?php
        $tableJointure = recipeJoinUser();
        router();
        ?>
    </section>
    <?php include_once('html/body/footer.php'); ?>
</body>

</html>