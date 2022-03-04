<?php

function recipeByIdVerrif($id)
{ // Request By ID avec verif ----------------------------------------------------------------------
  include('blocs/bddCo.php');

  if (!ctype_digit($id)) { //Verif que la valeur récupérer par le get est un nombre
    echo 'Id non valide'; 
    include('blocs/footer.php');
    exit();
  }

  $idInt = intval($id); //mise en INT

  $searchInTable = 'SELECT COUNT(*) FROM recipes WHERE recipe_id = :id '; // Requete de verif de recette correspondant a id reçu

  try {
    $recipeID = $mysqlClient->prepare($searchInTable);
    $recipeID->execute([
      'id' => $idInt,
    ]);
    $recipe = $recipeID->fetch();

    if (($recipe['0']) === '0') { //Aucune recette ne correspond dans la table 
      echo 'Aucune recette ne correspond!';
      include_once('../blocs/footer.php');
      exit();
    }
  } catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
  }

  $searchRecipe = 'SELECT * FROM recipes WHERE recipe_id = :id';
  try {
    $recipeFound = $mysqlClient->prepare($searchRecipe);
    $recipeFound->execute([
      'id' => $idInt,
    ]);
    $recipe = $recipeFound->fetch();
    return $recipe;
  } catch (Exception $e) {
    echo 'Exception : ', $e->getMessage();
  }
}
