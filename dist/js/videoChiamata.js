function iniziaChiamata(link){
    const domain = 'meet.jit.si';
    const options = {
        roomName: link,
        width: "100%",
        height: 500,
        parentNode: document.querySelector('#videochiamata')
    };
    const api = new JitsiMeetExternalAPI(domain, options);
    return api;
}

function terminaChiamata(){
    let data= {'azione' : 'termina'};
    $.ajax({
        url: '../../applicationLogic/videoConferenzaControl.php',
        data: data,
        type: 'post',
        success:function (data){
            var response=JSON.parse(data);
            if(response.esito==true){
                $("#videochiamata").remove();
                $("#bottoni").remove();
                $("#sedute").remove();
                $("#messaggioChiamata").remove();
                $("#messaggio").show();
                $("#messaggio")[0].innerHTML="Chiamata terminata, verrai reindirizzato alla area informativa in 5 secondi";
                setTimeout(function () {
                    window.location.replace("indexProfessionista.php");
                },5000);
            }
        }
    })
}
