<?php


/*

	Ce bloc fonctionne en relation avec le module Connexion.php
	Il est appelé systématiquement par le template principal
	
	Mets en place l'affichage du template correspondant au formulaire de connexion/déconnexion

*/

class Login extends Bloc{

	public function display(){
		if($this->session->ouverte())
			$this->tpl->assign('login',$this->session->user->login);
	}
}
?>
