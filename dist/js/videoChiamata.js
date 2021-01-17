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
                $("#messaggio")[0].innerHTML="Chiamata terminata, verrai reindirizzato all'area informativa in 5 secondi";
                setTimeout(function () {
                    window.location.replace("indexProfessionista.php");
                },5000);
            }
        }
    })
}
function apriFinestra(url,w,h){
    leftOffset = (screen.width/2) - w/2;
    topOffset = (screen.height/2) - h/2;
    window.open(url, this.target, 'left=' + leftOffset + ',top=' + topOffset + ',width=' + w + ',height=' + h + ',resizable,scrollbars=yes');
}

function terminaChiamataPaz(){
    $("#videochiamata").remove();
    $("#messaggioChiamata")[0].innerHTML="Chiamata terminata, verrai reindirizzato all'area informativa in 5 secondi";
    setTimeout(function () {
        window.location.replace("indexPaziente.php");
    },5000);
}