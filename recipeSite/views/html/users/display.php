<?php

/** Display button deconnexion user
 * @param 
 * @return string
 */
function logOutButton() //Le bouton pour retourner à la page acceuil qui pourra servir de bouton juste retour un jour
{
    $buttonLogOut =
        '<a class="log-out text-decoration-none" href="/recipeSite/?user/log/out">
        <input type="button" class="btn btn-secondary" value="Déconnexion" name="Déconnexion">
    </a>';
    return $buttonLogOut;
}
