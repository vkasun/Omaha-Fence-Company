// Make nav menu scrollable when screen height is less than 635px.
$(window).on("load resize", function(){

    // If screen is too short, set max height and make menus scrollable.
    if($(window).height() < 635){
        var currentHeight = $(window).height() - 100;
        var intConvert = currentHeight.toString();
        var heightString = intConvert.concat('px');

        $('#main-nav .sub-menu').each(function(){
            $(this).css('max-height', heightString);
        });
    }

    // If screen is big enough, clear max height.
    if($(window).height() >= 635){
        $('#main-nav .sub-menu').each(function(){
            $(this).css('max-height', 'none');
        });
    }

});

