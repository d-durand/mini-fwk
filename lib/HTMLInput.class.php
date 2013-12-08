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
define ("FILE","file");					

class HTMLInput{
		
	public $name;
	public $value;
	public $id;
	public $label;
	public $type;
	public $options;//pour liste select ou groupe de boutons radio
	public $checked=false;
	public $selected="";
	public $required=false;
	public $error=false;
	public $errormsg='';
	public $validation='';
		
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
	
	public function set_options($options){
		if($this->type==SELECT||$this->type==RADIO)
			$this->options=options;
		else
			throw new Exception("set_options() est réservée aux champs SELECT/RADIO");
	}

	public function set_required($val=true){
		$this->required= $val ? 'required' : '';
		return $this;
	}
	
	public function set_validation($validation){
		$this->validation= $validation;
	}
	
	public function set_error($err=true){
		$this->error = $err ? 'has-error' : '';
		return $this;
	}

	public function set_error_message($errmsg=""){
		$this->errormsg= $errmsg;
		return $this;
	}



	function __toString(){

		try{


		$s="";
		
		global $tpl;		
		$tpl->assign("f_id",$this->id);
		$tpl->assign("f_name",$this->name);
		$tpl->assign("f_required",$this->required);
		$tpl->assign("f_error",$this->error);
		$tpl->assign("f_value",$this->value);
		$tpl->assign("f_label",$this->label);
		$tpl->assign("f_checked",$this->checked?"checked='checked'":'');
		if($this->errormsg)
			$tpl->assign("f_msg",$this->errormsg);
		else
			$tpl->assign("f_msg",NULL);
		
		switch($this->type){
			case TEXT : 
				//$s="<input $common $class_control type='text' value='{$this->value}'>" ;		
					$s=$tpl->fetch("file:templates/champs/text.tpl");
			break;

			case HIDDEN : 
					$s=$tpl->fetch("file:templates/champs/hidden.tpl");
			break;

			case TEXTAREA :
					$s=$tpl->fetch("file:templates/champs/textarea.tpl");
			break;

			case PASSWORD : 
					$s=$tpl->fetch("file:templates/champs/password.tpl");
			break;

			case FILE : 
					$s=$tpl->fetch("file:templates/champs/file.tpl");
			break;
			
			case CHECK : 
					$s=$tpl->fetch("file:templates/champs/checkbox.tpl");
			break;

			case RADIO : 
					$tpl->assign("f_options",$this->options);
					$s=$tpl->fetch("file:templates/champs/radio.tpl");
			break;

			case SELECT : 
				$tpl->assign("f_options",$this->options);
				$s=$tpl->fetch("file:templates/champs/select.tpl");
			break;

			case SUBMIT : 
				$s=$tpl->fetch("file:templates/champs/submit.tpl");
			break;

			default: return "[CHAMP INCONNU]";			
			
		}
		
		return $s;
		}catch(Exception $e){return "Exception dans le template de {$this->name}";}
		
	}
}
?>