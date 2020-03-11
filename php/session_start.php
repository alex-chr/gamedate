<?php
  require_once("bdd.php");

  if (isset($_POST['mail'])) {
    $req = $bdd->prepare("SELECT user.id FROM `user` WHERE user.mail =:var1");
    $req->bindValue('var1', $_POST['mail'], PDO::PARAM_STR);
    $req->execute();
    while ($donnes=$req->fetch()) {
      $id = $donnes['id'];
    }

    session_start();
    $_SESSION['login'] = $id;
  }
?>