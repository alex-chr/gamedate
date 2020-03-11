<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Site rencontre</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="general/css/general.css">
</head>
<body>

  <nav id="navbar">
    <div class="container_nav">
      <div class="contenu_nav">
        <div class="icon_reseaux_nav">
          <a href="https://youtu.be/_R6RCdqfl4A" target="blanc"></a>
          <a href="https://youtu.be/_R6RCdqfl4A" target="blanc"></a>
          <a href="https://youtu.be/_R6RCdqfl4A" target="blanc"></a>
        </div>
        <form action="php/traitement_co.php" method="post" class="formulaire_connexion">
          <span>déjà inscrit ?</span>
          <input type="text" name="pseudo_co" placeholder="PSEUDO">
          <input type="password" name="pass_co" placeholder="MOT DE PASSE">
          <input type="submit" value="OK">
          <p onclick="envoieMdp()">j'ai oubliez mon mot de passe</p>
        </form>
      </div>
    </div>
  </nav>

  <section id="envoie_mdp" class="envoie_mdp">
    <div class="container_envoie_mdp">
      <form action="php/traitement_envoie_mdp.php" method="post" class="contenu_envoie_mdp">
        <label>Votre adresse mail :</label>
        <input required type="text" name="email_recup" placeholder="Ex = 'charo.charo@gmail.com'">
        <div>
          <button type="submit">OK</button>
          <button type="button" onclick="envoieMdp()">Annuler</button>
        </div>
      </form>
    </div>
  </section>

  <section id="hero">
    <div class="container_hero">
      <div class="contenu_title">
        <h1>UI</h1>
        <p>Lorem Ipsum</p>
      </div>
      <div class="contenu_message">
        <div class="message_global">
          <div class="questions">
            <div class="image"></div>
            <div>
              <p id="text_questions">Bonjour, êtes-vous prêt(e) pour le <span>GameDate</span>.<br/>Choisissez votre <span>pseudo</span>.</p>
            </div>
          </div>
          <div class="reponse reponse1">
            <input data-foo="pseudo" type="text" placeholder="Ex: 'Charo'">
            <button onclick="formPseudo(this.parentNode)">
              <img src="images/arrow.svg">
            </button>

            <input data-foo="naissance" type="text" placeholder="Ex: '2000-12-25'">
            <button onclick="formBirth(this.parentNode)">
              <img src="images/arrow.svg">
            </button>

            <input data-foo="ville" type="text" placeholder="Ex: 'Narbonne'">
            <button onclick="formVille(this.parentNode)">
              <img src="images/arrow.svg">
            </button>

            <input data-foo="mail" type="text" placeholder="Ex: 'pole.emploi@gmail.com'">
            <button onclick="formMail(this.parentNode)">
              <img src="images/arrow.svg">
            </button>

            <input data-foo="pass" type="password" placeholder="Mot de passe">
            <button onclick="formPass(this.parentNode)">
              <img src="images/arrow.svg">
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

<script type="text/javascript" src="js/script_acceuil.js"></script>
<?php
  if (isset($_GET['erreur'])) {
    if ($_GET['erreur'] == 1) {
      echo "<script>alert('Mauvais identifiant ou mot de passe.')</script>";
    }
    else if ($_GET['erreur'] == 2) {
      echo "<script>alert('Aucun compte n\'est lié à cette adresse mail.')</script>";
    }
    else if ($_GET['erreur'] == 3) {
      echo "<script>alert('Un compte avec cette adresse mail existe déjà.')</script>";
    }
  }
?>
</body>
</html>
