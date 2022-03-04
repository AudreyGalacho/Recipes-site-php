<?php
$postData = $_POST;

if (!isset($postData['email'])) {
    echo 'Il faut nous faut un mail pour nous contacter';
    exit();
}
$email = ($postData['email']);

if (!isset($postData['message'])) {
    echo 'Il faut un message pour soumettre le formulaire.';
    return;
}
$message = htmlspecialchars($postData['message']);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Site de Recettes - Contact reçu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">

        <?php include_once('../blocs/header.php'); ?>
        <h1>Message bien reçu !</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Rappel de vos informations</h5>
                <p class="card-text"><b>Email</b> : <?php echo $email; ?></p>
                <p class="card-text"><b>Message</b> : <?php echo strip_tags($message); ?></p>
            </div>
        </div>
    </div>
    <?php
    include_once('../blocs/footer.php');
    ?>
</body>
</html>