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
       /*     var btnDel = document.createElement('p');
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
            }*/
            var divClasseCard = document.createElement('div');
            divClasseCard.className = "cardApp";
            var elH3 = document.createElement('h3');
            elH3.className = "descApp";
            elH3.innerHTML = appu[i].descrizione;
            var elPdata = document.createElement('p');
            elPdata.className = "dataApp";
            var d = new Date(appu[i].data);
            var month = appu[i].data.substr(5,2);
            var dFoIt = d.getDate()+"/"+month+"/"+d.getFullYear();
            elPdata.innerHTML = "data: " + dFoIt;
            var elPora = document.createElement('p');
            elPora.className = "oraApp";
            var o = appu[i].ora;
            var hhmm = o.substr(0,5);
            elPora.innerHTML = "ora: " + hhmm;
            var elPpaz = document.createElement('p');
            elPpaz.className = "profApp";
            elPpaz.innerHTML = "con " + appu[i].cf_prof;

            divClasseCard.appendChild(elH3);
            divClasseCard.appendChild(elPpaz);
            divClasseCard.appendChild(elPdata);
            divClasseCard.appendChild(elPora);

            divClasseCol.appendChild(divClasseCard);
            //divClasseCol.appendChild(btnMod);
            //divClasseCol.appendChild(btnDel);

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
            console.log(this.responseText);
            var app = JSON.parse(this.responseText);
            createApp(app);
        }
    };
    xhttp.open("POST", "/PsyMeet-C12/applicationLogic/AppuntamentoControl.php", true);
    xhttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    xhttp.send("action=recoveryAllByPaz");
})