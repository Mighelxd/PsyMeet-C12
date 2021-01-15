function iniziaChiamata(link){
    const domain = 'meet.jit.si';
    const options = {
        roomName: 'JitsiMeetAPIExample',
        width: "100%",
        height: "100%",
        parentNode: document.querySelector('#videochiamata')
    };
    const api = new JitsiMeetExternalAPI(domain, options);
    return api;
}