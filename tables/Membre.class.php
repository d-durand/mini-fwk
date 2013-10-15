<?php
//exemple de table Membre
/*
//structure SQL : 
CREATE TABLE `Membres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `pass` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
*/

class Membre extends Table{
	
	
		public $id;
		public $mail;
		public $nom;
		public $prenom;
		public $login;
		//etc.

		
		public static function chercherParLogin($login){
			$sql="SELECT * from Membre WHERE Login=?";
			$res=DB::get_instance()->prepare($sql);
			$res->execute(array($login));
			//gérer les erreurs éventuelles
			if($res->rowCount()==0){
				echo "pas de ligne";
				return false;
				
			}
			$m= $res->fetch();			
			return new Membre($m[1],$m[2],$m[3],$m[4],$m[5],$m[0]);						
		}
		
		public function liste(){}   		
		public function listerParStatut(){}
		public function desactiver(){}
		public function activer(){}
}

?>