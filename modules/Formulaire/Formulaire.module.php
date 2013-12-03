<?php
class Formulaire extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Utilisation de l'objet formulaire");		



		$f=new Form("?module=Formulaire&action=valide","form1");
		$f->add_text("login","login","Login")->set_required();		
		$f->add_text("nom","nom","Nom");		
		$f->add_text("pnom","pnom","Prénom");		
		$f->add_text("mail","mail","M@il");		
		$f->add_password("pass1","pass1","Pass");		
		$f->add_password("pass2","pass2","retapez...");		
		$f->add_checkbox("chek1","ck1","Exemple Chk")->set_value("on");		
		$f->add_radio("rad1","r1","Exemple Rad")->set_value("one");		
		$f->add_radio("rad1","r2")->set_value("two");		
		$f->add_radio("rad1","r3")->set_value("three");		
		$f->add_textarea("texte","texte","Message");
		$f->add_select("choix","choix","Exemple Liste",array("v1"=>"Un","v2"=>"Deux","v3"=>"Trois"))->set_value("Deux");		
		$f->add_file("pj","pj","Pièce jointe");

		//construction sous forme de tableau
		$f->build_from_array(array(
			array(
					'type'=>'text',
					'name'=>'champ1',
					'id'=>'champ1',
					'label'=>'Champ 1',
					'required'=>true
				),
				
			array(
					'type'=>'password',
					'name'=>'champ2',
					'id'=>'champ2',
					'label'=>'Champ 2',
					'required'=>true		
				),
		
			array(
					'type'=>'select',
					'name'=>'champ3',
					'id'=>'champ3',
					'label'=>'Champ 3',
					'required'=>true,
					'options'=>array('pommes','poires','bananes')
				)
		));



		$f->add_submit("Valider","bntval")->set_value('Valider');		

		//exemple de pré-remplissage du formulaire avec des valeurs par défaut
		$f->populate(array("login"=>"Exemple", "rad1"=>"two", "nom"=>"Nom de Famille"));


		//passe le formulaire dans le template sous le nom "form"
		$this->tpl->assign("form",$f);	
		
		//stocke la structure du formulaire dans la session sous le nom "form"
		//pour une éventuelle réutilisation
		$this->session->form = $f;				
	}

	public function action_valide(){

		$this->set_title("Inscription");
		$err=false;
		//on récupère la structure du formulaire précédemment stocké dans la session
		$form=$this->session->form;
		$form->reset_errors();
		
		//faire les tests de vérification de remplissage/format des champs
		//... expressions régulières, etc.
	
	
		//dans cet exemple, on vérifie seulement si le login est vide et s'il n'existe pas dans la base
		if($this->req->login == ''){
			$err=true;
			$form->login->set_error(true);
			$form->login->set_error_message("champ vide !");
		}
	
		//Appel à la BD via objet MembreManager
		elseif( MembreManager::chercherParLogin( $this->req->login) !== false){
			$form->login->set_error(true);
			$form->login->set_error_message("login existant !");			
			$err=true;	
		 }
		
		//autres tests
		//...




		//test upload fichier
		if($this->req->file('pj')){
			echo "Fichier : ";
			print_r($this->req->file('pj'));
		}




		
		//si un des tests a échoué
		if($err){	
		
			$this->site->ajouter_message('contrôle form : remplir les champs (uniquement login dans cet exemple)',ALERTE);			

		
			//on pré-remplit avec les valeurs déjà saisies
			$form->populate();		
			//passe le formulaire dans le template sous le nom "form"
			$this->tpl->assign("form",$form);
		}
		//tous les tests ont été validés
		else{
			//création d'une instance de Membre
			$m=new Membre($this->req->login,$this->req->nom,$this->req->pnom,
						$this->req->mail,
						$this->req->pass1
						);
			//enregistrement (insertion) dans la base
			MembreManager::creer($m);
			//passe un message pour la page suivante
			$this->site->ajouter_message('L\'utilisateur est enregistré');			
			//redirige vers le module par défaut
			$this->site->redirect('index');
		}
			



	}




}
?>