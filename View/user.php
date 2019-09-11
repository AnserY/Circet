<!DOCTYPE html>
<?php
require_once(dirname(dirname(__FILE__)).'/Controller/controllerUser.php');
$userCon = new controllerUser ;
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="Media/css/css1.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="Media/js/js5.js" type="text/javascript"></script>
    <script src="Media/js/js6.js" type="text/javascript"></script>
    <script src="Media/js/js7.js" type="text/javascript"></script>



    <title>CircetUser</title>
</head>

<body >

<div id="main">

<header>
  <div id="banner">
  <div >
      <img src="Media/img/logoCircet.png" alt="">
  </div>

  </div>
</header>


<div id="site_content">

  <span style="font-size:18px;color:#EA4335"> <?php echo $userCon->readNote(); ?> </span>
  <div class="d-flex flex-row-reverse">
    <input type="text" id="date" name="recherche" placeholder="Recherche" class="p-2">
  </div>

<pre> </pre>

<select class="form-control" onchange="showInformation(this.value)" style="font: normal 80% Arial, Helvetica, sans-serif; font-size: 15px;">
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

</div>
</div>


  <footer class="page-footer font-small blue">

    <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="#"> Circet.fr</a>
    </div>


  </footer>


  </body>


</html>
