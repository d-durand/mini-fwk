<?php
class Connexion extends Module{
			

	public function action_login(){

		// A FAIRE
		// verifier les donnees de connexion
		//charger le membre
		//$user=Membre::chercherParId(/*mettre l'id*/);
		//$this->session->ouvrir($user);
		
		//code de demo
		$m=new Membre();
		$m->login = $this->req->Login;
		$this->session->user=$m;		
		$this->tpl->assign('login',$m->login);
		$this->site->ajouter_message("Vous êtes connecté en tant que ".$m->login);
		$this->site->redirect("index");
	}

	public function action_deconnect(){		
		$this->site->ajouter_message('Vous êtes déconnecté');							
		$this->session->fermer(); 			
		$this->site->redirect("index");
	}

}
?>