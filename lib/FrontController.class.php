<?php
/**
* OMGL3
* Class FrontController : chargeur/exécuteur de modules
*
*/
Class FrontController{

	public static $_content_="";

	public function __construct($config){
		foreach($config as $var=>$val)
			$this->$var=$val;
		$this->config=$config;

	}

	public function load_content(){

		//vérifie si un paramètre de module est passé, sinon : défaut
		$module= ( $this->req->module != '' ) ? $this->req->module : 'index';
		//vérifie si une action est requise, sinon : index
		$action= ( $this->req->action != '')   ? $this->req->action : 'index';

		$this->tpl->assign('titre','Titre par défaut');
		$this->tpl->assign('module',$module);
		$this->tpl->assign('action',$action);

		//inclue le module en question
		if(!class_exists($module))
			if(file_exists("modules/$module/$module.module.php"))
				require("modules/$module/$module.module.php");
			else
				throw new Exception("Module inconnu : $module");


		//============= exécute le module ================================================================================
		//c'est ici qu'il faudrait vérifier la gestion des droits d'accès au module et à l'action demandée
		//================================================================================================================
		$m=new $module();
		//nom du template à appeler, par défaut
		$m->set_tpl_name("$action");
		//nom de la fonction à appeler
		$action="action_$action";
		//variables outils
		$m->set_variables($this->config);
		$m->init();
		if(method_exists($module,$action))
			$m->$action();
		else
			throw new Exception("Action inconnue : $module::$action");

		foreach($this->config as $var=>$val)
			$this->tpl->assign($var,$val);

		/*echo "<pre>";
		print_r($this->tpl);
		echo "</pre>";
		die();*/

		$res=$this->tpl->fetch("file:modules/$module/tpl/".$m->get_tpl_name().".tpl");
		$this->tpl->assign('bloc_contenu',$res);
		$this->tpl->assign('messages',$this->site->liste_messages());

	}



}

?>
