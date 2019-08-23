<?php

define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__.'/Model/model.php');


/*
* classe controller parente
*/
class controller {

public $mod ;
public $contDB ;

/*
* Crée le model et init la variable contDB .
*/
public function init(){
    $this->mod = new model ;
    $this->contDB = $this->mod->db ;

}


}


?>
