$(document).ready(function () {

    $(window).on("load", function () {

        var windowHeight = Math.round($(window).height() / 2);
    
        var divHeight = Math.round($("#main").height() / 2);
    
        var top = windowHeight - divHeight;
    
        $("#main").css("margin-top", top);
    });

    $(window).on("resize", function () {

        windowHeight = Math.round($(window).height() / 2);
    
        divHeight = Math.round($("#main").height() / 2);
    
        console.log(windowHeight + "," + divHeight);

        top = windowHeight - divHeight;
        
        $("#main").css("margin-top", top);

    });

});