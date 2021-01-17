function checkChiamata(){
    let request= {'azione' : 'checkChiamata'};
    $.ajax({
        url: "../../applicationLogic/videoConferenzaControl.php",
        type: "post",
        data: request,
        success: function (response){
            response= JSON.parse(response);
            if(response.esito==true){
                $("#bottoneChiamata").show();
                $("#bottoneCheck").hide();
            }
            if(response.esito==false){
                $("#bottoneChiamata").hide();
                $("#bottoneCheck").show();
            }
        },
        error: function(err){
            console.log(err);
        }
    });
}
function vaiChiamata(){
    window.location.replace("videoConferenza.php");
}