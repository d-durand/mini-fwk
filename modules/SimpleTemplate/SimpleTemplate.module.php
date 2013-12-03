<?php
class SimpleTemplate extends Module{

	public function action_index(){

		$this->set_title("Simple exemple TPL");

		//création de variables PHP

		$variable1 = "Bonjour";
				
		$variable2 = date ("d/m/Y");
		
		$variable3 = array(
			array('N'=>'1','M'=>'2','O'=>'3'),
			array('N'=>'4','M'=>'5','O'=>'6'),
			array('N'=>'7','M'=>'8','O'=>'9'),
			array('N'=>'10','M'=>'11','O'=>'12'),
			array('N'=>'13','M'=>'14','O'=>'15')
			
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
	
	public function action_exemple(){
		
	}
	
}	
?>