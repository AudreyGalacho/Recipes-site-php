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
        echo (' Other Road ');
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
    // var_dump($route);
?>
    </br>
<?php
    // echo ' SWITCHER ';
    // var_dump($route);
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
                        case 'one':
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
                            // echo 'form contact switcher';
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

