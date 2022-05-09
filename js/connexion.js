function verifChamp(){
	var login = document.getElementById("login").value; 
	var password = document.querySelector('#password').value; 

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

}