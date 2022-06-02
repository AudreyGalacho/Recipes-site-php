<?php

/** Route action
 * @param //url
 * @return //switch to controler apropriate
 */
function router()
{
    //$url = 'http://localhost/recipeSite/?recipes/list/one/13'; TEST
    $url = $_SERVER['REQUEST_URI'];    

    //Get url and explode arguments
    $extention = (parse_url($url, PHP_URL_QUERY));
    $arguments = explode('/', $extention);

    // get 4 arguments to get all needed
    if (count($arguments) == "4") {
        // echo(' 4 arguments get ');
        $route = $arguments;
        // var_dump($route);
        switcher($route);
        return;
    }
    if (count($arguments) == "3") {
        // echo(' 3 arguments get ');
        $route = $arguments;
        $idPlus = '';
        array_push($route, $idPlus);
        switcher($route);
        return;
    } else {
        // echo ' Other Road ';
        $route = ['recipes', 'list', 'all', ''];
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

    switch ($destination) {
        case 'recipes':
            include_once('model/verifForms.php');
            switch ($action) {
                case 'list':
                    switch ($id) {
                        case 'all':
                            displayAllRecipes();
                            break;
                        case 'my_recipes':
                            displayUserListRescipes();
                            break;
                        case 'author':
                            displayAuthorRecipies($idPlus);
                            break;
                        case 'one':
                            displayOneRecipe($idPlus);
                            break;
                        default:
                            echo 'recettes défault';
                            break;
                    }
                    break;
                case 'form':
                    switch ($id) {
                        case 'update':
                            doUpdateRecipe($idPlus);
                            break;
                        case 'add':                        
                            doAddRecipe();
                            break;
                        case 'remove':
                            doDeleteRecipeRecap($idPlus);
                            break;
                        default:
                            break;
                    }
                    break;
                default:
                    break;
            }
            break;
        case 'user':
            switch ($action) {
                case 'log':
                    switch ($id) {
                        case 'in':
                            logUserWindow();
                            break;
                        case 'out':
                            doUserLogOut();
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
                            logUserWindow();
                            // echo 'form contact switcher';
                            include_once('views/html/recipes/formulaires/contactForm.php');
                            break;
                        default:
                            echo 'contact défault';
                            break;
                    }
                    break;
                default:
                    // echo 'action défault';
                    break;
            }
            break;
        default:
            break;
    }
}
