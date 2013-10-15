<?php
/**
* OMGL3
* Class Form : Formulaire HTML
* Gère les champs, le pré-remplissage, la génération HTML
*/
class Form{

	protected $fields;
	protected $action='?';
	protected $method='POST';

	
	public function __construct($action,$id){
		$this->id=$id;
		$this->action=$action;
	} 

	function add_select($name,$id,$label='&nbsp;',$options=array()){
		$s =  new HTMLInput(SELECT,$name,$id,$label,$options);
		$this->fields[][$name]=$s;
		return $s;		
	}

	function add_text($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(TEXT,$name,$id,$label);
		$this->fields[][$name]=$s;
		return $s;		
	}

	function add_hidden($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(HIDDEN,$name,$id,$label);
		$this->fields[][$name]=$s;
		return $s;		
	}


	function add_textarea($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(TEXTAREA,$name,$id,$label);
		$this->fields[][$name]=$s;
		return $s;		
	}

	function add_password($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(PASSWORD,$name,$id,$label);
		$this->fields[][$name]=$s;
		return $s;		
	}

	function add_submit($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(SUBMIT,$name,$id,$label);
		$this->fields[][$name]=$s;
		return $s;		
	}

	function add_checkbox($name,$id,$label='&nbsp;',$checked=FALSE){
		$s =  new HTMLInput(CHECK,$name,$id,$label);
		$s->check($checked);
		$this->fields[][$name]=$s;
		return $s;		
	}

	function add_radio($name,$id,$label='&nbsp;',$checked=FALSE){
		$s =  new HTMLInput(RADIO,$name,$id,$label);
		$s->check($checked);
		$this->fields[][$name]=$s;
		return $s;		
	}


	function __get($champName){
		foreach($this->fields as $k=>$arr){
			$f=current($arr);
			if($f->name==$champName)
				return $f;
		}
		return NULL;
	}

	//efface les messages d'erreur
	function reset_errors(){
		foreach($this->fields as $k=>$arr){
			$f=current($arr);
			$f->set_error(false);
			$f->set_error_message();
		}
		
	}



	//remplissage des champs avec les valeurs issues de _REQUEST ou du tableau passé en paramètre
	function populate($tab=NULL){
		if(!$tab) $tab=$_REQUEST;
		foreach($this->fields as $k=>$arr){
			$k=key($arr);
			$f=current($arr);

			if(isset($tab[$k])){
				if($f->type==RADIO){
					if($f->value == $tab[$k])
						$f->check();
					else
						$f->check(false);
				}
				elseif($f->type==CHECK)
						$f->check();
				else{
					$f->set_value( $tab[$k]  ) ;
				}
			}
			else
				$f->check(FALSE);
				
		}
	}


	//génération HTML du formulaire
	function __toString(){
		
		$s="<form method='{$this->method}' action='{$this->action}'>";
		foreach($this->fields as $k=>$f){
			$s=$s.array_pop($f);
		}
		$s.="</form>";
					
		return $s;
	}
 
}