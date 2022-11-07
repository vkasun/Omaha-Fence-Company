jQuery(document).ready(function($){
    if(window.ga === undefined){
        jQuery.getScript('https://www.googletagmanager.com/gtag/js?id='+amFenceGA.id, function(){
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', amFenceGA.id);
        });
    }

    window.sendGAEvent = function(category, action){
        var UAID = amFenceGA.id;
        ga('create', UAID, 'auto');
        ga('send', {
            hitType: 'event',
            eventCategory: category,
            eventAction: action,
        });
    }

    // Header CTA Event Tracking
    $('a#header-shop-online, a#mobile-header-shop-online').click((e) => window.sendGAEvent('Header CTA', 'Shop Online', e.currentTarget.id));
    $('a#header-free-estimate, a#mobile-header-free-estimate').click((e) => window.sendGAEvent('Header CTA', 'Free Estimate', e.currentTarget.id));
    $('a#header-phone, a#mobile-header-phone').click((e) => window.sendGAEvent('Header CTA', 'Phone Call', e.currentTarget.id));
    $('a#header-email, a#mobile-header-email').click((e) => window.sendGAEvent('Header CTA', 'Email', e.currentTarget.id));
    $('a#header-finance, a#mobile-header-finance').click((e) => window.sendGAEvent('Header CTA', 'Finance', e.currentTarget.id));
});