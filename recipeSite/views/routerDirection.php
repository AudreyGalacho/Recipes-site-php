<?php
/** Route action
 * @param 
 * @return 
 */
function router()
{
    echo ' ROOOUUUTIIINNNG ' . '</br>';

    if (!isset($_SESSION['userLogged'])) {
        
        isUserLogged();
    }
    if (isset($_SESSION['userLogged'])) {

        $route = findRoute();

        if (!isset($route[0]) || !isset($route[1]) || !isset($route[2])){
            $destination = 'recipes';
            $action = 'list';
            $id ='all';
            switcher($destination, $action, $id);
        } else {
            switcher($route[0], $route[1], $route[2]);
        }
    }
}
/** Url decomposition to router
 * @param string
 * @return string|string
 */
function findRoute()
{
    $url = $_SERVER['REQUEST_URI'];
    $extention = (parse_url($url, PHP_URL_QUERY));
    $arguments = explode('?', $extention);
    var_dump($arguments);
    $destination = explode('=', $arguments[0]);
    $action = explode('=', $arguments[1]);    
    $id = explode('=', $arguments[2]);
    if (count($arguments) == 3){
        $idPlus[0]='';
    } else { 
        $idPlus = explode('=', $arguments[3]);
    }
    $route = [$destination[1], $action[1], $id[1], $idPlus[0]];
    switcher($route);
}
/** Switch action Url
 * @param array
 * @return 
 */
function switcher($route)
{
    $destination = $route[0];
    $action = $route[1];
    $id = $route[2];
    $idPlus = $route[3];

    echo ' SWTICHER ';
    switch ($destination) {
        case 'recipes':
            switch ($action) {
                case 'list':
                    switch ($id) {
                        case 'all':
                            displayAllRecipes();
                            break;
                        case 'my_recipes':
                            $myRecipies = getRecipesByAuthor($_SESSION['userMail']);
                            displayMyListRescipes($myRecipies);
                            break;
                        case 'author':
                            $recipeByAuthor = getRecipesByAuthor($idPlus);
                            displayListRecipes($recipeByAuthor);
                            break;
                        default:
                            echo 'recettes défault';
                            break;
                    }
                    break;
                case 'form':
                    include_once('views/recipes/crudFunctionsRecipe.php');
                    switch ($id) {
                        case 'update':
                            echo 'on essay la modif de recipe';
                            $recipeGet = getRecipeById($idPlus);
                            include_once('html/modifRecipeForm.php');
                            break;
                        case 'add':
                            verfyAddRecipeAndForm();
                            break;
                        case 'remove':
                            # code...
                            break;
                        case 'verif':
                            # code...
                            break;
                        default:
                            # code...
                            break;
                    }
                    break;

                default:
                    # code...
                    break;
            }
            break;
        case 'user':
            switch ($action) {
                case 'log':
                    switch ($id) {
                        case 'in':
                            isUserLogged();
                            break;
                        case 'out':
                            # code...
                            break;
                        default:
                            # code...
                            break;
                    }
                    break;
                case 'comment':
                    switch ($id) {
                        case 'add':
                            # code...
                            break;
                        case 'remove':
                            # code...
                            break;
                        default:
                            # code...
                            break;
                    }
                    break;

                case 'contact':
                    switch ($id) {
                        case 'form':
                            include('views/users/displayForms.php');
                            displayFormContact();
                            break;
                        default:
                            echo 'contact défault';
                            break;
                    }
                    break;
                default:
                    echo 'contact défault';
                    break;
            }
            break;
        default:
            echo ' Par défault ';
            break;
    }
}
