<?php

require_once('controller.php');

class controllerAdmin extends controller
{

function __construct(){
   $this->init();
 }


 /*
 * update la base de donne
 */
public function update($date,$name,$pathfile){
  $result = 0;
  $except = sizeof($date);
  $index = 0 ;


  foreach ($date as $key => $value) {
      $stmt = $this->contDB->prepare('INSERT INTO users (Date,CheminFichier,NomFichier) VALUES (:Date,:CheminFichier,:NomFichier)');
      if($stmt->execute([
            'Date' => date('Y-m-d H:i:s' , strtotime($date[$index])),
            'CheminFichier' => $pathfile[$index],
            'NomFichier' => $name[$index],
      ])){
        $result++;
      }
    $index++;
  }
    return $result==$except?"ok":"err";
}

}

?>
