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

function viewScheda(){
  var sch=document.getElementById('newScheda');
  sch.hidden = false;
  $('#btnNew').hide();
}

function createEp(scheda){
  var root = document.getElementById('episodio');
  if (root != null) {
    while (root.hasChildNodes()) {
      root.removeChild(root.childNodes[0]);
    }
  }

  var inputNumEp = document.createElement('input');
  inputNumEp.type = 'text';
//  inputNumEp.min = '1';
//  inputNumEp.max = '10';
  inputNumEp.name = "numero";
  inputNumEp.value = parseInt(scheda.n_episodi) + 1;
  var p = document.createElement('p');
  p.innerHTML = "Episodio";
  p.appendChild(inputNumEp);

  var divAnalisi = document.createElement('div');
  divAnalisi.className = "form-group";
  var textAn = document.createElement('textarea');
  textAn.id = "inputDescription";
  textAn.className = "form-control";
  textAn.rows = "4";
  textAn.name = "analisi";
  var labAn = document.createElement('label');
  labAn.for = "inputDescription";
  labAn.innerHTML = "Analisi Funzionale";
  divAnalisi.appendChild(labAn);
  divAnalisi.appendChild(textAn);

  var th1 = document.createElement('th');
  th1.innerHTML = "A";
  var th2 = document.createElement('th');
  th2.innerHTML = "B";
  var th3 = document.createElement('th');
  th3.innerHTML = "C";
  var tr = document.createElement('tr');
  tr.appendChild(th1);
  tr.appendChild(th2);
  tr.appendChild(th3);
  var thead = document.createElement('thead');
  thead.appendChild(tr);

  var textA1 = document.createElement('textarea');
  textA1.name = "a";
  textA1.className = "textABC";
  var textA2 = document.createElement('textarea');
  textA2.name = "b";
  textA2.className = "textABC";
  var textA3 = document.createElement('textarea');
  textA3.name = "c";
  textA3.className = "textABC";
  var td1 = document.createElement('td');
  td1.appendChild(textA1);
  var td2 = document.createElement('td');
  td2.appendChild(textA2);
  var td3 = document.createElement('td');
  td3.appendChild(textA3);
  var tr2 = document.createElement('tr');
  tr2.appendChild(td1);
  tr2.appendChild(td2);
  tr2.appendChild(td3);
  var tbody = document.createElement('tbody');
  tbody.appendChild(tr2);

  var table = document.createElement('table');
  table.className = "table table-bordered";
  table.appendChild(thead);
  table.appendChild(tbody);

  var divTable = document.createElement('div');
  divTable.className = "card-bodyTb";
  divTable.appendChild(table);

  var divABC = document.createElement('div');
  divABC.className = "form-group";
  divABC.appendChild(divTable);

  var textApp = document.createElement('textarea');
  textApp.id = "appunti";
  textApp.className= "form-control";
  textApp.row = "4";
  textApp.name = "appunti";
  var labApp = document.createElement('label');
  labApp.for = "appunti";
  labApp.innerHTML = "Appunti terapeuta";

  var divAppunti = document.createElement('div');
  divAppunti.className= "form-group";
  divAppunti.appendChild(labApp);
  divAppunti.appendChild(textApp);

  var addEpBtn = document.createElement('button');
	addEpBtn.type = "submit";
  addEpBtn.name = "action";
  addEpBtn.value = "addEpisodio";
  addEpBtn.className = "btn btn-success";
  addEpBtn.innerHTML = "Aggiungi Episodio";

	var hidIn = document.createElement('input');
	hidIn.type = "text";
	hidIn.name = "hIdS";
	hidIn.value = document.getElementById('hideIdScheda').value;
	hidIn.hidden = true;

  root.appendChild(p);
  root.appendChild(divAnalisi);
  root.appendChild(divABC);
  root.appendChild(divAppunti);
	root.appendChild(hidIn);
  root.appendChild(addEpBtn);

  $('#btnAddEp').hide();
}

function newEp(idScheda){
  var xhttp = getXmlHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			console.log("res="+this.responseText);
			var res = JSON.parse(this.responseText);
			createEp(res);
		}
	};
	console.log("id ="+idScheda);
	xhttp.open("POST", "/PsyMeet-C12/applicationLogic/SeduteControlForm.php", true);
	xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhttp.send("action=recoveryScheda&idScheda="+idScheda);
}

function createAnEp(scheda){
	var roots = document.getElementsByClassName('anEpisodio');
  if (roots != null) {
		console.log("non è null. roots= "+roots[0]+" poi "+roots[1]);
		console.log(typeof roots[0]);
		for(var i=0;i<roots.length;i++){
			while (roots[i].hasChildNodes()) {
	      roots[i].removeChild(roots[i].childNodes[0]);
	    }
		}
  }
	else{
		var preRoot = document.getElementsByClassName['card-body'];
		console.log(preRoot);
		var rootEp = preRoot[preRoot.length -2];

		roots = document.createElement('form');
		roots.className = "anEpisodio";
		roots.method = "POST";
		roots.action = "../../applicationLogic/SeduteControlForm.php";
		var cardEp = document.createElement('div');
		cardEp.className = "card-bodyEp";
		cardEp.appendChild(roots);
		rootEp.appendChild(cardEp);
	}

  var inputNumEp = document.createElement('input');
  inputNumEp.type = 'text';
  //inputNumEp.min = '1';
  //inputNumEp.max = '10';
  inputNumEp.name = "numero";
  inputNumEp.value = parseInt(scheda.n_episodi) + 1;
  var p = document.createElement('p');
  p.innerHTML = "Episodio";
  p.appendChild(inputNumEp);

  var divAnalisi = document.createElement('div');
  divAnalisi.className = "form-group";
  var textAn = document.createElement('textarea');
  textAn.id = "inputDescription";
  textAn.className = "form-control";
  textAn.rows = "4";
  textAn.name = "analisi";
  var labAn = document.createElement('label');
  labAn.for = "inputDescription";
  labAn.innerHTML = "Analisi Funzionale";
  divAnalisi.appendChild(labAn);
  divAnalisi.appendChild(textAn);

  var th1 = document.createElement('th');
  th1.innerHTML = "A";
  var th2 = document.createElement('th');
  th2.innerHTML = "B";
  var th3 = document.createElement('th');
  th3.innerHTML = "C";
  var tr = document.createElement('tr');
  tr.appendChild(th1);
  tr.appendChild(th2);
  tr.appendChild(th3);
  var thead = document.createElement('thead');
  thead.appendChild(tr);

  var textA1 = document.createElement('textarea');
  textA1.name = "a";
  textA1.className = "textABC";
  var textA2 = document.createElement('textarea');
  textA2.name = "b";
  textA2.className = "textABC";
  var textA3 = document.createElement('textarea');
  textA3.name = "c";
  textA3.className = "textABC";
  var td1 = document.createElement('td');
  td1.appendChild(textA1);
  var td2 = document.createElement('td');
  td2.appendChild(textA2);
  var td3 = document.createElement('td');
  td3.appendChild(textA3);
  var tr2 = document.createElement('tr');
  tr2.appendChild(td1);
  tr2.appendChild(td2);
  tr2.appendChild(td3);
  var tbody = document.createElement('tbody');
  tbody.appendChild(tr2);

  var table = document.createElement('table');
  table.className = "table table-bordered";
  table.appendChild(thead);
  table.appendChild(tbody);

  var divTable = document.createElement('div');
  divTable.className = "card-bodyTb";
  divTable.appendChild(table);

  var divABC = document.createElement('div');
  divABC.className = "form-group";
  divABC.appendChild(divTable);

  var textApp = document.createElement('textarea');
  textApp.id = "appunti";
  textApp.className= "form-control";
  textApp.row = "4";
  textApp.name = "appunti";
  var labApp = document.createElement('label');
  labApp.for = "appunti";
  labApp.innerHTML = "Appunti terapeuta";

  var divAppunti = document.createElement('div');
  divAppunti.className= "form-group";
  divAppunti.appendChild(labApp);
  divAppunti.appendChild(textApp);

  var addEpBtn = document.createElement('button');
	addEpBtn.type = "submit";
  addEpBtn.name = "action";
  addEpBtn.value = "addEpisodio";
  addEpBtn.className = "btn btn-success";
  addEpBtn.innerHTML = "Aggiungi Episodio";

/*	var hidIn = document.createElement('input');
	hidIn.type = "text";
	hidIn.name = "hIdS";
	hidIn.value = document.getElementById('hideIdScheda').value;
	hidIn.hidden = true;*/

  roots[0].appendChild(p);
  roots[0].appendChild(divAnalisi);
  roots[0].appendChild(divABC);
  roots[0].appendChild(divAppunti);
	//root.appendChild(hidIn);
  roots[0].appendChild(addEpBtn);

  $('#btnAddAnEp').hide();
}

function anEp(idScheda){
	var xhttp = getXmlHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			console.log("res="+this.responseText);
			var res = JSON.parse(this.responseText);
			createAnEp(res);
		}
	};
	console.log("id ="+idScheda);
	xhttp.open("POST", "/PsyMeet-C12/applicationLogic/SeduteControlForm.php", true);
	xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhttp.send("action=recoveryScheda&idScheda="+idScheda);
}

function saveScheda(dataS,idT){
  var xhttp = getXmlHttpRequest();
	xhttp.onreadystatechange = function () {
		if (this.readyState == 4 && this.status == 200) {
			var res = JSON.parse(this.responseText);
			if(res.ok){
        document.getElementById('hideIdScheda').value = res.idScheda;
        document.getElementById('btnAddEp').hidden = false;
        $('#btnAddScheda').hide();
      }
		}
	};
	xhttp.open("POST", "/PsyMeet-C12/applicationLogic/SeduteControlForm.php", true);
	xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
	xhttp.send("action=saveScheda&idTerapia="+idT+"&data="+dataS);
}
