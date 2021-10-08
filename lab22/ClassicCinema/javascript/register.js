let register = (function() {
    let pub = {};

    function moveToReg() {
        window.location.href = "../ClassicCinema/register.php";
    }

    pub.setup = function() {
        $("#regBtn").click(moveToReg);
    }
    return pub;
}());

$(document).ready(register.setup);