<?php
/** Route action
 * @param 
 * @return 
 */
function router()
{
    // echo ' ROOOUUUTIIINNNG ' ;

    if (!isset($_SESSION['userLogged'])) {
        isUserLogged();
    } else {
        findRoute();
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

    if (count($arguments) == "4"){
        $destination = explode('=', $arguments[0]);
        $action = explode('=', $arguments[1]);    
        $id = explode('=', $arguments[2]);
        $idPlus = explode('=', $arguments[3]);
        $route = [$destination[1], $action[1], $id[1], $idPlus[0]];
        switcher($route);
    }
    if(count($arguments) == "3"){
        $destination = explode('=', $arguments[0]);
        $action = explode('=', $arguments[1]);    
        $id = explode('=', $arguments[2]);
        $idPlus[0]='';
        $route = [$destination[1], $action[1], $id[1], $idPlus[0]];
  
    } else {
        $route = ['recipes','list','all',''];
        switcher($route);
    }
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
    var_dump($route);?>
    </br>
    <?php
    echo 'SWITCHER';

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
                            verifyUpdateRecipe($idPlus);
                            break;
                        case 'add':
                            verifyAddRecipeAndForm();
                            break;
                        case 'remove':
                            verifyDeleteRecipe($idPlus);
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
            break;
    }
}
