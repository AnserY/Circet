$(document).ready(function() {

    var max_fields = 10;
    var add_input_button = $('.add_input_button');
    var field_wrapper = $('.field_wrapper');
    var input_count = 1;

    //Ajout
    $(add_input_button).click(function() {
        if (input_count < max_fields) {
            input_count++;

            $(field_wrapper).append('<div class="form-row"><div class="row"><div class="col"><input type="text" class="form-control" id="date1"  name="date" placeholder="AAAA/MM/JJ" style="width:150px;" style="max-width: 150px;" required></div><div class="col"><input type="text" class="form-control" id="name1" name="name" placeholder="Nom du fichier" style="width:150px;" style="max-width: 150px;" required></div>  <div class="col input-group-prepend"><input type="file" class="custom-file-input" id="file1" name="file" aria-describedby="inputGroupFileAddon01" style="width:200px;" style="max-width: 200px;" required><label class="custom-file-label" for="inputGroupFile01">Choisir le fichier</label></div><div class="col"><select id="feuille1" name="feuille1" class="form-control" style="width:200px;" style="max-width: 200px;" required></select></div><div class="col"><a href="javascript:void(0);" class="remove_input_button" title="remove field"><img src="https://img.icons8.com/color/38/000000/minus.png"/></a></div></div></div>');

            $('#date1').attr('name', 'date' + input_count);
            $('#date1').attr('id', 'date' + input_count);
            $('#name1').attr('name', 'name' + input_count);
            $('#name1').attr('id', 'name' + input_count);
            $('#file1').attr('name', 'file' + input_count);
            $('#file1').attr('id', 'file' + input_count);
            $('#feuille1').attr('name', 'feuille' + input_count);
            $('#feuille1').attr('id', 'feuille' + input_count);

        }
        $.getScript("Media/js/js4.js");
        $.getScript("Media/js/js7.js");
    });
    //Supp
    $(field_wrapper).on('click', '.remove_input_button', function(e) {
        e.preventDefault();
        $(this).parent('div').parent().parent().remove();
        input_count--;
    });
});
