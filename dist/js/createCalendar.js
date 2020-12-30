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

function calendario(appuntamenti){
  /* initialize the calendar
   -----------------------------------------------------------------*/
  //Date for the calendar events (dummy data)
  console.log(appuntamenti);
  var date = new Date(appuntamenti.data)
  var d    = date.getDate(),
      m    = date.getMonth(),
      y    = date.getFullYear()

  var Calendar = FullCalendar.Calendar;
  var calendarEl = document.getElementById('calendar');

  var calendar = new Calendar(calendarEl, {
    plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
    header    : {
      left  : 'prev,next today',
      center: 'title',
      right : 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    'themeSystem': 'bootstrap',
    //Random default events
    events    : [
      {
        title          : 'appuntamento '+appuntamenti.ora,
        start          : new Date(y, m, d),
        backgroundColor: '#f56954', //red
        borderColor    : '#f56954', //red
        allDay         : true
      }
    ],
    editable  : true,
    droppable : true, // this allows things to be dropped onto the calendar !!!
  });

  calendar.render();
  // $('#calendar').fullCalendar()
}

$(function () {
  var xhttp = getXmlHttpRequest();
	xhttp.onreadystatechange = function(){
		if(this.readyState == 4 && this.status == 200){
			calendario(this.responseText);
		}
	};
  var url = window.location.pathname;
  console.log(url);
  var str = 'RSSMRC80R12H703U';
  xhttp.open("get","/psymeet/applicationLogic/AppuntamentoControl.php?action=recoveryAll&key="+str,true);
	xhttp.send();
})
