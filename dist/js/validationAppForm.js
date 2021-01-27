/*Questa funzione valida i campi cf data e ora di un appuntamento*/
function validationAppForm() {
	var nome = document.getElementById('inputNome')
	var cf = document.getElementById("codF");
	var data = document.getElementById("inputData");
	var ora = document.getElementById("inputOra");

	if(emptyNome(nome)) {
		if (cf_validation(cf)) {
			if (data_validation(data)) {
				if (ora_validation(data, ora)) {
					return;
				}
			}
		}
	}
	return false;
}

function emptyNome(nome){
	if(nome.value == null || nome.value == ''){
		$('#nomeSpan').text("Il campo Paziente è vuoto");
		$('#nomeSpan').show();
		$('#nomeSpan').css('color','red');
		$('#inputNome').css('background-color','red');
		return false;
	}else{
		return true;
	}
}
function cf_validation(cf) {
	var letters = /^[A-Za-z0-9]+$/;
	if(cf.value.match(letters) && cf.value.length == 16){
		return true;
	}
	else if(cf.value.length != 16){
		$("#codFspan").text("Il campo Codice fiscale non rispetta la lunghezza");
		$("#codFspan").show();
		$("#codFspan").css("color", "red");
		$("#codF").css("background-color", "red");
		return false;
	}
	else{
		$("#codFspan").text("Il campo Codice fiscale non rispetta il formato");
		$("#codFspan").show();
		$("#codFspan").css("color", "red");
		$("#codF").css("background-color", "red");
		return false;
	}
}

function data_validation(data){
	var currentDate = new Date();
	currentDate = currentDate.toISOString();
	currentDate = currentDate.substr(0,10);

	if(data.value < currentDate){
		$("#dataSpan").text("Data superata");
		$("#dataSpan").css("color", "red");
		$("#inputData").css("background-color", "red");
		return false;
	}
	else{
		return true;
	}
}

function ora_validation(data,ora){
	var currentDate = new Date();
	var currDate = currentDate.toISOString();
	currDate = currDate.substr(0,10);
	var hour = ora.value+":00";
	var dA = data.value;

	if(dA == currDate){
		var currHour = null;
		if(currentDate.getHours()>=0 && currentDate.getHours()<=9){
			currHour = "0"+currentDate.getHours();
		}else{
			currHour = currentDate.getHours();
		}
		if(currentDate.getMinutes()>=0 && currentDate.getMinutes()<=9){
			currHour += ":0"+currentDate.getMinutes();
		}else{
			currHour += ":"+currentDate.getMinutes();
		}
		if(currentDate.getSeconds()>=0 && currentDate.getSeconds()<=9){
			currHour += ":0"+currentDate.getSeconds();
		}else{
			currHour += ":"+currentDate.getSeconds();
		}
		console.log("currH: "+currHour);
		console.log("h: "+hour);
		if(hour<=currHour){
			$("#oraSpan").text("Orario non disponibile! Inserisci un ora dopo le "+currHour);
			$("#oraSpan").css("color", "red");
			$("#inputOra").css("background-color", "red");
			return false;
		}
		else{
			return true;
		}
	}
	else{
		return true;
	}
}
