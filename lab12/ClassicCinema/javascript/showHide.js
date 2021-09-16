let showHide = (function(){
    let pub = {};

    function showHideDetails() {
        $(this).siblings().toggle();
    }

    pub.setup = function() {
        "use strict";
        let films, f, title;
        films = document.getElementsByClassName("film");
        for (f = 0; f < films.length; f+=1) {
            title = films[f].getElementsByTagName("h3")[0];
            title.onclick = showHideDetails;
            title.style.cursor = "pointer";
        }
    }

    return pub;
}());

$(document).ready(showHide.setup);