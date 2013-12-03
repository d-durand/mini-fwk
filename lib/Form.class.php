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
	protected $hasFile=false;


	public function __construct($action,$id){
		$this->id=$id;
		$this->action=$action;
	} 

	public function set_action($action){
		$this->action = $action;
	}

	function build_from_array($array){
		
		foreach($array as $f){
		
			switch($f['type']){
				case 'text':
					$s=$this->add_text($f['name'],$f['id'],$f['label']);
				break;
				case 'password':
					$s=$this->add_password($f['name'],$f['id'],$f['label']);
				break;
				case 'checkbox':
					$s=$this->add_checkbox($f['name'],$f['id'],$f['label']);			
				break;
				case 'radio':
					$s=$this->add_radio($f['name'],$f['id'],$f['label']);							
				break;
				case 'textarea':
					$s=$this->add_textarea($f['name'],$f['id'],$f['label']);							
				break;
				case 'hidden':
					$s=$this->add_hidden($f['name'],$f['id'],$f['label']);
				break;
				case 'select':
					$s=$this->add_select($f['name'],$f['id'],$f['label'],isset($f['options'])? $f['options'] : null );
				break;
				case 'submit':
					$s=$this->add_submit($f['name'],$f['id'],$f['label']);							
				break;
				
			}
			
			if(isset($f['checked']))
				$s->check();
			if(isset($f['required']))
				$s->set_required($f['required']);
			if(isset($f['value']))
				$s->set_required($f['value']);				
			if(isset($f['rules']))
				$s->set_rules($f['rules']);						
		}		
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


	function add_file($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(FILE,$name,$id,$label);
		$this->fields[][$name]=$s;
		$this->hasFile=true;
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



/*
	protected rules_=array(
			'min',
			'max',
			'min-length',
			'max-length',
			'int',
			'mail',
			'date',
			'regex',
			'required'
		);

	public function valid(){
		$err=false;
		foreach($this->fields as $k=>$f){
		
			if($f->rules != ''){
				$tab=explode('|',$f->rules);
			}		
		}
	}
*/



	//génération HTML du formulaire
	function __toString(){
		
		$s="<form method='{$this->method}' action='{$this->action}'" . ($this->hasFile ? " enctype='multipart/form-data'":'').">";
		foreach($this->fields as $k=>$f){
			$s=$s.array_pop($f);
		}
		$s.="</form>";
					
		return $s;
	}
 
}