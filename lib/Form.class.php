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
	protected $hasErrors=false;

	/*
	* Construit le formulaire manuellement
	* paramètres : 
	*	action : attribut action du formulaire
	*	id : attribut id
	*/
	public function __construct($action,$id){
		$this->id=$id;
		$this->action=$action;
	} 

	public function set_action($action){
		$this->action = $action;
	}

	/*
	* Construit le formulaire à partir d'un tableau de paramètres sous la forme array(array(params-champ-1), array(params-champ-2),..., array(params-champ-n))
	* paramètres : 
	*   'type'		=> 'select','text', 'password', ...
	*   'name'		=> 'attribut name',
	*   'id'		=> 'attribut id',
	*   'label'		=> 'texte du label',
	*   'required'	=> true/false,
	*   'options'	=> array('pommes','poires','bananes') ou tableau associatif 
	*
	*/	
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
				case 'file':
					$s=$this->add_file($f['name'],$f['id'],$f['label']);			
				break;
				case 'radiogroup':
					$s=$this->add_radiogroup($f['name'],$f['id'],$f['label'],isset($f['options'])? $f['options'] : null );							
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
					$s=$this->add_submit($f['name'],$f['id']);							
				break;
				
			}
			
			if(isset($f['checked']))
				$s->check();
			if(isset($f['required']))
				$s->set_required($f['required']);
			if(isset($f['value']))
				$s->set_value($f['value']);				
			if(isset($f['validation']))
				$s->set_validation($f['validation']);						
		}		
	}

	/*
	* Ajoute une liste d'options
	* paramètres : 
	*   'name'		=> 'attribut name',
	*   'id'		=> 'attribut id',
	*   'label'		=> 'texte du label',
	*   'options'	=> array('pommes','poires','bananes') ou tableau associatif 
	*/
	function add_select($name,$id,$label='&nbsp;',$options=array()){
		$s =  new HTMLInput(SELECT,$name,$id,$label,$options);
		$this->fields[$name]=$s;
		return $s;		
	}

	/*
	* Ajoute un champ texte
	* paramètres : 
	*   'name'		=> 'attribut name',
	*   'id'		=> 'attribut id',
	*   'label'		=> 'texte du label',
	*/
	function add_text($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(TEXT,$name,$id,$label);
		$this->fields[$name]=$s;
		return $s;		
	}

	/*
	* Ajoute un champ hidden
	* paramètres : 
	*   'name'		=> 'attribut name',
	*   'id'		=> 'attribut id',
	*/
	function add_hidden($name,$id){
		$s =  new HTMLInput(HIDDEN,$name,$id,"&nbsp;");
		$this->fields[$name]=$s;
		return $s;		
	}

	/*
	* Ajoute un champ d'envoi de fichier
	* paramètres : 
	*   'name'		=> 'attribut name',
	*   'id'		=> 'attribut id',
	*   'label'		=> 'texte du label',
	*/
	function add_file($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(FILE,$name,$id,$label);
		$this->fields[$name]=$s;
		$this->hasFile=true;
		return $s;		
	}


	/*
	* Ajoute une zone de texte multiligne
	* paramètres : 
	*   'name'		=> 'attribut name',
	*   'id'		=> 'attribut id',
	*   'label'		=> 'texte du label',
	*/
	function add_textarea($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(TEXTAREA,$name,$id,$label);
		$this->fields[$name]=$s;
		return $s;		
	}

	/*
	* Ajoute un champ mot de passe
	* paramètres : 
	*   'name'		=> 'attribut name',
	*   'id'		=> 'attribut id',
	*   'label'		=> 'texte du label',
	*/
	function add_password($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(PASSWORD,$name,$id,$label);
		$this->fields[$name]=$s;
		return $s;		
	}

	/*
	* Ajoute un bouton de soumission de formulaire
	* paramètres : 
	*   'name'		=> 'attribut name',
	*   'id'		=> 'attribut id',
	*   'label'		=> 'texte du label',
	*/
	function add_submit($name,$id,$label='&nbsp;'){
		$s =  new HTMLInput(SUBMIT,$name,$id,$label);
		$this->fields[$name]=$s;
		return $s;		
	}

	/*
	* Ajoute une case à cocher
	* paramètres : 
	*   'name'		=> 'attribut name',
	*   'id'		=> 'attribut id',
	*   'label'		=> 'texte du label',
	*	'checked'	=> true/false
	*/
	function add_checkbox($name,$id,$label='&nbsp;',$checked=FALSE){
		$s =  new HTMLInput(CHECK,$name,$id,$label);
		$s->check($checked);
		$this->fields[$name]=$s;
		return $s;		
	}

	/*
	* Ajoute un groupe de boutons-radio
	* paramètres : 
	*   'name'		=> 'attribut name',
	*   'id'		=> 'attribut id',
	*   'label'		=> 'texte du label',
	*	'radios'	=> array( id=>valeur, id=>valeur, ...))
	*/
	function add_radiogroup($name,$id,$label='&nbsp;',$radios){
		$s =  new HTMLInput(RADIO,$name,$id,$label,$radios);
		$this->fields[$name]=$s;
		return $s;		
	}


	function __get($fieldName){
		if(isset($this->fields[$fieldName]))
			return $this->fields[$fieldName];
		return NULL ;
	}

	//remet à zéro les messages et classes css d'erreur
	function reset_errors(){
		$this->hasErrors=false;
		foreach($this->fields as $k=>&$f){

			//cas des boutons radios
			if(is_array($f))
				foreach($f as $radio){
					$radio->set_error(false);
					$radio->set_error_message("");
					
				}
			else{			
				$f->set_error(false);
				$f->set_error_message("");
			}
		}
	}


	//remplissage des champs avec les valeurs issues de _REQUEST ou du tableau passé en paramètre
	function populate($tab=NULL){
		if(!$tab) $tab=$_REQUEST;
		foreach($this->fields as $k=>&$f){
			//un paramètre de la requête correspond à un champ dans le formulaire
			if(isset($tab[$k])){
			
				if($f->type==CHECK)
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
	* Passe les tests de validation pour chacune des champs qui ont une propriété 'validation' définies
	*	
	*/
	public function valid(){
		$req = Request::get_instance();
		$this->reset_errors();

		//fields représente tous les champs du formulaire
		//$k : l'attribut name 
		//$f : un champ 
		foreach($this->fields as $k=>$f){
			
			//scrute les règles de validation établies
			if(!is_array($f) && $f->validation != ''){
				$tab=explode('|',$f->validation);			
			
			
				//parcourt chaque règle
				foreach($tab as $rule){
				
					//explore les arguments éventuels
					$args = explode(':',$rule,2);
					//récupère le type de test à mener
					$command = $args[0];
					$args = (count($args)==2 ? $args[1]:NULL);
				
				
					switch($command){
				
						// $req->$k est la valeur du champ en cours envoyé par le navigateur
						
						case 'equals':
							if($req->$k != $args){
								$this->$k->set_error();
								$this->$k->set_error_message('valeur incorrecte');
								$this->hasErrors=true;
							}
						break;
						
						case 'equals-field':
							if($req->$k != $req->$args){
								$this->$k->set_error();
								$this->$k->set_error_message('la valeur ne correspond pas');
								$this->hasErrors=true;
							}
						break;
						
						
						case 'min':
							if($req->$k < $args){
								$this->$k->set_error();
								$this->$k->set_error_message('valeur inférieure au minimum');
								$this->hasErrors=true;
							}
						break;
						case 'max':
							if($req->$k > $args){
								$this->$k->set_error();
								$this->$k->set_error_message('valeur maximum dépassée');
								$this->hasErrors=true;							
							}
						break;
						case 'min-length':
							if(strlen($req->$k) < $args){
								$this->$k->set_error();
								$this->$k->set_error_message('nombre de caractères insuffisant');
								$this->hasErrors=true;							
							}
						break;
						case 'max-length':
							if(strlen($req->$k) > $args){
								$this->$k->set_error();
								$this->$k->set_error_message('nombre de caractères trop grand');
								$this->hasErrors=true;							
							}
						break;
						case 'int':
							if(!filter_var($req->$k,FILTER_VALIDATE_INT)){
								$this->$k->set_error();
								$this->$k->set_error_message('nombre requis');
								$this->hasErrors=true;	
							}
						break;
						case 'mail':
							if(!filter_var($req->$k,FILTER_VALIDATE_EMAIL)){
								$this->$k->set_error();
								$this->$k->set_error_message('email requis');
								$this->hasErrors=true;							
							}
						break;
						case 'date':
							//ne teste pas les dates vides
							$val = trim($req->$k);
							if(empty($val))
								break;
				
							if( ($dt = DateTime::createFromFormat($args,$req->$k ))!==FALSE )
								$last_err=$dt->getLastErrors();

							if(!$dt ||  $last_err["warning_count"]>0){
									$this->$k->set_error();
									$this->$k->set_error_message('date invalide');
									$this->hasErrors=true;							
							}			
											
						break;
						case 'regex':
							if(!preg_match($args,$req->$k)){
								echo "<p>test de ".$req->$k." avec l'expr $args</p>";

								$this->$k->set_error();
								$this->$k->set_error_message('format invalide');
								$this->hasErrors=true;							
							}			
						
						break;
						case 'required':
							$val = trim($req->$k);
							if(empty($val)){
								$this->$k->set_error();
								$this->$k->set_error_message('champ requis');							
								$this->hasErrors=true;	
							}
						break;
						default : break;					
						
					}//switch
					
				}//foreach	
			}//if
		}//foreach
		return $this->hasErrors;
	}




	//génération HTML du formulaire
	function __toString(){

		$s="<form role='form' class='form-horizontal' method='{$this->method}' action='{$this->action}'" . ($this->hasFile ? " enctype='multipart/form-data'":'').">";

		foreach($this->fields as $k=>$f){
				$s=$s.$f;
		}
		$s.="</div></form>";
					
		return $s;

	}
 
}