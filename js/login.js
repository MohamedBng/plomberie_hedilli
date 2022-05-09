function erreur() {

//Je récupère toutes les valeurs
    var mail = $('#mail').val();
    var confirmmail = $('#confirmmail').val();
    var password = $('#password').val();
    var login = $('#login').val();
    var expressionReguliereMail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var expressionRegulierePassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/;
    
//Je vérifie que les champs ne soit pas vide
    if (login == ""){ 
        event.preventDefault();
        alert("Un champ n'est pas remplie");
        stopImmediatePropagation();
    }

    if (password == ""){ 
        event.preventDefault();
        alert("Un champ n'est pas remplie");
        stopImmediatePropagation();
    }

    if (mail == ""){ 
        event.preventDefault();
        alert("Un champ n'est pas remplie");
        stopImmediatePropagation();
    }

    if (confirmmail == ""){ 
        event.preventDefault();
        alert("Un champ n'est pas remplie");
        stopImmediatePropagation();
    }


//Je vérifie que le mail et sa confimation soit identique
    if (mail!=confirmmail) {
         event.preventDefault();
      alert("Le mail et la confirmation doivent etre identique");
      stopImmediatePropagation();
     }

/*Example of invalid email id

    mysite.ourearth.com [@ is not present]
    mysite@.com.my [ tld (Top Level domain) can not start with dot "." ]
    @you.me.net [ No character before @ ]
    mysite123@gmail.b [ ".b" is not a valid tld ]
    mysite@.org.org [ tld can not start with dot "." ]
    .mysite@mysite.org [ an email should not be start with "." ]
    mysite()*@gmail.com [ here the regular expression only allows character, digit, underscore, and dash ]
    mysite..1234@yahoo.com [double dots are not allowed]
*/ 

//Je vérifie que le mail soit au normes
    if (!expressionReguliereMail.test(mail)) {
         event.preventDefault();
      alert("Veuillez utilisé une adresse mail valide");
      stopImmediatePropagation(); 
     }
//Je vérifie que le mot de passe soit assez complexe
     if (!expressionRegulierePassword.test(password)) {
        event.preventDefault();
      alert("Veuillez utilisé une mot de passe avec au moin une lettre majuscule, une lettre minuscule, un chiffre et un caractères spécial");
      stopImmediatePropagation(); 
     }
}