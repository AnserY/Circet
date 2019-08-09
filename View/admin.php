<!DOCTYPE html>
<?php
  require_once(dirname(dirname(__FILE__)).'/Controller/controllerUser.php');
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script type="text/javascript">

      $(document).ready(function(){

      var max_fields = 10 ;
      var add_input_button = $('.add_input_button');
      var field_wrapper  = $('.field_wrapper');
      var input_count = 1;

      //add
      $(add_input_button).click(function(){
        if(input_count < max_fields){
          input_count ++;

        $(field_wrapper).append('<div class="form-row"><div class="row"><div class="col"><input type="text" class="form-control" id="date1"  name="date" placeholder="JJ/MM/AAAA" required></div><div class="col"><input type="text" class="form-control" id="name1" name="name" placeholder="Nom du fichier" required></div>  <div class="col input-group-prepend"><input type="file" class="custom-file-input" id="file1" name="file" aria-describedby="inputGroupFileAddon01" required><label class="custom-file-label" for="inputGroupFile01">Choisir le fichier</label></div><div class="col"><a href="javascript:void(0);" class="remove_input_button" title="remove field"><img src="https://img.icons8.com/color/38/000000/minus.png"/></a></div></div></div>');

        $('#date1').attr('name','date'+input_count);
        $('#date1').attr('id','date'+input_count);
        $('#name1').attr('name','name'+input_count);
        $('#name1').attr('id','name'+input_count);
        $('#file1').attr('name','file'+input_count);
        $('#file1').attr('id','file'+input_count);

      }
      });
    //remove
      $(field_wrapper).on('click', '.remove_input_button', function(e){
        e.preventDefault();
        $(this).parent('div').parent().parent().remove();
        input_count--;
        });
      });

    </script>

    <script type="text/javascript">

    $(document).ready(function(e){

    $("#fupForm").submit(function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'Controller/controllerAdminHandler.php',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData:false,
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5");
            },
            success: function(msg){

              $('.statusMsg').html('');
                if(msg == 'ok'){
                    $('#fupForm')[0].reset();
                    $('.statusMsg').html('<span style="font-size:18px;color:#34A853">Données soumises avec succès.</span>');
                }else{
                    $('.statusMsg').html('<span style="font-size:18px;color:#EA4335">Un problème est survenu, veuillez réessayer.</span>');
                }
                $('#fupForm').css("opacity","");
                $(".submitBtn").removeAttr("disabled");
                $("input").val('');
            }
        });
    });



  });


    </script>

    <title>CircetAdmin</title>
  </head>
  <body>

    <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
       <a class="navbar-brand" href="#">
         <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" >
       </a>
     </nav>

<p class="statusMsg d-flex justify-content-center"></p>
<div class="d-flex justify-content-center" >



<form enctyp="multipart/form-data" id="fupForm" method="Post" autocomplete="off">

<div class="field_wrapper">
<div class="form-row ">

<div class="row">

  <div class="col">
    <input type="text" class="form-control" id="date" name="date" placeholder="JJ/MM/AAAA " required>
 </div>

 <div class="col">
    <input type="text" class="form-control" id="name" name="name" placeholder="Nom du fichier" required>
 </div>

  <div class="col input-group-prepend" >
    <input type="file" class="custom-file-input" id="file" name="file" aria-describedby="inputGroupFileAddon01" required>
    <label class="custom-file-label" for="inputGroupFile01">Choisir le fichier</label>
  </div>

  <div class="col">
    <a href="javascript:void(0);" class="add_input_button" title="Add field"><img src="https://img.icons8.com/flat_round/38/000000/plus.png"/></a>
  </div>



</div>
</div>
</div>

<pre></pre>
<button type="submit" name="submit" class="btn btn-primary "> Mettre en ligne </button>


</form>




</div>

<div class="fixed-bottom">

<footer class="page-footer font-small blue">

 <div class="footer-copyright text-center py-3">© 2019 Copyright:
 <a href="#"> Circet.fr</a>
 </div>


 </footer>

</div>

</body>


</html>
