var pseudo;
var naissance;
var ville;
var mail;
var pass;

function formPseudo(reponse) {
    var blocPseudo = document.querySelectorAll('[data-foo]')[0];
    pseudo = blocPseudo.value;
    if (pseudo == "") {
        erreur(blocPseudo);
    }
    else {
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
    // alert("yep");
    // console.log(pseudo);
    // console.log(naissance);
    // console.log(ville);
    // console.log(mail);
    // console.log(pass);

    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "php/ajout_user.php?pseudo="+pseudo+"&naissance="+naissance+"&ville="+ville+"&mail="+mail+"&pass="+pass, false);
    xhttp.send();
}
