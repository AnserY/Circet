<?php

require_once('controllerAdmin.php');

$mycontAdmin = new controllerAdmin ;
$pattern= "/name[0-9]*/";
$pattern1= "/date[0-9]*/";
$pattern3= "/file[0-9]*/";


if(isset($_POST) || isset($_POST) || isset($_FILES)){

$uploaded = array();
$date=array();
$name=array();

foreach ($_FILES as $key => $value) {
  if (preg_match($pattern3,$key)) {
      if(isset($value["type"])){
        $filename = time().'_'.$value["name"];
        $valid_extensions = array('jpeg','jpg ','png','xlsx');
        $temporary = explode(".",$value["name"]);
        $file_extension = end($temporary);
        if(in_array($file_extension,$valid_extensions)){
          $sourcePath = $value['tmp_name'];
          $targetPath = "uploads/".$filename;
          if(move_uploaded_file($sourcePath,$targetPath)){
              array_push($uploaded,$filename);
          }
        }else {
            die();
        }

      }
  }
}

foreach ($_POST as $key => $value) {
   if(preg_match($pattern,$key)){
    array_push($name,$value);
    }
    if (preg_match($pattern1,$key)) {
    array_push($date,$value);
    }
}
  echo $mycontAdmin->update($date,$name,$uploaded);
}


?>
