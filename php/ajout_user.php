<?php
  require_once("bdd.php");

  if (isset($_POST['pseudo'])) {
    $verif = $bdd->prepare("SELECT COUNT(*) AS nbrow FROM `user` WHERE user.mail =:var1");
    $verif->bindValue('var1', $_POST['mail'], PDO::PARAM_STR);
    $verif->execute();
    $rep = $verif->fetch();
    $verif->closeCursor();

    if ($rep['nbrow'] > 0) {
      echo "false";
    } else {
      $insert = $bdd->prepare("INSERT INTO `user`(`pseudo`, `naissance`, `ville`, `mail`, `password`) VALUES (:var1,:var2,:var3,:var4,:var5)");
      $insert->bindValue('var1', $_POST['pseudo'], PDO::PARAM_STR);
      $insert->bindValue('var2', $_POST['naissance'], PDO::PARAM_STR);
      $insert->bindValue('var3', $_POST['ville'], PDO::PARAM_STR);
      $insert->bindValue('var4', $_POST['mail'], PDO::PARAM_STR);
      $insert->bindValue('var5', $_POST['pass'], PDO::PARAM_STR);
      $insert->execute();
      echo "true";
    }
  }

?>
