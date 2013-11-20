<?php


class DownloadFile extends Module{

	public function action_index(){
		$this->set_title("Envoi de contenu");
	//laisse le template afficher les liens	
	}

	public function	action_textbrut(){

		//génère du contenu
		//et l'envoie sous forme de fichier brut
		header("Content-type: text/plain; charset=utf8");
		header('Content-Disposition: attachment; filename="exemple.txt"');
		echo <<< FINTEXT
		
		Contenu texte brut, généré par le module.
		Peut être le résultat de la lecture d'un fichier, d'une recherche dans la base de données
		
		
FINTEXT;
		exit;//important pour ne pas appeler les templates
	}
	public function	action_csv(){

		//génère du contenu
		//et l'envoie sous forme de texte CSV
		header("Content-type: application/csv; Charset=utf8");
		header('Content-Disposition: attachment; filename="exemple.csv"');
		echo <<< FINTEXT
1;Bonjour
2;Hello
3;Guten Tag
4;etc
FINTEXT;
		exit;
	}
	

	public function action_imagechargee(){
		//ouvre un fichier et l'envoie (tiré de php.net)

		// open the file in a binary mode
		$name = 'modules/Downloadfile/exemple.png';
		$fp = fopen($name, 'rb');
		
		// send the right headers
		header("Content-Type: image/png");
		header("Content-Length: " . filesize($name));
		//header('Content-Disposition: attachment; filename="exemple.png"');				
		// dump the picture and stop the script
		fpassthru($fp);
		exit;
	}

	public function	action_imagegd(){
	
		//génération d'une image avec la librairie GD
	
		$im = imagecreatetruecolor(240, 60);
		$text_color = imagecolorallocate($im, 233, 14, 91);for($i=0;$i<7;$i++)
		$color=imagecolorallocate($im,255,128,0);		
		$tab=range('A','Z');		
imagefilledrectangle($im,0,0,420,120,$back);


		for($i=0;$i<7;$i++){
			$code=imagecreatetruecolor(60,60);
			imagefilledrectangle($code,0,0,60,60,$back);
			imagerectangle($code,0,0,29,29,$color);
			$lettre=$tab[rand(0,25)];
			imagestring($code,5,10,8,$lettre,$color);
			$code=imagerotate($code,15-rand(0,30),$back);
			imagecopymerge($im, $code,30*$i,0,0,0,60,60,100);	
		}
		
		imageTTFText($im, 15, 30-rand(0,60), 32*$i,70, $color, "Pencil.ttf",$tab[rand(0,25)]);
		header ('Content-type: image/png');
		header('Content-Disposition: attachment; filename="exemple.png"');		
		imagepng($im);
		imagedestroy($im);
		exit;



	
	}
}
?>
