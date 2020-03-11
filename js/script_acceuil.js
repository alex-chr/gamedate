var pseudo;
var naissance;
var ville;
var mail;
var pass;
var question = document.getElementById('text_questions');

function formPseudo(reponse) {
    var blocPseudo = document.querySelectorAll('[data-foo]')[0];
    pseudo = blocPseudo.value;
    if (pseudo == "") {
        erreur(blocPseudo);
    }
    else {
        question.innerHTML = "Bienvenu <span>"+pseudo+"</span>.<br/>Maintenant nous avons besoin de votre<span> date de naissance</span>.";
        changePhase(1, 2, reponse);
    }
}

function formBirth(reponse) {
    var blocBirth = document.querySelectorAll('[data-foo]')[1];
    naissance = blocBirth.value;
    var annee = Number(naissance.substr(0,4));
    var mois = Number(naissance.substr(5,2));
    var jour = Number(naissance.substr(8));
    var age = verifAge(annee, mois, jour);
    if (naissance == "") {
        erreur(blocBirth);
    }
    else if (naissance.length != 10 || naissance.includes('-', 4) == false || naissance.includes('-', 7) == false) {
        erreur(blocBirth);
        alert("Date de naissance au format : \"AAAA-MM-JJ\"");
    }
    else if (age == false) {
        erreur(blocBirth);
        alert("Reviens quand tu auras 18 ans");
    }
    else {
        question.innerHTML = "Vous êtes bien <span>majeur</span>.<br/>Pouvez vous nous dire où vous <span>habitez</span>.";
        changePhase(2, 3, reponse);
    }
}

function formVille(reponse) {
    var blocVille = document.querySelectorAll('[data-foo]')[2];
    ville = blocVille.value;
    if (ville == "") {
        erreur(blocVille);
    }
    else {
        question.innerHTML = "Vous venez donc de <span>"+ville+"</span>.<br/>Nous avons aussi besoin de<span> votre adresse Mail</span>."
        changePhase(3, 4, reponse);
    }
}

function formMail(reponse) {
    var blocMail = document.querySelectorAll('[data-foo]')[3];
    mail = blocMail.value;
    if (mail == "" || mail.includes('@') == false) {
        erreur(blocMail);
    }
    else {
        question.innerHTML = "<span>Un dernier pas</span>.<br/>Créer un <span>mot de passe</span>."
        changePhase(4, 5, reponse);
    }
}

function formPass(reponse) {
    var blocPass = document.querySelectorAll('[data-foo]')[4];
    pass = blocPass.value;
    if (pass == "") {
        erreur(blocPass);
    }
    else if (pass.length < 8) {
        erreur(blocPass);
        alert("Met un bon mot de passe CONNARD !!");
    }
    else {
        envoieForm();
    }
}

function verifAge(annee, mois, jour) {
    var date = new Date();
    var age1 = date.getFullYear() - annee;
    if (age1 > 18) {
        return true;
    }
    else if (age1 = 18) {
        var age2 = date.getMonth() + 1 - mois;
        if (age2 > 0) {
            return true;
        }
        else if (age2 == 0) {
            var age3 = date.getDate() - jour;
            console.log(date.getDate());
            if (age3 < 0) {
                return false;
            }
            else {
                return true;
            }
        }
        else {
            return false;
        }
    }
    else {
        return false;
    }
}

function erreur(input) {
    input.classList.add('secoue');
    input.addEventListener("webkitAnimationEnd", function() {
        input.classList.remove("secoue");
    });
}

function changePhase(num1, num2, reponse) {
    reponse.classList.remove('reponse'+num1);
    reponse.classList.add('reponse'+num2);
}

function envoieForm() {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            if (this.responseText == 'false') {
                document.location.href="./?erreur=3";
            }
            else {
                userConnected();
            }
        }
     };
    xhttp.open("POST", "php/ajout_user.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("pseudo="+pseudo+"&naissance="+naissance+"&ville="+ville+"&mail="+mail+"&pass="+pass);
}

function envoieMdp() {
    document.getElementById('envoie_mdp').classList.toggle('active_recup_mdp');
    return false;
}

function userConnected() {
    var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "php/session_start.php", false);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("mail="+mail);
    document.location.href="profil.php";
}
