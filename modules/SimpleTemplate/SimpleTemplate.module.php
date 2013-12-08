<?php
class SimpleTemplate extends Module{

	public function action_index(){

		$this->set_title("Simple exemple TPL");

		//création de variables PHP

		$variable1 = "Bonjour";
				
		$variable2 = date ("d/m/Y");
		
		$variable3 = array(
			array('id'=>'01','Reference'=>'AAAA-2','Prix'=>'3'),
			array('id'=>'04','Reference'=>'BBBB-5','Prix'=>'6'),
			array('id'=>'07','Reference'=>'CCCC-8','Prix'=>'9'),
			array('id'=>'10','Reference'=>'DDDD-11','Prix'=>'12'),
			array('id'=>'13','Reference'=>'EEEE-14','Prix'=>'15')
			
			);
			
		
		//passe les variables au template		
		$this->tpl->assign('chaine',$variable1);
		$this->tpl->assign('date',$variable2);
		$this->tpl->assign('table',$variable3);


		//essaie d'afficher directement du contenu dans passer par le template
			echo "<p>ECHO : contenu du tableau</p>";
			echo $this->site->debug($variable3);
			
		//génère un warning
			echo $variablequinexistepas;
			
	}
	
	public function action_modifier(){
	
		//recupère l'id et la référence 
		$id = $this->req->id;
		$ref= $this->req->ref;
		
		//passe ces informations dans le template
		
		$this->tpl->assign("id",$id);
		$this->tpl->assign("reference",$ref);		
	
		
	}
	public function action_supprimer(){

		//recupère l'id et la référence 
		$id = $this->req->id;
		$ref= $this->req->ref;
		
		//passe ces informations dans le template
		
		$this->tpl->assign("id",$id);
		$this->tpl->assign("reference",$ref);		

		
	}
	
}	
?>