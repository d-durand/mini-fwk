<?php
class Connexion extends Module{
			

	public function action_login(){

		


		// A FAIRE :  verifier les donnees de connexion
		// 
		//charger le membre
		//$user=Membre::chercherParId(  mettre l'id ou le login selon la nature de la table );

		//vérifier si le mot de passe dans la base correspond (après chiffrement)
		


		//code d'exemple 
		$m=new Membre();
		
		//les champs de formulaire sont Login et Pass, cf. Blocs/Login.bloc.tpl
		$login = $this->req->Login;
		$pass  = $this->req->Pass;

		if($login == "Admin" && md5($pass)=="21232f297a57a5a743894a0e4a801fc3")
		{
			$m->login = $login;
			//si les vérifications sont correctes, ouvrir la session
			//l'instance de l'utilisateur y est stockée pour retrouver les informations plus tard
			$this->session->ouvrir($m);
	
	
			//passer des infos au template du bloc de login
			$this->tpl->assign('login',$m->login);
			$this->site->ajouter_message("Vous êtes connecté en tant que ".$m->login);
			
			
		}else{
			$this->site->ajouter_message("Identifiants incorrects. Essayez Admin:admin",ALERTE);
			$this->site->ajouter_message("Le code réel de connexion doit être modifié dans modules/Connexion");
			
		}
		$this->site->redirect("index");
		
		
		
		
		
	}

	public function action_deconnect(){		
		$this->site->ajouter_message('Vous êtes déconnecté');							
		$this->session->fermer(); 			
		$this->site->redirect("index");
	}

}
?>