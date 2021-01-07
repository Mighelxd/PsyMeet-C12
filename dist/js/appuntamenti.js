/*Qusta funzione istanzia e restituisce un nuovo oggetto XMLHttpRequest*/
function getXmlHttpRequest() {

	var xhr = false;
	var activeXoptions = new Array("Microsoft.XmlHttp", "MSXML4.XmlHttp",
		"MSXML3.XmlHttp", "MSXML2.XmlHttp", "MSXML.XmlHttp");

	try {
		xhr = new XMLHttpRequest();
		console.log("Get XML http request");
	} catch (e) {
	}

	if (!xhr) {
		var created = false;
		for (var i = 0; i < activeXoptions.length && !created; i++) {
			try {
				xhr = new ActiveXObject(activeXoptions[i]);
				created = true;
				console.log("Get ActiveXObject XML http request");
			} catch (e) {
			}
		}
	}
	return xhr;
}
/*Questa funzione seleziona l'appuntamento che si desidera modificare*/
function selectApp(a) {
	var data = a.data;
	var ora = a.ora;
	var descrizione = a.descrizione;
	var cf = a.cf;

	var cCf = cf.substr(0, cf.indexOf('-') - 1);
	var nomCompleto = cf.substr(cf.indexOf('-') + 2);

	var nome = document.getElementById('inputNome');
	nome.value = nomCompleto;
	var oldNome = document.getElementById('oldName');
	oldNome.value = nome.value;

	var dat = document.getElementById('inputData');
	dat.value = data;
	var oldData = document.getElementById('oldData');
	oldData.value = dat.value;

	var or = document.getElementById('inputOra');
	or.value = ora;
	var oldOra = document.getElementById('oldOra');
	oldOra.value = or.value;

	var desc = document.getElementById('inputDescrizione');
	desc.value = descrizione;
	var oldDesc = document.getElementById('oldDesc');
	oldDesc.value = desc.value;

	var selCf = document.getElementById('codF');
	if (selCf != null) {
		while (selCf.hasChildNodes()) {
			selCf.removeChild(selCf.childNodes[0]);
		}
	}
	var opt = document.createElement('option');
	opt.value = cCf;
	opt.innerHTML = cCf;
	selCf.appendChild(opt);
	var oldCodF = document.getElementById('oldCodF');
	if (oldCodF != null) {
		while (oldCodF.hasChildNodes()) {
			oldCodF.removeChild(oldCodF.childNodes[0]);
        }
	}
	var oldOpt = document.createElement('option');
	oldOpt.value = opt.value;
	oldOpt.hidden = true;
	oldCodF.appendChild(oldOpt);
}
/*Questa funzione costruisce un appuntamento nella pagina*/
function createApp(appu) {
	try {
		var res = document.getElementById("appuntamenti");
		if (res != null) {
			while (res.hasChildNodes()) {
				res.removeChild(res.childNodes[0]);
			}
		}

		for (var i = 0; i < appu.length;i++) {
			var divClasseCol = document.createElement('div');
			divClasseCol.className = "columnApp";
		  var btnDel = document.createElement('p');
			btnDel.type = 'button';
			btnDel.className = "bottoneDel";
			btnDel.value = appu[i];
			btnDel.innerHTML = 'Elimina appuntamento';
			btnDel.onclick = function(){
				createDelForm(this.value);
			}
			var btnMod = document.createElement('p');
			btnMod.type = 'button';
			btnMod.className = "bottoneMod";
			btnMod.value = appu[i];
			btnMod.innerHTML = 'Modifica appuntamento';
			btnMod.onclick = function(){
				createForm('modApp');
				selectApp(this.value);
			}
			var divClasseCard = document.createElement('div');
			divClasseCard.className = "cardApp";
			var elH3 = document.createElement('h3');
			elH3.className = "descApp";
			elH3.innerHTML = appu[i].descrizione;
			var elPdata = document.createElement('p');
			elPdata.className = "dataApp";
			elPdata.innerHTML = "data: " + appu[i].data;
			var elPora = document.createElement('p');
			elPora.className = "oraApp";
			elPora.innerHTML = "ora: " + appu[i].ora;
			var elPpaz = document.createElement('p');
			elPpaz.className = "pazApp";
			elPpaz.innerHTML = "paziente: " + appu[i].cf;

			divClasseCard.appendChild(elH3);
			divClasseCard.appendChild(elPpaz);
			divClasseCard.appendChild(elPdata);
			divClasseCard.appendChild(elPora);

			divClasseCol.appendChild(divClasseCard);
			divClasseCol.appendChild(btnMod);
			divClasseCol.appendChild(btnDel);

			res.appendChild(divClasseCol);
		}
	}
	catch (e1) {}

}
/*Questa funzione viene chiamata al caricamento della pagina per poter creare gli appuntamenti*/
$(function () {
	var xhttp = getXmlHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var app = JSON.parse(this.responseText);
			createApp(app);
		}
	};
	var str = 'RSSMRC80R12H703U';
	xhttp.open("POST", "/PsyMeet-C12/applicationLogic/AppuntamentoControl.php", true);
	xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhttp.send("action=recoveryAll&key="+str);
})

/*Questa funzione inserisce il codice fiscale del paziente di cui si conosce nome e cognome*/
function insertCf(res) {
	try {
		var root = document.getElementById("codF");

		if (root != null) {
			while (root.hasChildNodes()) {
				root.removeChild(root.childNodes[0]);
			}
		}

		for (paz of res) {
			var option = document.createElement('option');
			option.value = paz.cf;
			option.innerHTML = paz.cf;

			root.appendChild(option);
        }
	}
	catch (e1) {}
}
/*Questa funzione chiama la funzione sopra se lo stato della risposta è 200*/
function showCf(nomeCompleto) {
	if(nomeCompleto == ''){
		return;
	}
	var space = nomeCompleto.indexOf(' ');
	var keyN = nomeCompleto.substr(0,space);
	var keyC = nomeCompleto.substr(space+1);

	var xhttp = getXmlHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var result = JSON.parse(this.responseText);
			insertCf(result);
		}
	};
	xhttp.open("POST", "/PsyMeet-C12/applicationLogic/AppuntamentoControl.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("action=searchCf&keyN=" + keyN + "&keyC=" + keyC);
}
/*Questa funziona controlla se il formato dell'input del nome è valido*/
function name_validation(nome) { //allLetter
	var letters = /^[A-Za-z\s]+$/;
	if (nome.match(letters)) {
		$("#nomeSpan").text("");
		$("#inputNome").css("background-color", "white");
		return true;
	}
	else {
		$("#nomeSpan").text("Formato errato!. Inserisci solo lettere e spazi.");
		$("#nomeSpan").css("color", "red");
		$("#inputNome").css("background-color", "red");
		return false;
	}
}
/*Questa funzione controlla se un appuntamento è già fissato per una determinata ora e data*/
function dataOraVal(dat,ora){
	var xhttp = getXmlHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var giusto = this.responseText;
			if(!giusto){
				$("#oraSpan").text("Orario già fissato! Cambia ora.");
				$("#oraSpan").css("color", "red");
				$("#inputOra").css("background-color", "red");
				$("#dataSpan").text("Data già fissata! Cambia data.");
				$("#dataSpan").css("color", "red");
				$("#inputData").css("background-color", "red");
			}
		}
	};
	xhttp.open("POST", "/PsyMeet-C12/applicationLogic/AppuntamentoControl.php", true);
	xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xhttp.send("action=recoveryAppToHour&cf_prof=RSSMRC80R12H703U&oraApp=" + ora + "&dataApp=" + dat);
}
/*Questa funzione crea la form in base a chi la richiede*/
function createForm(action){
	var root = document.getElementById('addForm');
	var rootDel = document.getElementById('delForm');
	var rootMod = document.getElementById('modForm');
	if(root != null){
		while (root.hasChildNodes()) {
			root.removeChild(root.childNodes[0]);
		}
	}
	if (rootDel != null) {
		while (rootDel.hasChildNodes()) {
			rootDel.removeChild(rootDel.childNodes[0]);
		}
	}
	if (rootMod != null) {
		while (rootMod.hasChildNodes()) {
			rootMod.removeChild(rootMod.childNodes[0]);
		}
	}

	if(action == 'newApp'){
		var form = document.getElementById('addForm');
		var inNome = document.createElement('input');
		inNome.name = "nome";
		inNome.id = "inputNome";
		inNome.type = "text";
		inNome.placeholder = "Nome Cognome paziente";
		inNome.required = true;
		inNome.onkeyup = function(){
			if(this.value == ""){
				return;
			}
			else if(name_validation(this.value)){
				showCf(this.value);
			}
			else return;
		}
		var labNome = document.createElement('label');
		labNome.for = inNome.name;
		labNome.innerHTML = "Paziente:"
	  var spanNome = document.createElement('span');
		spanNome.id = "nomeSpan";

		var select = document.createElement('select');
		select.name = "codF";
		select.id = "codF";
		select.required = true;
		var labSelect = document.createElement('label');
		labSelect.for = select.name;
		labSelect.innerHTML = "Codice fiscale:"
	  var spanSelect = document.createElement('span');
		spanSelect.id = "codFspan";

		var inData = document.createElement('input');
		inData.name = "data";
		inData.id = "inputData";
		inData.type = "date";
		inData.required = true;
		inData.onclick = function(){
			$("#dataSpan").text("");
			$("#inputData").css("background-color", "white");
		}
		var labData = document.createElement('label');
		labData.for = inData.name;
		labData.innerHTML = "Data:"
	  var spanData = document.createElement('span');
		spanData.id = "dataSpan";

		var inOra = document.createElement('input');
		inOra.name = "ora";
		inOra.id = "inputOra";
		inOra.type = "time";
		inOra.required = true;
		inOra.onclick = function(){
			$("#oraSpan").text("");
			$("#inputOra").css("background-color", "white");
		}
		inOra.onblur = function(){dataOraVal(document.getElementById('inputData').value,this.value);}
		var labOra = document.createElement('label');
		labOra.for = inOra.name;
		labOra.innerHTML = "Ora:"
	  var spanOra = document.createElement('span');
		spanOra.id = "oraSpan";

		var inDesc = document.createElement('input');
		inDesc.name = "descrizione";
		inDesc.id = "inputDescrizione";
		inDesc.type = "text";
		inDesc.placeholder = "Descrizione appuntamento";
		inDesc.required = true;
		var labDesc = document.createElement('label');
		labDesc.for = inDesc.name;
		labDesc.innerHTML = "Descrizione:"
	  var spanDesc = document.createElement('span');
		spanDesc.id = "descrizioneSpan";

		var btnAdd = document.createElement('button');
		btnAdd.id= "btnFormAdd";
		btnAdd.name = "action";
		btnAdd.value = "addApp";
		btnAdd.type= "submit";
		btnAdd.innerHTML = "Aggiungi";

		form.appendChild(labNome);
		form.appendChild(inNome);
		form.appendChild(spanNome);

		form.appendChild(labSelect);
		form.appendChild(select);
		form.appendChild(spanSelect);

		form.appendChild(labData);
		form.appendChild(inData);
		form.appendChild(spanData);

		form.appendChild(labOra);
		form.appendChild(inOra);
		form.appendChild(spanOra);

		form.appendChild(labDesc);
		form.appendChild(inDesc);
		form.appendChild(spanDesc);

		form.appendChild(btnAdd);

		var br = document.createElement('br');
		form.insertBefore(br,labSelect);
		var br = document.createElement('br');
		form.insertBefore(br,labData);
		var br = document.createElement('br');
		form.insertBefore(br,labOra);
		var br = document.createElement('br');
		form.insertBefore(br,labDesc);
		var br = document.createElement('br');
		form.insertBefore(br,btnAdd);
		var br = document.createElement('br');
		form.insertBefore(br,btnAdd);
		var br = document.createElement('br');
		form.insertBefore(br,btnAdd);
		var br = document.createElement('br');
		form.insertBefore(br,select);
		var br = document.createElement('br');
		form.insertBefore(br,inOra);
		var br = document.createElement('br');
		form.insertBefore(br,inData);

		$("#newApp").hide();
	}
	else if(action == 'modApp'){
		var form = document.getElementById('modForm');
		var inNome = document.createElement('input');
		inNome.name = "nome";
		inNome.id = "inputNome";
		inNome.type = "text";
		inNome.placeholder = "Nome Cognome paziente";
		inNome.required = true;
		inNome.onkeyup = function(){
			if(this.value == ""){
				return;
			}
			else if(name_validation(this.value)){
				showCf(this.value);
			}
			else return;
		}
		var labNome = document.createElement('label');
		labNome.for = inNome.name;
		labNome.innerHTML = "Paziente:"
	  var spanNome = document.createElement('span');
		spanNome.id = "nomeSpan";

		var select = document.createElement('select');
		select.name = "codF";
		select.id = "codF";
		select.required = true;
		var labSelect = document.createElement('label');
		labSelect.for = select.name;
		labSelect.innerHTML = "Codice fiscale:"
	  var spanSelect = document.createElement('span');
		spanSelect.id = "codFspan";

		var inData = document.createElement('input');
		inData.name = "data";
		inData.id = "inputData";
		inData.type = "date";
		inData.required = true;
		inData.onclick = function(){
			$("#dataSpan").text("");
			$("#inputData").css("background-color", "white");
		}
		var labData = document.createElement('label');
		labData.for = inData.name;
		labData.innerHTML = "Data:"
	  var spanData = document.createElement('span');
		spanData.id = "dataSpan";

		var inOra = document.createElement('input');
		inOra.name = "ora";
		inOra.id = "inputOra";
		inOra.type = "time";
		inOra.required = true;
		inOra.onclick = function(){
			$("#oraSpan").text("");
			$("#inputOra").css("background-color", "white");
		}
		inOra.onblur = function(){dataOraVal(document.getElementById('inputData').value,this.value);}
		var labOra = document.createElement('label');
		labOra.for = inOra.name;
		labOra.innerHTML = "Ora:"
	  var spanOra = document.createElement('span');
		spanOra.id = "oraSpan";

		var inDesc = document.createElement('input');
		inDesc.name = "descrizione";
		inDesc.id = "inputDescrizione";
		inDesc.type = "text";
		inDesc.placeholder = "Descrizione appuntamento";
		inDesc.required = true;
		var labDesc = document.createElement('label');
		labDesc.for = inDesc.name;
		labDesc.innerHTML = "Descrizione:"
	  var spanDesc = document.createElement('span');
		spanDesc.id = "descrizioneSpan";

		/*Creo i campi che conterranno le info dei vecchi appuntamenti*/
			var oldNome = document.createElement('input');
			oldNome.name = 'oldName';
			oldNome.id = 'oldName';
			oldNome.type = 'text';
			oldNome.hidden = true;
			var oldData = document.createElement('input');
			oldData.name = 'oldData';
			oldData.id = 'oldData';
			oldData.type = 'date';
			oldData.hidden = true;
			var oldOra = document.createElement('input');
			oldOra.name = 'oldOra';
			oldOra.id = 'oldOra';
			oldOra.type = 'time';
			oldOra.hidden = true;
			var oldDesc = document.createElement('input');
			oldDesc.name = 'oldDesc';
			oldDesc.id = 'oldDesc';
			oldDesc.type = 'text';
			oldDesc.hidden = true;
			var oldCf = document.createElement('select');
			oldCf.name = 'oldCodF';
			oldCf.id = 'oldCodF';
			oldCf.hidden = true;

		var btnMod = document.createElement('button');
		btnMod.id= "btnFormModify";
		btnMod.name = "action";
		btnMod.value = "modApp";
		btnMod.type= "submit";
		btnMod.innerHTML = "Modifica";

		form.appendChild(labNome);
		form.appendChild(inNome);
		form.appendChild(spanNome);

		form.appendChild(labSelect);
		form.appendChild(select);
		form.appendChild(spanSelect);

		form.appendChild(labData);
		form.appendChild(inData);
		form.appendChild(spanData);

		form.appendChild(labOra);
		form.appendChild(inOra);
		form.appendChild(spanOra);

		form.appendChild(labDesc);
		form.appendChild(inDesc);
		form.appendChild(spanDesc);

		form.appendChild(oldNome);
		form.appendChild(oldCf);
		form.appendChild(oldData);
		form.appendChild(oldOra);
		form.appendChild(oldDesc);

		form.appendChild(btnMod);

		var br = document.createElement('br');
		form.insertBefore(br,labSelect);
		var br = document.createElement('br');
		form.insertBefore(br,labData);
		var br = document.createElement('br');
		form.insertBefore(br,labOra);
		var br = document.createElement('br');
		form.insertBefore(br,labDesc);
		var br = document.createElement('br');
		form.insertBefore(br,btnMod);
		var br = document.createElement('br');
		form.insertBefore(br,btnMod);
		var br = document.createElement('br');
		form.insertBefore(br,btnMod);
		var br = document.createElement('br');
		form.insertBefore(br,select);
		var br = document.createElement('br');
		form.insertBefore(br,inOra);
		var br = document.createElement('br');
		form.insertBefore(br,inData);

		$("#newApp").show();
	}
}

/*Questa funzione crea la form*/
$("#newApp").click(function(){
	createForm(this.value);
});

/*Questa funzione crea la form per eliminare un elemento appuntamento*/
function createDelForm(app){
	var root = document.getElementById('addForm');
	var rootDel = document.getElementById('delForm');
	var rootMod = document.getElementById('modForm');
	if(root != null){
		while (root.hasChildNodes()) {
			root.removeChild(root.childNodes[0]);
		}
	}
	if (rootDel != null) {
		while (rootDel.hasChildNodes()) {
			rootDel.removeChild(rootDel.childNodes[0]);
		}
	}
	if (rootMod != null) {
		while (rootMod.hasChildNodes()) {
			rootMod.removeChild(rootMod.childNodes[0]);
		}
	}

	var cf = app.cf;
	var nomeCompleto = cf.substr(cf.indexOf('-')+1);
	cf = cf.substr(0,cf.indexOf('-')-1);

	var form = document.getElementById('delForm');

	var inNome = document.createElement('input');
	inNome.name = "nome";
	inNome.id = "inputNome";
	inNome.type = "text";
	inNome.readOnly = true;
	inNome.value = nomeCompleto;

	var labNome = document.createElement('label');
	labNome.for = inNome.name;
	labNome.innerHTML = "Paziente:"

	var select = document.createElement('select');
	select.name = "codF";
	select.id = "codF";
	select.autofocus = true;
	select.readOnly = true;
	var labSelect = document.createElement('label');
	labSelect.for = select.name;
	labSelect.innerHTML = "Codice fiscale:"

	var opt = document.createElement('option');
	opt.value = cf;
	opt.innerHTML = cf;
	select.appendChild(opt);

	var inData = document.createElement('input');
	inData.name = "data";
	inData.id = "inputData";
	inData.type = "date";
	inData.value = app.data;
	inData.readOnly = true;

	var labData = document.createElement('label');
	labData.for = inData.name;
	labData.innerHTML = "Data:"

	var inOra = document.createElement('input');
	inOra.name = "ora";
	inOra.id = "inputOra";
	inOra.type = "time";
	inOra.value = app.ora;
	inOra.readOnly = true;

	var labOra = document.createElement('label');
	labOra.for = inOra.name;
	labOra.innerHTML = "Ora:"

	var inDesc = document.createElement('input');
	inDesc.name = "descrizione";
	inDesc.id = "inputDescrizione";
	inDesc.type = "text";
	inDesc.value = app.descrizione;
	inDesc.readOnly = true;

	var labDesc = document.createElement('label');
	labDesc.for = inDesc.name;
	labDesc.innerHTML = "Descrizione:"

	var btnDe = document.createElement('button');
	btnDe.id= "btnFormDelete";
	btnDe.name = "action";
	btnDe.value = "delApp";
	btnDe.type= "submit";
	btnDe.innerHTML = "Conferma eliminazione";

	form.appendChild(labNome);
	form.appendChild(inNome);

	form.appendChild(labSelect);
	form.appendChild(select);

	form.appendChild(labData);
	form.appendChild(inData);

	form.appendChild(labOra);
	form.appendChild(inOra);

	form.appendChild(labDesc);
	form.appendChild(inDesc);

	form.appendChild(btnDe);

	var br = document.createElement('br');
	form.insertBefore(br,labSelect);
	var br = document.createElement('br');
	form.insertBefore(br,labData);
	var br = document.createElement('br');
	form.insertBefore(br,labOra);
	var br = document.createElement('br');
	form.insertBefore(br,labDesc);
	var br = document.createElement('br');
	form.insertBefore(br,btnDe);
	var br = document.createElement('br');
	form.insertBefore(br,btnDe);
	var br = document.createElement('br');
	form.insertBefore(br,btnDe);
	var br = document.createElement('br');
	form.insertBefore(br,select);
	var br = document.createElement('br');
	form.insertBefore(br,inOra);
	var br = document.createElement('br');
	form.insertBefore(br,inData);
}
