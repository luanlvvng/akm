$(document).ready(function(){
	$('body').scrollator();
    $("a[href='#top']").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "fast");
        return false;
    });
    if ($(this).scrollTop() > 40) { $('#wrap-menu').addClass("f-nav"); }
    
    var allMods = $(".visible-animation");
    allMods.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
            el.addClass("already-visible"); 
        }
    });
    var allMods2 = $(".visible-animation2");
    allMods2.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
            el.addClass("already-visible2"); 
        }
    });
    var allMods3 = $(".visible-animation3");
    allMods3.each(function(i, el) {
        var el = $(el);
        if (el.visible(true)) {
            el.addClass("already-visible3"); 
        }
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 40) {
            $('.wrap-menu').addClass("f-nav");
        } else {
            $('.wrap-menu').removeClass("f-nav");
        }
        allMods.each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("come-in"); 
            } 
        });
        allMods2.each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("come-in2"); 
            } 
        });
        allMods3.each(function(i, el) {
            var el = $(el);
            if (el.visible(true)) {
                el.addClass("come-in3"); 
            } 
        });
    });



    // bing-hover

    $('.bing-obj').hover(function(){
        $('.bing-hover',this).fadeIn(200)},
        function(){
        $('.bing-hover',this).fadeOut(200);
    }
    );

})