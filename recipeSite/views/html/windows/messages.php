<?php

/************************************** ERROR MESSAGES **************************************************/
function errMessageSameTitle()
{
  echo '<div class="alert alert-warning position-absolute" role="alert">
    <p>
      Une recette a déjà le même titre!!!
    </p>
  </div>';
}

function errMessageSameAbstract()
{
  echo '<div class="alert alert-warning position-absolute" role="alert">
    <p>
      Une recette a déjà le même contenu!!!
    </p>
  </div>';
}

function errAccesUnauthorized()
{
  echo '<div class="alert alert-warning position-absolute" role="alert">
    <p> 
      401 Unauthorized ; Vous devez être enregistré pour accèder à cette partie !!
    </p>
  </div>';
}

function errAccesForbidden($author)
{
  echo '<div class="alert alert-warning position-absolute" role="alert">
    <p>
      403 Forbidden ; Oh..Oh.. Vous n\'avez pas de droits sur recette!!</br>
      Vous êtes ' . $_SESSION['userMail'] . ' et non ' . $author . '!
    </p>
   </div>';
}

/************************************** SUCCES MESSAGES **************************************************/


function messageLogInSucces()
{
  echo '<div class="alert alert-success position-absolute" role="alert">
    Vous êtes connecté!
  </div>';

}
function messageLogOutSucces()
{
  echo '<div class="alert alert-success position-absolute" role="alert">
    Vous êtes bien déconnecté!
  </div>';
}
function messageLogErr()
{
  echo '<p class="debug-display"> Utilisateur inconnu </p>';
}

function messageAddRecipeSucces()
{
  echo '<div class="alert alert-success position-absolute" role="alert">
    <p> Recette Ajoutée! </p>
    </div>';
}

function messageUpdateRecipeSucces()
{
  echo ' <div class="alert alert-success position-absolute d-flex align-items-center" role="alert">
  <p>Recette modifiée avec succès</p>
  </div>';
}

function messageDeleteRecipeSucces()
{
  echo '<div class="alert alert-success position-absolute" role="alert">
  Recette supprimée!
</div>';
}