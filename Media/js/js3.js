$(document).ready(function(e) {

    $("#check").change(function() {
        if (this.checked) {
            $("[id^=date]").removeAttr("required");
            $("[id^=name]").removeAttr("required");
            $("[id^=file]").removeAttr("required");
            $("[id^=feuille]").removeAttr("required");
        } else {
            $("[id^=date]").attr("required", "required");
            $("[id^=name]").attr("required", "required");
            $("[id^=file]").attr("required", "required");
            $("[id^=feuille]").attr("required", "required");
        }
    });
});
