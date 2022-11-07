function sendGAEvent(category, action){
    if(window.__googlesitekitBaseData !== undefined){
        var UAID = window.__googlesitekitBaseData.trackingID;
        ga('create', UAID, 'auto');
        ga('send', {
            hitType: 'event',
            eventCategory: category,
            eventAction: action,
            eventLabel: 'Fall Campaign'
        });
    } else {
        return new Error('Google Site Kit is not running');
    }
}