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
			);

		$variable4 = new stdClass();
		$variable4->attribut1="valeur 1";
		$variable4->attribut2="valeur 2";		
			
		
		//passe les variables au template		
		$this->tpl->assign('chaine',$variable1);
		$this->tpl->assign('date',$variable2);
		$this->tpl->assign('table',$variable3);
		$this->tpl->assign('objet',$variable4);		


		//essaie d'afficher directement du contenu dans passer par le template
			echo "<p>ECHO : contenu du tableau</p>";
			echo $this->site->debug($variable3);
			
		//génère un warning
			echo $variablequinexistepas;
			
	}
		
}	
?>