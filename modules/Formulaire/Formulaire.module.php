<?php
class Formulaire extends Module{

	public function init(){}

	public function action_index(){

		$this->set_title("Utilisation de l'objet formulaire");		


		
		//construction d'un formulaire manuellement
		//chaque champ est ajouté par appel de fonction
		$f=new Form("?module=Formulaire&action=valide","form1");
			$f->add_text("login","login","Login")->set_required();		
			$f->add_text("texte","texte","Texte");		
			$f->add_text("mail","mail","M@il");		
			$f->add_password("pass1","pass1","Password");		
			$f->add_password("pass2","pass2","retapez...");		
			$f->add_checkbox("chek1","ck1","Checkbox")->set_value("on");		
			$f->add_radiogroup("radio","rad1", "RadioGroup",array("o1"=>"Un","o2"=>"Deux","o3"=>"Trois"))->set_value("Deux");		
			$f->add_textarea("ztexte","ztexte","Zone de Texte");
			$f->add_select("choix","choix","Liste déroulante",array("v1"=>"Un","v2"=>"Deux","v3"=>"Trois"))->set_value("Deux");		
			$f->add_file("pj","pj","Fichier");

		//construction sous forme de tableau
		//chaque champ est déclaré sous la forme d'un tableau de paramètres
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

		//règles de validation automatiques
		$f->champ1->set_validation("date:d-m-Y");
		//$f->champ3->set_validation("regex:/pommes/");  ne fonctionne pas car teste la valeur plutôt que le texte. A corriger
		$f->champ3->set_validation("equals:0"); 
		$f->radio->set_validation("equals:Un");		

		$f->pass1->set_validation("required");
		$f->pass2->set_validation("equals-field:pass1");		
		$f->ztexte->set_validation("min-length:10");		


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
		$form->valid();
		
		
		//faire les tests de vérification de remplissage/format des champs
		//... expressions régulières, etc.
	
	
		//dans cet exemple, on vérifie seulement si le login est vide et s'il n'existe pas dans la base

		if($this->requete->login == ''){
			$err=true;
			$form->login->set_error(true);
			$form->login->set_error_message("champ vide !");
		}
	
		//Appel à la BD via objet MembreManager
		elseif( MembreManager::chercherParLogin( $this->requete->login) !== false){
			$form->login->set_error(true);
			$form->login->set_error_message("login existant !");			
			$err=true;	
		 }
		


		//test upload fichier
		$fichier=$this->requete->file('pj');
		if( $fichier['size'] > 0 ){
			echo "Fichier : <pre>";
			print_r($fichier['name']);
			print_r($fichier['tmp_name']);
			print_r($fichier['type']);						
			echo "</pre>";
		}

		print_r($_REQUEST);


		//autres tests
		//...

		
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
			$m=new Membre($this->requete->login,$this->requete->nom,$this->requete->pnom,
						$this->requete->mail,
						$this->requete->pass1
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