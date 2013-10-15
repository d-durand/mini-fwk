<?php
session_set_cookie_params("0",dirname($_SERVER["SCRIPT_NAME"]));
session_start();
 
class Session{
 
	private static $instance;
 
 	function __construct(){
 	}
 	
 	public static function get_instance(){
 		if(!self::$instance)
 			self::$instance =  new Session();
 		return self::$instance;
 	}
  
	function ouvrir($user){
		$this->user=$user;
	}
		
	function fermer(){
		unset($this->user);
	}

	function ouverte(){
		return isset($this->user);
	}


	function __toString(){
		return ($this->$user->login);
	}
	
	
	//stocke une variable de session
	function __get($variable){
		if(!empty($_SESSION['__variables'][$variable]))
			return  $_SESSION['__variables'][$variable];
		else
			return "";
	}

	function __set($variable,$valeur){
			$_SESSION['__variables'][$variable]=$valeur;
	}

	function __unset($variable){
			unset($_SESSION['__variables'][$variable]);
	}

	function __isset($variable){
			return isset($_SESSION['__variables'][$variable]);
	}

	
}
?>