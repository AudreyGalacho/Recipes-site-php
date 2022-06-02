<?php 
/**************************************************  CRUD/VERIF *********************************************/  

/** Edit recipe 
 * @param 
 * @return string|false
 */
function doEditRecipe($id)
{
    // get recipe from bdd
    $recipe = getRecipeById($id);

    // check if user logged and allowed
    if (!isset($_SESSION['userMail']) || $_SESSION['userMail'] !== $recipe['author']) {
        // 403 error HTTP for access rights exceptions
        /** @see https://developer.mozilla.org/fr/docs/Web/HTTP/Status */
        throw new \Exception('Vous n\'avez pas le droit d\'accéder à cette ressource', 403);

        errAccesForbidden($recipe['author']);
        backButton();
        return;
    }
    // verif if datas Post
    if (count($_POST)) {
        verifyRecipe();
        logUserWindow();
        include('views/html/formulaires/addRecipeForm.php');
        backButton();
        return;
    }
    //ADD recipe to db
    $recipe = [$titleNew, $abstracNew, $author];
    createRecipe($recipe);
}
/** Add recipe in database 
 * @param array
 * @return string|false
 */
function doAddRecipe()
{

    //user verification
    if (!isset ($_SESSION['userMail'])) {
        // 403 error HTTP for access rights exceptions
        /** @see https://developer.mozilla.org/fr/docs/Web/HTTP/Status */
        throw new \Exception('Vous n\'avez pas le droit d\'accéder à cette ressource, vous devez être connecté!', 403);
        backButton();
        return;

    } else { //if user logged
        logUserWindow();
        if (count($_POST)> 0){ //THERE IS POST DATA
            // var_dump($_POST);

            //VERIFY -> DATA NO OK
            $verfyRecipe =verifyRecipe();
            if ( $verfyRecipe == false){ 
                include_once('views/html/recipes/formulaires/addRecipeForm.php');
                return;
            } 
            //VERIFY -> DATA OK ADD DATABASE
             else { 
                // echo 'RECIPE OK --> ADD DATABASE';
                createRecipe($verfyRecipe);
                messageAddRecipeSucces();
                switcher(['recipes', 'list', 'all', '']);
                return;
            }
        } else {//THERE IS  NO POST DATA
            include_once('views/html/recipes/formulaires/addRecipeForm.php');
            return;
        }
    }                           
}


/** Function verify the recipe update and if all ok update databe
 * @param  string
 * @return bool
 */
function doUpdateRecipe($id)
{

    $recipe = getRecipeById($id);

    $authorID = $recipe['author'];
    $abstract = $recipe['abstract'];
    $title = $recipe['title'];

    if (!isset($_POST['abstract']) || !isset($_POST['title'])) {
        logUserWindow();
        include('views/html/recipes/formulaires/modifRecipeForm.php');
        backButton();
        return;
    } else {

        $titleNew = htmlspecialchars($_POST['title']);
        $abstracNew = htmlspecialchars($_POST['abstract']);
        $id = $_POST['id'];
        $recipe = [$titleNew, $abstracNew];
        //Verif si recette ok
        $verifEmpty = checkEmptyRecipe($title, $abstract);
        if ($verifEmpty == true) {
            include('views/html/formulaires/modifRecipeForm.php');
            backButton();
            return;
        } else {
            //requete ajout dans base
            updateRecipesById($titleNew, $abstracNew, $id);
            messageUpdateRecipeSucces();
            switcher(['recipes', 'list', 'all', '']);
        }
    }
}

/** Delete recipe from database 
 * @param string
 * @return string|false
 */
function doDeleteRecipeRecap($id)
{
    $recipe = getRecipeById($id);//get recipe from database
    
    //user verification
    if ($_SESSION['userMail'] !== $recipe['author']) {
        errAccesForbidden($recipe['author']);
        backButton();
        return;
    }
    //if confirmation form send -> delete and return main page
    if (isset($_POST['id'])) { 
        doDeleteRecipe();
        messageDeleteRecipeSucces();
        switcher(['recipes', 'list', 'all', '']);
        return;
    // Form confirm recap recipe 
    } else {
        logUserWindow();
        $id = $recipe['recipe_id'];
        $title = $recipe['title'];
        $abstract = $recipe['abstract'];
        include('views/html/recipes/formulaires/deleteForm.php');    
    }
}

/** Function verify the recipe to delete and if all ok delete
 * @param  
 * @return bool
 */
function doDeleteRecipe()
{
    $id = ($_POST['id']);
    $recipe = getRecipeById($id);
    $authorID = $recipe['author'];

    if ($_SESSION['userMail'] !== $authorID) {//A MIGRER
        
        backButton();
        return;
    } else {
        removeRecipesById($id);
        switcher(['recipe', 'list', 'all', '']);
    }
}

 /** Function verify the recipe 
 * @param  
 * @return bool
 */
function verifyRecipe()
{
    // echo ' ON RENTRE DANS VERIFY ';
        $titleNew = htmlspecialchars($_POST['title']);
        $abstracNew = htmlspecialchars($_POST['abstract']);
        $author = $_SESSION['userMail'];
        $recipe = [$titleNew, $abstracNew, $author];

        $resultCheck = checkRecipe($recipe);
        if ($resultCheck == false) {
            throw new \Exception('verif non ok');
            return false;
        } else {
            // echo 'message ok la recipe est good';
            return $recipe;
        }
}
/************************************* FUNCTIONS THAT DISPLAY****************************/


/** Display list of all recipes on base, from join recipes and user tables
 * @param 
 * @return string
 */
function displayAllRecipes()
{
    logUserWindow();//display if user log or not
    $recipesAll = recipeJoinUser();//model
    displayListRecipes($recipesAll);
}

/** Display list of user recipes
 * @param 
 * @return string
 */
function displayUserListRescipes()
{
    if (!isset($_SESSION['userMail'])) {//if user is not logged
        logUserWindow();
        errAccesUnauthorized();
        echo backButton();
        return;
    }
    $userRecipies = recipeByAuthorJoinUser($_SESSION['userMail']);
    logUserWindow();
    echo backButton();
    displayListRecipes($userRecipies);
}

/** Display list of one user recipes
 * @param string //name author (mail)
 * @return string
 */
function displayAuthorRecipies($authorMail)
{
    logUserWindow();
    echo backButton();
    $recipeByAuthor = recipeByAuthorJoinUser($authorMail);
    displayListRecipes($recipeByAuthor);
}
/** Display one recipe full text and owner button if is user recipes (and commentry later)
 * @param string //id recipe
 * @return string
 */
function displayOneRecipe($id)
{
    logUserWindow();
    $recipeJoinGet =  getRecipeById($id); //fetch id match
    displayFullRecipe($recipeJoinGet);
    // include('views/html/users/commentryForm.php');
}
