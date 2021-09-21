let Reviews = (function() {
    let pub = {};

    function btnAdd() {
        //let filmList = document.getElementsByClassName("film");
        $(".film").append("<input type=\"button\" class=\"showReviews\" value=\"Show Reviews\">");
        $(".film").append("<div class=\"review\"></div>");
    }

    function failMessage(target) {
        target.append("No Reviews!");
    }

    /**
     * Function to parseReview by getting the data from the xml file and coverting it to html.
     * @param data
     * @param target
     */
    function parseReviews(data, target) {
        if($(data).find("review").length === 0){
            failMessage(target);
        } else {
            if(target.textContent.length < 1) {
                $(data).find("review").each(function () {
                    let rating = $(this).find("rating")[0].textContent;
                    let user = $(this).find("user")[0].textContent;
                    $(target).append("<dl>\n" +
                    "<dt>" + user + ":" + "</dt> <dd>" + rating + "</dd>" + "</dl>");
                    //target.append(user + ": " + rating + "<br>");
                });
            }
        }
    }


    function showReviews() {
        let target = $(this).parent().find(".review")[0];
        let urlData = $(this).parent().find("img")[0].src;
        urlData = urlData.replace("/images", "/reviews");
        urlData = urlData.replace(".jpg", ".xml");
        $.ajax({
            type: "GET",
            url: urlData,
            cache: false,
            success: function(data) {
                parseReviews(data, target);
            },
            error: function (){
                failMessage(target);
            }
        });
    }

    pub.setup = function() {
        btnAdd();
        $(".showReviews").click(showReviews);
    }
    return pub;
}());

$(document).ready(Reviews.setup);