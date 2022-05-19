<?php

/** Route action
 * @param 
 * @return 
 */
function router()
{
    // echo ' ROOOUUUTIIINNNG ' ;
    findRoute();
}
/** Url decomposition to router
 * @param string
 * @return string|string
 */
function findRoute()
{
    // echo ' FIND ROAD ';

    $url = $_SERVER['REQUEST_URI'];
    // $url = 'http://localhost/recipeSite/?recipes/list/one/13';

    $extention = (parse_url($url, PHP_URL_QUERY));
    $arguments = explode('/', $extention);
    // $argument = explode('/', $arguments);
    // var_dump(count($arguments));

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

    // echo ' SWITCHER ';
    switch ($destination) {
        case 'recipes':
            switch ($action) {
                case 'list':
                    switch ($id) {
                        case 'all':
                            messageLog();
                            displayAllRecipes();
                            break;
                        case 'my_recipes':
                            if (!isset($_SESSION['userMail'])) {
                                messageLog();
                                errAcces();
                                echo backButton();
                                return;
                            }
                            $myRecipies = recipeByAuthorJoinUser($_SESSION['userMail']);
                            messageLog();
                            echo backButton();
                            displayMyListRescipes($myRecipies);
                            break;
                        case 'author':
                            messageLog();
                            $recipeByAuthor = recipeByAuthorJoinUser($idPlus);
                            displayListRecipes($recipeByAuthor);
                            break;
                        case 'one':
                            messageLog();
                            // display one recipe by title (full text) and commentry form
                            $tableJoin = recipeJoinUser(); //jointure table
                            $recipeJoinGet = getRecipeJoin($idPlus, $tableJoin); //fetch id match
                            displayFullRecipe($recipeJoinGet);
                            // include('html/users/commentryForm.php');
                            break;
                        default:
                            echo 'recettes défault';
                            break;
                    }
                    break;
                case 'form':
                    include_once('controller/crudFunctionsRecipe.php');
                    include_once('controller/verifForms.php');
                    switch ($id) {
                        case 'update':
                            verifyUpdateRecipe($idPlus);
                            break;
                        case 'add':
                            if (!isset($_SESSION['userMail'])) {
                                messageLog();
                                errAcces();
                                echo backButton();
                                return;
                            }
                            verifyAddRecipeAndForm();
                            break;
                        case 'remove':
                            verifyDeleteRecipe($idPlus);
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
                            isUserLogged();
                            break;
                        case 'out':
                            userLogOut();
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
                            messageLog();
                            // echo 'form contact switcher';
                            include_once('html/formulaires/contactForm.php');
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
