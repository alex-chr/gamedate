<?php
  require_once("bdd.php");

  if (isset($_POST['pseudo_co']) && isset($_POST['pass_co'])) {
    $req = $bdd->prepare("SELECT COUNT(*) AS nbrow FROM `user` WHERE user.pseudo =:var1 AND user.password =:var2 ");
    $req->bindValue('var1', $_POST['pseudo_co'], PDO::PARAM_STR);
    $req->bindValue('var2', $_POST['pass_co'], PDO::PARAM_STR);
    $req->execute();
    $rep = $req->fetch();
    $req->closeCursor();

    if ($rep['nbrow'] == 0) {
      header("Location: ../index.php?erreur=1");
      exit;
    }
    else {
      $req2 = $bdd->prepare("SELECT user.id FROM `user` WHERE user.pseudo =:var1 AND user.password =:var2");
      $req2->bindValue('var1', $_POST['pseudo_co'], PDO::PARAM_STR);
      $req2->bindValue('var2', $_POST['pass_co'], PDO::PARAM_STR);
      $req2->execute();
      while ($donnes=$req2->fetch()) {
        $num = $donnes['id'];
      }
      $req2->closeCursor();

      session_start();
      $_SESSION['login'] = $num;
      header("Location: ../tchat.php");
      exit;
    }
  }
?>
