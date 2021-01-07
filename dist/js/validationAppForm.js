/*Questa funzione valida i campi cf data e ora di un appuntamento*/
function validationAppForm() {
	var cf = document.getElementById("codF");
	var data = document.getElementById("inputData");
	var ora = document.getElementById("inputOra");

	if (cf_validation(cf)) {
		if (data_validation(data)) {
			if (ora_validation(data,ora,appuntamenti)) {
				return;
			}
		}
	}
	return false;
}

function cf_validation(cf) {
	var letters = /^[A-Z0-9]+$/;
	if(cf.value.match(letters) && cf.value.length == 16){
		return true;
	}
	else if(cf.value.length != 16){
		$("#codFspan").text("Formato errato!. Puoi inserire solo 16 caratteri.");
		$("#codFspan").show();
		$("#codFspan").css("color", "red");
		$("#codF").css("background-color", "red");
		return false;
	}
	else{
		$("#codFspan").text("Formato errato!. Puoi inserire solo lettere maiuscole e numeri.");
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
		$("#dataSpan").text("Data non disponibile!");
		$("#dataSpan").css("color", "red");
		$("#inputData").css("background-color", "red");
		return false;
	}
	else{
		return true;
	}
}

function ora_validation(data,ora,appuntamenti){
	var currentDate = new Date();
	var currDate = currentDate.toISOString();
	currDate = currDate.substr(0,10);
	var hour = ora.value+":00";
	var dA = data.value;

	if(dA == currDate){
		var currentHour = currentDate.getHours()+":"+currentDate.getMinutes()+":"+currentDate.getSeconds();
		if(hour<=currentHour){
			$("#oraSpan").text("Orario non disponibile! Inserisci un ora dopo le "+currentHour);
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
