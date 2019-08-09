<!DOCTYPE html>
<?php
require_once(dirname(dirname(__FILE__)).'/Controller/controllerUser.php');
$userHandlerCon = new controllerUser ;
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title></title>
  </head>
  <body>

<?php
 $date = date('Y-m-d H:i:s' , strtotime($_GET['q']));
 $result = $userHandlerCon->allInformation($date);
 ?>
   <table class="table table-borderless">
  <thead>
   <tr>
     <th scope="col">Id</th>
     <th scope="col">Date de publication</th>
     <th scope="col">Nom du fichier</th>
     <th scope="col">Affichage</th>
     <th scope="col">Télechargement</th>
   </tr>
 </thead>
 <tbody>
   <?php //print_r($result) ?>
   <?php foreach ($result as $keys => $values): ?>
     <tr>
       <?php foreach ($values as $key => $value): ?>
          <th scope="row">   <?php print_r($value) ?>  </th>
       <?php endforeach; ?>
           <th scope="row"><a href=<?php echo 'Controller/controllerUserHandler.php?id='.$values['id']; ?>> Afficher </th>
           <th scope="row"><a href=<?php echo 'Controller/controllerUserHandler.php?id='.$values['id'];?>> Télecharger </a></th>
     </tr>
   <?php endforeach; ?>


</tbody>
</table>






  </body>
</html>
