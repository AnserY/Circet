$(document).ready(function() {

    $("[id^=file]").change(function(e) {
        var files = e.target.files,
            f = files[0];
        alert(e.target.id);
        var reader = new FileReader();
        reader.onload = function(e) {
            var data = new Uint8Array(e.target.result);
            var workbook = XLSX.read(data, {
                type: 'array'
            });
            alert(workbook.SheetNames[0]);

        };
        reader.readAsArrayBuffer(f);
    });
});
