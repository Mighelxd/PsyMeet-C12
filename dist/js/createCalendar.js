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

/*function createEvents(app) {
	var str = "";
	for (a of app) {
		console.log(a.data);
		var date = new Date(a.data);
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

		str += "{\
					title:" + a.descrizione+",\
					start:new Date("+ a.data + "),\
					backgroundColor:'#f56954',\
					borderColor:'#f56954',\
					allDay:true\
				},";
	}
	var finalStr = str.substr(0, str.length - 1);
	//finalStr+="]"
	console.log(finalStr+"\nin createevents");
	return finalStr.trim();
}*/

$(function(){
  /* initialize the calendar------
   -----------------------------------------------------------------*/
  //Date for the calendar events (dummy data)
  /*var date = new Date(appuntamenti.data)
  var d    = date.getDate(),
      m    = date.getMonth(),
      y    = date.getFullYear()*/

  var Calendar = FullCalendar.Calendar;
  var calendarEl = document.getElementById('calendar');

  var calendar = new Calendar(calendarEl, {
    plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
    header    : {
      left  : 'prev,next today',
      center: 'title',
      right : 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    'themeSystem': 'bootstrap'
	  //Random default events
  });

  calendar.render();
  // $('#calendar').fullCalendar()
})