<!DOCTYPE html>
<?php
require_once(dirname(dirname(__FILE__)).'/Controller/controllerUser.php');
$userCon = new controllerUser ;
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="Media/js/js5.js" type="text/javascript"></script>
    <script src="Media/js/js6.js" type="text/javascript"></script>


    <title>CircetUser</title>
  </head>
  <body>
  <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
     <a class="navbar-brand" href="#">
       <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="" >
     </a>
   </nav>


<span style="font-size:18px;color:#EA4335"> <?php echo $userCon->readNote(); ?> </span>
<div class="d-flex flex-row-reverse">
  <input type="text" id="recherche" name="recherche" placeholder="Recherche" class="p-2">
</div>


<div class="position-static">


<pre> </pre>

    <select class="form-control" onchange="showInformation(this.value)">
     <option>Selectionné une date </option>
     <?php
          $row = $userCon->allDate();
          foreach ($row as $keys => $values) {
            foreach ($values as $key => $value) {?>
              <option><?php print_r($value); ?></option>
            <?php }} ?>
   </select>

   <pre> </pre>

<div id="txtHint">les informations vont etre affichés ici .... </div>

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
