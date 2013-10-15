<?php
class Redirect extends Module{

	public function action_index(){
		//dort 2"
		sleep(2);
		//test pour affichage
		//throw new Exception("Exception");
		$this->site->ajouter_message("traitement fictif effectué pendant 2sec");
		$this->site->redirect('index');
		
	}
	
}	
?>