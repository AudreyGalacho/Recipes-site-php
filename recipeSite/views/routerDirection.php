<?php

/** Url decomposition to router
 * @param string
 * @return string|string
 */
function findRoute()
{
    $url = $_SERVER['REQUEST_URI'];
    $extention = (parse_url($url, PHP_URL_QUERY));

    $arguments = explode('?', $extention);
    // echo $arguments[0].' '.$arguments[1]. ' 1er EXPLODE ';
    $destination = explode('=', $arguments[0]);
    // echo $destination[0].' '.$destination[1]. ' 2er EXPLODE ';
    $action = explode('=', $arguments[1]);
    // echo $action[0].' '.$action[1]. ' 3er EXPLODE ';

    if ($arguments[2] === null) {
        $idRecipe[1] = '0';
    } else {
        $idRecipe = explode('=', $arguments[2]);
        // echo $action[0].' '.$action[1]. ' 3er EXPLODE ';
    }

    $route = [$destination[1], $action[1], $idRecipe[1]];
    var_dump($route);
    return $route;
}
/** Route action
 * @param string|$string
 * @return 
 */
function router($destination, $action, $id)
{
    echo ' ROOOUUUTIIINNNG ' . '</br>';
    include_once('routerRedir.php');
    include_once('recipes/listAllRecipesEnabled.php');
    include_once('users/displayForms.php');

    if (!isset($_SESSION['userLogged'])) {
        isUserLogged();
    }
    if (isset($_SESSION['userLogged'])) {
        if (!isset($destination) || (!isset($action))) {
            $destination = '';
            $action = '';
            switcher($destination, $action, $id);
        } else {
            switcher($destination, $action, $id);
        }
    }
}
/** Switch action Url
 * @param string|$string
 * @return 
 */
function switcher($destination, $action, $id)
{
    echo ' SWTICHER ';
    switch ($destination) {
        case 'recettes':
            switch ($action) {
                case 'list':
                    displayAllRecipes();
                    break;
                case 'mes-recettes':
                    $myRecipies = getRecipesByAuthor($_SESSION['userMail']);
                    displayMyListRescipes($myRecipies);
                    break;
                case 'modification':
                    echo 'on essay la modif de recipe';
                    $recipeGet = getRecipeById($id);
                    include_once('html/modifRecipeForm.php');
                    break;
                case 'ajout':
                    displayFormRecipe();
                    break;
                case 'suppression':
                    # code...
                    break;
                    case 'author':
                        var_dump($destination,$action,$id);
                        $recipeByAuthor=getRecipesByAuthor($id);
                        displayListRescipes($recipeByAuthor);
                        break;
                default:
                echo 'recettes défault';
                    break;
            }
            break;
        case 'contact':
            switch ($action) {
                case 'formulaire':
                    displayFormContact();
                    break;
                default:
                    echo 'contact défault';
                    break;
            }
            break;
            case 'user':
                switch ($action) {
                    case 'logIn':
                        break;
                    case 'logOut':
                        # code...
                        break;
                    default:
                        # code...
                        break;
                }# code...

                break;
        default:
            echo ' Par défault ';
            break;
    }
}
