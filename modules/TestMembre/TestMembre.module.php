<?php


class TestMembre extends Module{

	public function	action_index(){
		
		//instancie le MembreManager pour effectuer des tests
		$mb = new  MembreManager ();
		
		//création d'un membre fictif
		echo "<p>Création BD</p>";		
		$membre=new Membre();
		$membre->login="test".time();
		$membre->nom="test".time();
		$membre->prenom="test";
		$membre->mail="test";		
		$membre->pass=md5("test");
		$resultat = $mb->creer($membre);

		echo "utilisateur créé, id=".$resultat->id;
		
		//récupération dans la BD
		echo "<p>récupération BD</p>";
		
		$membre = $mb->chercherParId($resultat->id);
		var_dump($membre);
		
		

		
		$res = DB::get_instance()->query("select * from Membre");
		
		echo ($this->site->debug($res->fetchAll(PDO::FETCH_COLUMN|PDO::FETCH_GROUP)));
		
		
		
		
	}
}


?>
