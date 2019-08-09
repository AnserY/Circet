<?php


require_once(dirname(dirname(__FILE__)).'/Config/config.php');


class model{

static $connections = array();

public $conf ='default';
public $db;

function __construct(){

$conf = Config::$database[$this->conf];

if(isset(model::$connections[$this->conf])){
  //connection deja effectue
  $this->db= model::$connection[$this->conf];
  return true;
}

try {
  $pdo = new PDO('mysql:host='.$conf['host'].
            ';dbname='.$conf['database'],
            $conf['login'],$conf['password'],
            array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
  model::$connections[$this->conf] = $pdo ;
  $this->db = $pdo ;



} 	catch(PDOException $e){
		if (Conf::$debug >= 1) {
		     die($e->getMessage());
		}else{
			die('Imposible de se connecter à la base de donnée!!!');
		}
	}



}
}
?>
