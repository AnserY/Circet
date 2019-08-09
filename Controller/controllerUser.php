<?php

require_once('controller.php');


class controllerUser extends controller
{

function __construct(){
  $this->init();
}


public function allDate(){

   $stmt = $this->contDB->prepare('select DISTINCT Date from users order by Date');
   $stmt->execute();
   $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
   $result = $stmt->fetchAll();
   return $result ;

}

public function allInformation($date){

  $stmt = $this->contDB->prepare("select id ,Date,NomFichier from users where Date = '".$date."'");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  return $result ;

}

public function findFile($id){

  $stmt = $this->contDB->prepare("select CheminFichier from users where id = '".$id."'");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  return $result;
}


/*public function test() {
    $stmt = $this->contDB->prepare("SELECT * FROM users");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $result = $stmt->fetchAll() ;

  }
*/











}
?>
