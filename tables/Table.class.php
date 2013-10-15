<?php
class Table {
	static  $db;
	public $TABLE_NAME;
	
	//constructeur par défaut
	public function __construct(){
		self::$db = DB::get_instance();
		$this->TABLE_NAME=get_class($this);
	}

	//charge l'instance avec les données de la base
	public function charger($id){
			$sql="SELECT * from $this->TABLE_NAME WHERE id=?";			
			$stmt=self::$db->prepare($sql);
			$stmt->execute(array($id));
			
			$m= $stmt->fetch(PDO::FETCH_ASSOC);			
			foreach($m as $key=>$val){
			$this->$key=$val;
		}
	}

	//remplit l'instance avec les valeurs passées en paramètre
	public function remplir($values){
		foreach($values as $key=>$val){
			$this->$key=$val;
		}
		return $this;			
	}

	function toString(){
		$vars=get_object_vars($this);
		unset ($vars['db']);
		$str="";
		foreach($vars as $atr=>$val){
			$str.="$atr:$val ";
		}
		return $str;
	}
		
	function toArray(){
		return get_object_vars($this);
	}


	function enregistrer(){
		if($this->id=="")
			$this->id=$this->inserer();			
		else
			$this->modifier();
	}


		//fonctions privées-----------------------------------------------
	private function inserer(){
			//la requête préparée nettoie les champs avant insertion
			$sql=$sql="INSERT INTO $this->TABLE_NAME SET ".$this->values_upd();
			echo $sql;
			$res=self::$db->prepare($sql);
			$res->execute();
			$this->id=self::$db->lastInsertId();
			return $this->id;
		}

	private function modifier(){
			//même remarque ici
			$sql="UPDATE $this->TABLE_NAME SET ". $this->values_upd()." WHERE id='".$this->id."'";
			$res=self::$db->prepare($sql);
			$res->execute();
		}		

	private function values(){
		$vars=get_object_vars($this);
		unset ($vars['db']);
		unset ($vars['TABLE_NAME']);		
		$str="";
		foreach($vars as $atr=>$val){
			$str.="'".$val."',";
		}
		
		return substr($str,0,-1);
	}

	private function values_upd(){
		$vars=get_object_vars($this);

		unset ($vars['db']);
		unset ($vars['TABLE_NAME']);
		print_r($vars);		
		$str="";
		foreach($vars as $atr=>$val){
			if(!empty($val))
				$str.="$atr = '$val' ,";
		}
		echo "<p>str : $str</p>";
		return substr($str,0,-1);
	}

/*	public function __sleep(){
		//unset(self::$db);
		echo "_SLEEP";
		print_r( array_keys( (array)$this ));
		return array_keys( (array)$this );	
	}				*/
}
?>