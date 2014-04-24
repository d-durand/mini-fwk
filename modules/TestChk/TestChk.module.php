<?php


class TestChk extends Module{

	public function	action_index(){
		
		$tab=array(
		array("id"=>"1","Civ"=>"M.","Nom"=>"Un","Actif"=>"Oui"),
		array("id"=>"2","Civ"=>"M.","Nom"=>"Deux","Actif"=>"Oui"),
		array("id"=>"3","Civ"=>"Mme.","Nom"=>"Trois","Actif"=>"Non"),
		array("id"=>"4","Civ"=>"M.","Nom"=>"Quatre","Actif"=>"Oui"),
		array("id"=>"5","Civ"=>"Melle","Nom"=>"Cinq","Actif"=>"Non")
		);

		$this->tpl->assign("donnees",$tab);

		
		
		$a = vrai() && vrai() && faux()  && faux();
		echo "<br />";
		$b = vrai() & vrai() & vrai();
		echo $b;
		
		
		
	}
	
	public function action_valide(){
		print_r($this->req->selec);
		echo "<p>";
		switch($this->req->do){
			case "Activer" : echo "Activation ...";break;	
			case "Supprimer" : echo "Suppression ...";break;
			case "Bannir" : echo "Bannissement ...";break;						
			
		}
		echo "</p>";
		
		
		
		
	}
	
	
	
}

	function vrai(){
		echo " VRAI ";
		return true;	
	}

	function faux(){
		echo " FAUX ";
		return false;	
	}


?>
