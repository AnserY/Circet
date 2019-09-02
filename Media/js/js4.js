$(document).ready(function() {

    $("[id^=file]").change(function(e) {
        var files = e.target.files,
            f = files[0];
        var id="";
        try {
         id = e.target.id.match(/\d+/)[0] ;
        } catch (error) {
            id="";
        }
        var reader = new FileReader();
        reader.onload = function(e) {
            var data = new Uint8Array(e.target.result);
            var workbook = XLSX.read(data, {
                type: 'array'
            });
            var feuille = $("#feuille"+id);
            feuille.empty();
            for (var i = 0; i < workbook.SheetNames.length; i++) {
              feuille.append('<option>'+workbook.SheetNames[i]+'</option>');
            }

        };
        reader.readAsArrayBuffer(f);
    });
});
