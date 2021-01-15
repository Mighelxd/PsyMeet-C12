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

