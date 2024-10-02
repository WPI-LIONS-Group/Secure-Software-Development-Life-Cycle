/*
 * This is a jQuery script that only runs once all the DOM elements have been loaded. 
 * It centers the #main div vertically on the page when ever the page is loaded or resized.
 */
$(document).ready(function () {
    // Function to center the #main div vertically
    function centerMainDiv() {
        var windowHeight = Math.round($(window).height() / 2);
        var divHeight = Math.round($("#main").height() / 2);
        var top = windowHeight - divHeight;
        $("#main").css("margin-top", top);
    }

    // Center the #main div when the window finishes loading
    $(window).on("load", function () {
        centerMainDiv();
    });

    // Re-center the #main div when the window is resized
    $(window).on("resize", function () {
        centerMainDiv();
    });
});
