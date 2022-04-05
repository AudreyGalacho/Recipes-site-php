<?php
    function displayFormContact(){
        echo '<article>';
        include_once('html/messageContactForm.php');
        echo '</article>';
    }

    function displayFormRecipe(){
        echo '<article>';
        include_once('html/addRecipeForm.php');
        echo '</article>';
    }
?>