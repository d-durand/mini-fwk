<?php
/**
* OMGL3
* Class HTMLInput : champ de saisie pour formulaire HTML
*
*/
define ("TEXT","text");
define ("TEXTAREA","textarea");
define ("PASSWORD","password");
define ("CHECK","checkbox");
define ("RADIO","radio");
define ("SELECT","select");					
define ("SUBMIT","submit");					
define ("HIDDEN","hidden");					

class HTMLInput{
		
	public $name;
	public $value;
	public $id;
	public $label;
	public $type;
	public $options;
	public $checked=false;
	public $selected="";
	public $required=false;
	public $error=false;
	public $errormsg='';
		
	public function __construct($type,$name='',$id='',$label='&nbsp;',$options=array()){
		$this->type=$type;
		$this->name=$name;
		$this->id=$id;
		$this->label=$label;		
		$this->options=$options;
	}
	
	public function check($bool=TRUE){
		$this->checked= $bool;	
		return $this;
	}

	public function set_value($val){
		$this->value=htmlspecialchars($val,ENT_QUOTES);
		return $this;
	}

	public function set_required($val=true){
		$this->required= $val ? 'required' : '';
		return $this;
	}
	public function set_error($err=true){
		$this->error= $err ? 'error' : '';
		return $this;
	}

	public function set_error_message($errmsg=""){
		$this->errormsg= $errmsg;
		return $this;
	}



	function __toString(){

		$classes = "class='{$this->error} {$this->required}'";
		$label="<label $classes for='{$this->id}'>{$this->label}</label>";
		$common = "id='{$this->id}' name='{$this->name}' $classes"; 
		$msg=$this->errormsg?"<span>{$this->errormsg}</span>":"";
		
		switch($this->type){
			case TEXT : 
			return "$label<input $common type='text' value='{$this->value}' /> $msg" ;		

			case HIDDEN : 
			return "<input $common type='hidden' value='{$this->value}' /> $msg" ;		

			
			case TEXTAREA :
			return "$label<textarea $common>{$this->value}</textarea> $msg" ;
			
			case PASSWORD : 
			return "$label<input $common type='password' value='{$this->value}' /> $msg" ;
			
			case CHECK : 
			return "$label<input type='checkbox' "
					.($this->checked?"checked='checked'":'')
					." value='{$this->value}' $common' /> $msg" ; 
					
			case RADIO : return "$label<input type='radio' "
					.($this->checked?"checked='checked'":'')
					." value='{$this->value}' $common' />"
					."<span>{$this->value}</span>$msg" ; 
					
			case SELECT : $s="$label<select $common>";
				foreach($this->options as $k=>$v)
					$s.='<option value="'.$k.'" '.($k===$this->value || $v===$this->value ? "selected='selected'":'').">$v</option>";
				$s.="</select> $msg";
				return $s;
					
			
			break;
			case SUBMIT : 
			return "$label<input type='submit' value='{$this->value}' $common />" ; 
			
			default: return "[CHAMP INCONNU]";			
			
			
		}
		return "[CHAMP INCONNU]";
	}
}
?>