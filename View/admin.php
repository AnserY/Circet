<!DOCTYPE html>
<?php
  require_once(dirname(dirname(__FILE__)).'/Controller/controllerAdmin.php');

  $AUTH_USER = 'circet';
  $AUTH_PASS = 'circet';
  header('Cache-Control: no-cache, must-revalidate, max-age=0');
  $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));
  $is_not_authenticated = (
    !$has_supplied_credentials ||
    $_SERVER['PHP_AUTH_USER'] != $AUTH_USER ||
    $_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
  );
  if ($is_not_authenticated) {
    header('HTTP/1.1 401 Authorization Required');
    header('WWW-Authenticate: Basic realm="Access denied"');
    exit;
  }
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script lang="javascript" src="Media/js/js-xlsx/dist/xlsx.full.min.js"></script>
<script src='Media/js/js1.js' type="text/javascript"></script>
<script src='Media/js/js2.js'  type="text/javascript"></script>
<script src='Media/js/js3.js'  type="text/javascript"></script>
<script src='Media/js/js4.js'  type="text/javascript"></script>
<link rel="stylesheet" href="Media/css/css1.css">


  <title>CircetAdmin</title>
  </head>
  <body>


    <div id="main">

    <header>
      <div id="banner">
      <div >
          <img src="Media/img/logoCircet.png" alt="">
      </div>

      </div>
    </header>
<p class="statusMsg d-flex justify-content-center"></p>
<div class="d-flex justify-content-center" >



<form enctyp="multipart/form-data" id="fupForm" method="Post" autocomplete="off">

<div class="field_wrapper">
<div class="form-row ">

  <div class="row">

  <div class="col">
    <input type="text" class="form-control" id="date" name="date" placeholder="AAAA/MM/JJ" style="width:150px;" style="max-width: 150px;" required >
  </div>

  <div class="col">
    <input type="text" class="form-control" id="name" name="name" placeholder="Nom du fichier" style="width:150px;" style="max-width: 150px;" required >
  </div>

  <div class="col input-group-prepend" >
    <input type="file" class="custom-file-input " id="file" name="file" aria-describedby="inputGroupFileAddon01" style="width:200px;" style="max-width: 200px;"  required >
    <label class="custom-file-label  " for="inputGroupFile01">Choisir le fichier</label>
  </div>

<div class="col input-group-prepend">
  <select id="feuille" name="feuille" class="form-control" style="width:200px;" style="max-width: 200px;" required>

  </select>
</div>

  <div class="col">
    <a href="javascript:void(0);" class="add_input_button" title="Add field"><img src="https://img.icons8.com/flat_round/38/000000/plus.png"/></a>
  </div>


</div>
</div>
</div>

<pre></pre>

    <input type="text" class="form-control w-50 p-3" id="note" name="note" placeholder="Note" >
    <pre></pre>
          <input type="checkbox" id="check" aria-label="Checkbox for following text input">
          <label for="">Mettre une note sans envoyer de fichier</label>
    <pre></pre>
<button type="submit" name="submit" class="btn btn-primary "> Mettre en ligne </button>

</form>

</div>
</div>



</body>
</html>
