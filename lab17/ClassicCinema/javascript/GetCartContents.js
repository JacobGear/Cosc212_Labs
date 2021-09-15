let GetCartContents = (function(){
    let pub = {};

    pub.setup = function(){
        $.ajax({
            type: "POST",
            url: "../app/processCartContents.php",
            cache: false,
            data: window.sessionStorage.getItem("cart"),
            datatype: 'JSON',
            contentType: "application/json; charset=utf-8",
            success: function(data) {
                $("#cartTable").html(data);
            },
            error: function(){
                alert("Ajax Failed");
            }
        });
    }

    return pub;
}());


$(document).ready(GetCartContents.setup);


