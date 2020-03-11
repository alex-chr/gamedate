<?php
  try {
    $bdd = new PDO("mysql:host=localhost; dbname=test", 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOexecption $e) {
    echo "non connecté";
  }
?>