<?php

require_once('controllerAdmin.php');

$mycontAdmin = new controllerAdmin ;

function str_filtre($str)
{
    $url = $str;
    $url = preg_replace('#Ç#', 'C', $url);
    $url = preg_replace('#ç#', 'c', $url);
    $url = preg_replace('#è|é|ê|ë#', 'e', $url);
    $url = preg_replace('#È|É|Ê|Ë#', 'E', $url);
    $url = preg_replace('#à|á|â|ã|ä|å#', 'a', $url);
    $url = preg_replace('#@|À|Á|Â|Ã|Ä|Å#', 'A', $url);
    $url = preg_replace('#ì|í|î|ï#', 'i', $url);
    $url = preg_replace('#Ì|Í|Î|Ï#', 'I', $url);
    $url = preg_replace('#ð|ò|ó|ô|õ|ö#', 'o', $url);
    $url = preg_replace('#Ò|Ó|Ô|Õ|Ö#', 'O', $url);
    $url = preg_replace('#ù|ú|û|ü#', 'u', $url);
    $url = preg_replace('#Ù|Ú|Û|Ü#', 'U', $url);
    $url = preg_replace('#ý|ÿ#', 'y', $url);
    $url = preg_replace('#Ý#', 'Y', $url);
    $url = preg_replace('/[\x00-\x1F\x7F]/', '', $url);

    return ($url);
}

function postFile($mycontAdmin){

  $pattern= "/name[0-9]*/";
  $pattern1= "/date[0-9]*/";
  $pattern2= "/file[0-9]*/";
  $pattern3= "/feuille[0-9]*/";
  $return ;
  $uploaded = array();
  $date=array();
  $name=array();
  $feuille=array();

  foreach ($_FILES as $key => $value){
    if (preg_match($pattern2,$key)){

        if(isset($value["type"])){
          $value["name"]=str_filtre(str_replace(' ','',$value["name"]));
          $filename = time().'_'.$value["name"];
          $valid_extensions = array('xlsx','xlsm');
          $headers = apache_request_headers();
          $temporary = explode(".",$value["name"]);
          $file_extension = end($temporary);
          if(in_array($file_extension,$valid_extensions)){
            $sourcePath = $value['tmp_name'];
            $targetPath = "uploads/".$filename;
            if(move_uploaded_file($sourcePath,$targetPath)){
                array_push($uploaded,$filename);
            }
          }
      }
    }
  }
  foreach ($_POST as $key => $value) {

     if(preg_match($pattern,$key)){
       array_push($name,str_filtre($value));
      }
      if (preg_match($pattern1,$key)) {
      array_push($date,str_filtre($value));
      }
      if (preg_match($pattern3,$key)) {
      array_push($feuille,str_filtre($value));
      }
    }

 $return=$mycontAdmin->update($date,$name,$uploaded);

    if ( $return == "ok") {
          foreach ($uploaded as $key => $value) {
            $valueHtml = preg_replace('/\\.[^.\\s]{3,4}$/', '', $value);
            $output=shell_exec('mkdir ../View/display/'.$value.' 2>&1');
            $output1=shell_exec('cd uploads && cp '.$value.' ../../View/display/'.$value.' 2>&1');
            $output2=shell_exec('cd ../View/display/'.$value.' && export HOME=/tmp && soffice --headless --convert-to html '.$value.' && rm '.$value.' 2>&1');
            $output3=shell_exec('cd ../View/display/ && ./script.py '.$value.'/'.$valueHtml.'.html '.$value.' '.$valueHtml.'1 '.$feuille[$key].' 2>&1');
            $output4=shell_exec('cd ../View/display/'.$value.' && rm '.$valueHtml.'.html 2>&1');
            print_r($output3);
            print_r($output4);


        }
    }

  echo $return;
}



function postNote(){
  $my_file = 'note.txt';
  $handle = fopen($my_file, 'w') or die('Impossible d\'ouvrir le fichier :  '.$my_file);
  $data = strip_tags($_POST['note']);
  if($data==""){
    $data =" ";
  }
  fwrite($handle, $data);
}


if(!empty($_POST["date"]) and empty($_POST["note"])){
  postFile($mycontAdmin);
}else if (!empty($_POST["date"]) and !empty($_POST["note"]) ){
  postNote();
  postFile($mycontAdmin);
}else{
  postNote();
  echo "ok";
}





?>
