$(document).ready(function() {
    $("#recherche").on('keypress', function(e) {
        if (e.which == 13) {
            showInformation($("#recherche").val());
        }
    });
});
