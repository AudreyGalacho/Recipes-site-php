<?php
include_once('../app/database.php');
include_once('../repository/recipes.php');

?>

<!DOCTYPE html>
<html>
<?php 
include_once('../html/head.php');
include_once('../html/header.php');

$recipe = getRecipeById('1');
var_dump($recipe);

include_once('../html/footer.php');
?>
</html>