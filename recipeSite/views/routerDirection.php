<?php
function router($destination, $action)
{
    echo ' ROOOUUUTIIINNNG '.'</br>';
    include_once('routerRedir.php');
    include_once('recipes/listAllRecipesEnabled.php');
    include_once('users/displayForms.php');
    if (!isset($destination) || (!isset($action))) {
        $destination = '';
        $action = '';
    } 
    if (!$_SESSION['userLogged']) {
        routerDefault();
    } else {
        switcher($destination,$action);
    }
        
}
/** Url decomposition to router
 * @param string
 * @return string|string
 */
function findRoute(){
    $url = $_SERVER['REQUEST_URI']; 
    echo $url.'url recup par $_serveur'.'</br>';

    $extention = (parse_url($url, PHP_URL_QUERY));

    $arguments = explode('?',$extention);
    // echo $arguments[0].' '.$arguments[1]. ' 1er EXPLODE ';
    $destination = explode('=',$arguments[0]);
    // echo $destination[0].' '.$destination[1]. ' 2er EXPLODE ';
    $action = explode('=',$arguments[1]);
    // echo $action[0].' '.$action[1]. ' 3er EXPLODE ';
    // $idRecipe = explode('=',$arguments[2]);
    // echo $action[0].' '.$action[1]. ' 3er EXPLODE ';
    $route =[$destination[1],$action[1]];
    var_dump($route);
    return $route;
}

/** Switch action Url
 * @param string|$string
 * @return 
 */
function switcher($destination ,$action){
    echo ' SWTICHER ';
    switch ($destination) {
        case 'recettes':
            switch ($action) {
                case 'list':
                    echo ' Aff list all recipes/';
                    displayAllRecipes();
                    break;
                case 'mes-recettes':
                    echo 'MES RECETTES ';
                    echo $_SESSION['userMail'];
                    $myRecipies=getRecipesByAuthor($_SESSION['userMail']);
                    displayMyListRescipes($myRecipies);

                    break;
                case 'modification':
                    #..
                    break;
                case 'ajout':
                    displayFormRecipe();
                    break;
                case 'suppression':
                    # code...
                    break;

                default:
                    # code...
                    break;
            }
            break;

        case 'contact':
            switch ($action) {
                case 'formulaire':
                    displayFormContact();
                    break;
                default:
                    # code...
                    break;
            }
            break;

        default:
            echo ' Par défault ';
            break;
        
    }
}

