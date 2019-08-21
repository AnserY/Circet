<?php

require_once('controllerUser.php');



function download($id){

  $mycontUser = new controllerUser;
  $result = $mycontUser->findFile($id);
  $path= 'uploads/'.$result[0]['CheminFichier'];
  $file=basename($path);

      if(file_exists($path)){

        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: private",false);
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=\"$file\"");
        header("Content-Type:  application/vnd.ms-excel");
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".filesize($path));
        readfile($path);
      exit;
  }else {
    echo "y'a un probleme";
  }
}

if(isset($_GET['id'])){
   download($_GET['id']);
}










?>
