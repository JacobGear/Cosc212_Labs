function doAjax() {
    $("#helloResult").load("ajaxResponse.php");
}
function setup() {
    $("#helloButton").click(doAjax);
}
$(document).ready(setup);