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

  $stmt = $this->contDB->prepare("select id ,Date,NomFichier,CheminFichier from users where Date =:date ");
  $stmt->bindValue(':date',$date);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  return $result ;

}

public function findFile($id){

  $stmt = $this->contDB->prepare("select CheminFichier from users where id = :id");
  $stmt->bindValue(':id',$id);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  return $result;
}

public function searchByDate($date){

  $stmt = $this->contDB->prepare("select id,Date,NomFichier from users where Date = :date");
  $stmt->bindValue(':data',$date);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
  return $result;
}


public function readNote(){
  $my_file = __DIR__.'/note.txt';
  if (' '==file_get_contents($my_file)) {
    return " ";
  }
  $handle = fopen($my_file, 'r');
  $data = fread($handle,filesize($my_file));
  return $data;
}


}
?>
