$(document).ready(function(e) {

    $("#fupForm").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'Controller/controllerAdminHandler.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('.submitBtn').attr("disabled", "disabled");
                $('#fupForm').css("opacity", ".5");
            },
            success: function(msg) {
                alert(msg);
                $('.statusMsg').html('');
                if (msg == 'ok') {
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Données soumises avec succès.</span>');
                } else {
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Un problème est survenu, veuillez réessayer.</span>');
                }
                $('#fupForm').css("opacity", "");
                $(".submitBtn").removeAttr("disabled");
                $("input").val('');
            }
        });
    });

});
