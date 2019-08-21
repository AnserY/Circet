<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/Model/model.php');



class controller {

public $mod ;
public $contDB ;


public function init(){
    $this->mod = new model ;
    $this->contDB = $this->mod->db ;

}


}



?>
