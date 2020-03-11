<?php
  require_once("php/bdd.php");

  session_start();
  if (isset($_SESSION['login'])) {
    $req = $bdd->prepare("SELECT * FROM `user` WHERE user.id =:var1");
    $req->bindValue('var1', $_SESSION['login'], PDO::PARAM_STR);
    $req->execute();
    while ($donnes=$req->fetch()) {
      $id = $donnes['id'];
      $pseudo = $donnes['pseudo'];
      $naissance = $donnes['naissance'];
      $ville = $donnes['ville'];
      $mail = $donnes['mail'];
    }
  }
  else {
    header("Location: index.php");
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Votre profil du Game Date</title>
  <link rel="stylesheet" href="general/navbar/navbar.css">
  <link rel="stylesheet" type="text/css" href="general/css/general.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/profil.css">
</head>
<body>
  <?php
    require_once("general/navbar/navbar.php");
  ?>

  <section id="section_principale">
    <div class="container_principale">
      <header class="head_page_id">
        <img src="images/logo_simple.png">
        <div class="perso">
          <div class="info_perso">
            <strong><?php echo $pseudo; ?></strong>
            <em>niveau 3</em>
            <p>exp: 120/300</p>
            <div class="progress_bar">
              <hr>
              <hr>
            </div>
          </div>
          <span class="avatar">
            <img src="images/anonyme_boys.png" alt="">
          </span>
        </div>
      </header>

      <main class="main_content">
        <div class="edition_profil">
          <h1>édition de profil</h1>
          <div class="barre_nav_page">
            <ul>
              <li class="menu_page_active change_section">mon profil</li>
              <li class="change_section">je recherche</li>
              <li class="change_section">mes photos</li>
              <li class="change_section">arbre de compétences</li>
            </ul>
          </div>

          <div class="form_general section_main">
            <div class="">
              <span>sexe</span>
              <div>
                <select>
                  <option value="1">un homme</option>
                  <option value="2" selected>une femme</option>
                  <option value="3">je sais pas</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="pub_content">
          <div class="we_love">
            <p>WE LOVE</p>
            <a href="durex.fr">
              <img src="images/durex.png" alt="">
            </a>
          </div>
        </div>
      </main>
    </div>
  </section>
</body>
</html>