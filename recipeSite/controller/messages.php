<?php
function messageLog()

{
    if (isset($_SESSION['userLogged'])){
        $messageWelcome = '<aside class="logMessage"><p> Bonjour ' . $_SESSION['userLogged'] . ' bienvenu !!!</p>';
        echo $messageWelcome;
        echo logOutButton() . '</aside>';
        return;
    }
    // echo 'on est dans l\'affichage du log';
    isUserLogged(); //on exe pour savoir s'il y a eu une entree au log
    // var_dump(isUserLogged());
    if (isUserLogged() == false)  {
        $messageWelcome = include('html/windows/userLogIn.php');
        return $messageWelcome;
    }

    if (isUserLogged() == true ){
    $messageWelcome = '<aside class="logMessage"><p> Bonjour ' . $_SESSION['userLogged'] . ' bienvenu !!!</p>';
    echo $messageWelcome;
    echo logOutButton() . '</aside>';
    return;
    }
}



function errMessageSameTitle()
{
?>
  <div class="alert alert-warning position-absolute" role="alert">
    Une recette a déjà le même titre!!!
  </div>
<?php
}

function errMessageSameAbstract()
{
?>
  <div class="alert alert-warning position-absolute" role="alert">
    Une recette a déjà le même contenu!!!
  </div>
<?php
}

function errAcces()
{
?>
  <div class="alert alert-warning position-absolute" role="alert">
    <p>Vous devez être enregistré pour accèder à cette partie</p>
  </div>
<?php
}
?>