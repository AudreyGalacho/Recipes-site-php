<?php
  switch ($_SESSION['errMessage']) //
  {
      case 0: // dans le cas où $page vaut 0
      echo 'Chemin non valide';
      break;
      
      case 1: // dans le cas où $page vaut 1
      include("page1b.php");
      break;
      
      default: echo 'It\'s all right' ;
      ;
  }
?>