<?php
/**
* OMGL3
* Class Request : interface SGBD
*
*/
class Request{
	
	private static $inst;
	
 	//récupère un paramètre de la requete GET	
	public function get($name){
		return isset ( $_GET[$name]) ? $_GET[$name] : "";
	}

 	//récupère un paramètre de la requete POST
	public function post($name){
		return isset($_POST[$name])?$_POST[$name]:"";
	}

 	//récupère la liste des fichiers envoyés (si formulaire avec fichiers) 
	public function file($name){
		return isset($_FILES[$name])?$_FILES[$name]:NULL;
	}
 	

	public static function get_instance(){
			if (self::$inst==NULL)
				self::$inst=new Request;
			return self::$inst;
	}
	
	
	public function __get($name){
		
		if(isset ($_REQUEST[$name]) ){
			if (is_string($_REQUEST[$name]))
				return trim($_REQUEST[$name]);
			else
				return $_REQUEST[$name];
			
		}else
			return  '' ;
	}
	
}
