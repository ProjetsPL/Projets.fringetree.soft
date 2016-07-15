<?php
require_once '../Init.php';

try {
  RedBeanPHP\R::nuke();

  echo "All migrations and seeds has been succesffuly made.";
  
} catch(Exception $e) {
  echo $e->getMessage();
}
 ?>
