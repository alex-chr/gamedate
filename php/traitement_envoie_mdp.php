<?php
  require_once("bdd.php");

  if (isset($_POST['email_recup'])) {
    $verif = $bdd->prepare("SELECT COUNT(*) AS nbrow FROM `user` WHERE user.mail =:var1");
    $verif->bindValue('var1', $_POST['email_recup'], PDO::PARAM_STR);
    $verif->execute();
    $rep = $verif->fetch();
    $verif->closeCursor();

    if ($rep['nbrow'] == 0) {
      header("Location: ../index.php?erreur=2");
      exit;
    }
    else {
      $req = $bdd->prepare("SELECT user.pseudo, user.password FROM `user` WHERE user.mail =:var1");
      $req->bindValue('var1', $_POST['email_recup'], PDO::PARAM_STR);
      $req->execute();
      while ($donnes=$req->fetch()) {
        $pseudo = $donnes['pseudo'];
        $pass = $donnes['password'];
      }

      mail($_POST['email_recup'], "Pseudo et mot de passe GameDate", "Pseudo: ".$pseudo."\nMot de passe: ".$pass."\n\nSi vous n'êtes pas à l'origine de ce rappelle d'identifiant veillez nous contacter.");
    }
  }
?>

<!-- mail : reply.gamedate@gmail.com    mdp : 12345treza -->
