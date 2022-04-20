<?php
function displayAllRecipes()
{
    echo 'display all recipes';
    $usersAll = getAllUsers();
    $recipesAll = getAllRecipesOrdered();
    displayListRecipes($recipesAll, $usersAll);
}

function displayFormLog()
{
    echo 'form LOG';
    $usersAll = getAllUsers();
    isUserLogged($_POST, $usersAll);
}

function routerDefault()
{
    $usersAll = getAllUsers();
    isUserLogged($_POST, $usersAll);
}

function backButton() //Le bouton pour retourner à la page acceuil qui pourra servir de bouton juste retour un jour
{
?>
    <form>
        <a href="http://localhost/recipeSite/?destination=recipes?action=list?id=all">
            <input type="button" class="btn btn-secondary" value="Retour" name="Retour">
        </a>
    </form>
<?php
}

