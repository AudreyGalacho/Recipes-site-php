<?php
$postData = $_POST;
include_once('../blocs/bddCo.php');
include_once('../users/userAll.php');
include_once('recipesAll');
include_once('../functSql.php');

$recipe = recipeByIdVerrif($postData['id']);
$authorID = $recipe['author'];

if ($_SESSION['userMail'] !== $authorID) {
  echo 'Oh..Oh.. Vous n\'avez pas le droit de modifier cette recette!!';
  echo 'Vous êtes ' . $_SESSION['userMail'] . ' et non ' . $authorID . '!';
  include_once('../blocs/footer.php');
  exit();
}
//Requète suppression
$deleteRecipe = 'DELETE FROM recipes WHERE recipe_id = :id';
try {
  $suppRecipe = $mysqlClient->prepare($deleteRecipe);
  $suppRecipe->execute([
    'id' => $postData['id'],
  ]);
  header('Location: ../index.php');
  exit();
} catch (Exception $e) {
  echo 'Exception : ', $e->getMessage();
}
