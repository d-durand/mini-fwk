<?php
class Formulaire extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Utilisation de l'objet formulaire");		
		$f=new Form("?module=Formulaire&action=valide","form1");
		$f->add_text("log","log","Login")->set_required();		
		$f->add_text("nom","nom","Nom");		
		$f->add_text("pnom","pnom","Prénom");		
		$f->add_text("mail","mail","M@il");		
		$f->add_password("pass1","pass1","Pass");		
		$f->add_password("pass2","pass2","retapez...");		
		$f->add_checkbox("chek1","ck1","Exemple Chk")->set_value("on");		
		$f->add_radio("rad1","r1","Exemple Rad")->set_value("one");		
		$f->add_radio("rad1","r2")->set_value("two");		
		$f->add_radio("rad1","r3")->set_value("three");		
		$f->add_select("choix","choix","Exemple Liste",array("v1"=>"Un","v2"=>"Deux","v3"=>"Trois"))->set_value("Deux");		
		$f->add_submit("Valider","bntval")->set_value('Valider');		

		// on peut pré-remplir le formulaire avec des valeurs par défaut
		//$f->populate(array("choix"=>"Deux", "rad1"=>"two", "nom"=>"Nom de Famille"));


		//passe le formulaire dans le template sous le nom "form"
		$this->tpl->assign("form",$f);	
		//stocke la structure du formulaire dans la session sous le nom "form"
		$this->session->form = $f;				
	}

	public function action_valide(){

		$mb = new MembreManager();

		$this->set_title("Inscription");
		$err=false;
		//on récupère la structure du formulaire précédemment stocké dans la session
		$form=$this->session->form;
		$form->reset_errors();
		
		//faire les tests de vérification de remplissage/format des champs
		//... expressions régulières, etc.
	
	
		//dans cet exemple, on vérifie seulement si le login est vide et s'il n'existe pas dans la base
		if($this->req->log == ''){
			$this->site->ajouter_message('contrôle form : remplir les champs (test sur le login dans cet exemple)',ALERTE);			
			$err=true;
			$form->log->set_error(true);
			$form->log->set_error_message("champs vide !");
		}


		//Appel à la BD via objet MembreManager
		
		elseif( $mb->chercherParLogin( $this->req->log) !== false){
			$this->site->ajouter_message('contrôle form : login existant',ALERTE);	
			$form->log->set_error(true);
			$form->log->set_error_message("login existant !");			
			$err=true;	
		 }
		
		//si un des tests a échoué
		if($err){	
			//on pré-remplit avec les valeurs déjà saisies
			$form->populate();		
			//passe le formulaire dans le template sous le nom "form"
			$this->tpl->assign("form",$form);
		}
		//tous les tests ont été validés
		else{
			//création d'une instance de Membre
			$m=new Membre($this->req->log,$this->req->nom,$this->req->pnom,
						$this->req->mail,
						$this->req->pass1
						);
			//enregistrement (insertion) dans la base
			$mb->creer($m);
			//passe un message pour la page suivante
			$this->site->ajouter_message('L\'utilisateur est enregistré');			
			//redirige vers le module par défaut
			$this->site->redirect('index');
		}
			



	}




}
?>